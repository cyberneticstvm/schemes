<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RrfMaster;
use App\Models\RrfData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class RRFController extends Controller
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
        $rrfs = RrfMaster::leftjoin('districts as d', 'd.id', 'rrf_masters.district')->select('d.name', 'rrf_masters.id', 'rrf_masters.month', 'rrf_masters.year', 'rrf_masters.created_at', 'rrf_masters.updated_at')->where('rrf_masters.district', Auth::user()->district)->get();
        return view('rrf.index', compact('rrfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheme = DB::table('schemes')->find(2);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = RrfMaster::where('district', Auth::user()->district)->where('month', $month)->where('year', $year)->get()->first();
        $prev_month_data = RrfMaster::where('district', Auth::user()->district)->where('month', $this->prev_month)->where('year', $this->prev_month_year)->get()->first();
        if($data):
            $records = DB::table('rrf_data')->where('rrf_id', $data->id)->orderBy('id')->get();
            return view('rrf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        elseif($prev_month_data):
            $data = $prev_month_data;
            $records = DB::table('rrf_data')->where('rrf_id', $data->id)->orderBy('id')->get();
            return view('rrf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        else:
            return view('rrf.create', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname'));
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
        $rrf = RrfMaster::create($input);
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'rrf_id' => $rrf->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => (!empty($request->q6[$i])) ? $request->q6[$i] : NULL,
                ];
            endfor;
            DB::table('rrf_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('rrf.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('rrf_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.rrf_reqd), 0) rrf_reqd")->where('m.month', $this->month)->where('m.year', $this->year)->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
        return view("rrf.consolidated", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheme = DB::table('schemes')->find(2);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = RrfMaster::find($id);
        $records = DB::table('rrf_data')->where('rrf_id', $data->id)->orderBy('id')->get();
        return view('rrf.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
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
        $rrf = RrfMaster::find($id);
        $input['created_by'] = $rrf->getOriginal('created_by');
        $input['updated_by'] = Auth::user()->id;
        $rrf->update($input);
        DB::table('rrf_data')->where('rrf_id', $id)->delete();
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'rrf_id' => $rrf->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => (!empty($request->q6[$i])) ? $request->q6[$i] : NULL,
                    
                ];
            endfor;
            DB::table('rrf_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('rrf.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RrfMaster::find($id)->delete();
        return redirect()->route('rrf.index')
                        ->with('success','Record deleted successfully');
    }
}
