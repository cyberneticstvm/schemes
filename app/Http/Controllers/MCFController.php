<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McfMaster;
use App\Models\McfData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class MCFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $today, $year, $month_name, $month, $prev_month_name, $prev_month, $prev_month_year;

    public function __construct(){
        $this->today = Carbon::now();
        $this->year = $this->today->year;
        $this->month_name = $this->today->format("F");
        $this->month = $this->today->month;
        $this->prev_month_name = Carbon::now()->subMonth()->format('F');
        $this->prev_month = Carbon::now()->subMonth()->format('m');
        $this->prev_month_year = Carbon::now()->subMonth()->format('Y');
    }
    public function index()
    {
        $mcfs = McfMaster::leftjoin('districts as d', 'd.id', 'mcf_masters.district')->select('d.name', 'mcf_masters.id', 'mcf_masters.month', 'mcf_masters.year', 'mcf_masters.created_at', 'mcf_masters.updated_at')->where('mcf_masters.district', Auth::user()->district)->get();
        return view('mcf.index', compact('mcfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheme = DB::table('schemes')->find(1);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = McfMaster::where('district', Auth::user()->district)->where('month', $month)->where('year', $year)->get()->first();
        $prev_month_data = McfMaster::where('district', Auth::user()->district)->where('month', $this->prev_month)->where('year', $this->prev_month_year)->get()->first();
        if($data):
            $records = DB::table('mcf_data')->where('mcf_id', $data->id)->orderBy('id')->get();
            return view('mcf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        elseif($prev_month_data):
            $data = $prev_month_data;
            $records = DB::table('mcf_data')->where('mcf_id', $data->id)->orderBy('id')->get();
            return view('mcf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        else:
            return view('mcf.create', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname'));
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'district' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;
        $mcf = McfMaster::create($input);
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'mcf_id' => $mcf->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => ($request->q6[$i] > 0) ? $request->q6[$i] : 0,
                    'q7' => ($request->q7[$i] > 0) ? $request->q7[$i] : 0,
                    'q8' => (!empty($request->q8[$i])) ? $request->q8[$i] : NULL,
                ];
            endfor;
            DB::table('mcf_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('mcf.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $record = McfMaster::latest()->first();
        $districts = DB::table('districts')->orderBy('id')->get();
        $months = DB::table('months')->orderBy('id')->get();
        $year = $record->year; $district = 0; $month = 0;
        $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('mcf_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.mcf_reqd), 0) mcf_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->where('m.month', $record->month)->where('m.year', $record->year)->get();       
        return view("mcf.consolidated", compact('data', 'districts', 'months', 'year', 'record', 'district', 'month'));
    }

    public function showc(Request $request){
        $scheme = DB::table('schemes')->find(1);
        $record = McfMaster::latest()->first();
        $districts = DB::table('districts')->orderBy('id')->get();
        $months = DB::table('months')->orderBy('id')->get();
        $year = ($request->year > 0) ? $request->year : $record->year;
        $month = ($request->month > 0) ? $request->month : $record->month;
        $district = ($request->district > 0) ? $request->district : 0;
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();       
        if($district > 0):
            $corporations = DB::table('corporations')->where('district', $district)->orderBy('name')->get();
            $municipalities = DB::table('municipalities')->where('district', $district)->orderBy('name')->get();
            $gramapanchayats = DB::table('gramapanchayats')->where('district', $district)->orderBy('name')->get();
            $records = DB::table("mcf_data as md")->leftJoin('mcf_masters as m', 'm.id', '=', 'md.mcf_id')->select('md.id', 'm.id as mcfid', 'md.lsg_type', 'md.lsg_id')->where('m.district', $district)->where('m.month', $month)->where('m.year', $year)->get();
            return view("mcf.showc", compact('records', 'districts', 'months', 'year', 'record', 'month', 'district', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme'));
        else:
            $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('mcf_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.mcf_reqd), 0) mcf_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->where('m.month', $record->month)->where('m.year', $record->year)->get();
            return view("mcf.consolidated", compact('data', 'districts', 'months', 'year', 'record', 'district', 'month'));
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheme = DB::table('schemes')->find(1);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = McfMaster::find($id);
        $records = DB::table('mcf_data')->where('mcf_id', $data->id)->orderBy('id')->get();
        return view('mcf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'district' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);
        $input = $request->all();
        $mcf = McfMaster::find($id);
        $input['created_by'] = $mcf->getOriginal('created_by');
        $input['updated_by'] = Auth::user()->id;
        $mcf->update($input);
        DB::table('mcf_data')->where('mcf_id', $id)->delete();
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'mcf_id' => $mcf->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => ($request->q6[$i] > 0) ? $request->q6[$i] : 0,
                    'q7' => ($request->q7[$i] > 0) ? $request->q7[$i] : 0,
                    'q8' => (!empty($request->q8[$i])) ? $request->q8[$i] : NULL,
                ];
            endfor;
            DB::table('mcf_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('mcf.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        McfMaster::find($id)->delete();
        return redirect()->route('mcf.index')
                        ->with('success','Record deleted successfully');
    }
}
