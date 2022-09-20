<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HksMaster;
use App\Models\HksData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class HKSController extends Controller
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
        $hkss = HksMaster::leftjoin('districts as d', 'd.id', 'hks_masters.district')->select('d.name', 'hks_masters.id', 'hks_masters.month', 'hks_masters.year', 'hks_masters.created_at', 'hks_masters.updated_at')->where('hks_masters.district', Auth::user()->district)->get();
        return view('hks.index', compact('hkss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheme = DB::table('schemes')->find(3);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = HksMaster::where('district', Auth::user()->district)->where('month', $month)->where('year', $year)->get()->first();
        $prev_month_data = HksMaster::where('district', Auth::user()->district)->where('month', $this->prev_month)->where('year', $this->prev_month_year)->get()->first();
        if($data):
            $records = DB::table('hks_data')->where('hks_id', $data->id)->orderBy('id')->get();
            return view('hks.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        elseif($prev_month_data):
            $data = $prev_month_data;
            $records = DB::table('hks_data')->where('hks_id', $data->id)->orderBy('id')->get();
            return view('hks.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        else:
            return view('hks.create', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname'));
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
        $hks = HksMaster::create($input);
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'hks_id' => $hks->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => (!empty($request->q4[$i])) ? $request->q4[$i] : NULL,
                ];
            endfor;
            DB::table('hks_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('hks.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $record = HksMaster::latest()->first();
        $districts = DB::table('districts')->orderBy('id')->get();
        $months = DB::table('months')->orderBy('id')->get();
        $year = $record->year; $district = 0; $month = 0;
        $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('hks_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.hks_reqd), 0) hks_reqd")->where('m.month', $this->month)->where('m.year', $this->year)->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
        return view("hks.consolidated", compact('data', 'districts', 'months', 'year', 'record', 'district', 'month'));
    }

    public function showc(Request $request){
        $scheme = DB::table('schemes')->find(3);
        $record = HksMaster::latest()->first();
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
            $records = DB::table("hks_data as md")->leftJoin('hks_masters as m', 'm.id', '=', 'md.hks_id')->select('md.id', 'm.id as hksid', 'md.lsg_type', 'md.lsg_id')->where('m.district', $district)->where('m.month', $month)->where('m.year', $year)->get();
            return view("hks.showc", compact('records', 'districts', 'months', 'year', 'record', 'month', 'district', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme'));
        else:
            $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('hks_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.hks_reqd), 0) hks_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->where('m.month', $record->month)->where('m.year', $record->year)->get();
            return view("hks.consolidated", compact('data', 'districts', 'months', 'year', 'record', 'district', 'month'));
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
        $scheme = DB::table('schemes')->find(3);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = HksMaster::find($id);
        $records = DB::table('hks_data')->where('hks_id', $data->id)->orderBy('id')->get();
        return view('hks.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
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
        $hks = HksMaster::find($id);
        $input['created_by'] = $hks->getOriginal('created_by');
        $input['updated_by'] = Auth::user()->id;
        $hks->update($input);
        DB::table('hks_data')->where('hks_id', $id)->delete();
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'hks_id' => $hks->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => (!empty($request->q4[$i])) ? $request->q4[$i] : NULL,
                    
                ];
            endfor;
            DB::table('hks_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('hks.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HksMaster::find($id)->delete();
        return redirect()->route('hks.index')
                        ->with('success','Record deleted successfully');
    }
}
