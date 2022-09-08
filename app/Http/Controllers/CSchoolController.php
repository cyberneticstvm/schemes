<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CschoolMaster;
use App\Models\CschoolData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

class CSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $today, $year, $month_name, $month;

    public function __construct(){
        $this->today = Carbon::now();
        $this->year = $this->today->year;
        $this->month_name = $this->today->format("F");
        $this->month = $this->today->month;
    }

    public function index()
    {
        $cschools = CschoolMaster::leftjoin('districts as d', 'd.id', 'cschool_masters.district')->select('d.name', 'cschool_masters.id', 'cschool_masters.month', 'cschool_masters.year', 'cschool_masters.created_at', 'cschool_masters.updated_at')->where('cschool_masters.district', Auth::user()->district)->get();
        return view('cschool.index', compact('cschools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scheme = DB::table('schemes')->find(4);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = CSchoolMaster::where('district', Auth::user()->district)->where('month', $month)->where('year', $year)->get()->first();
        if($data):
            $records = DB::table('cschool_data')->where('cschool_id', $data->id)->orderBy('id')->get();
            return view('cschool.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
        else:
            return view('cschool.create', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname'));
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
        $cschool = CSchoolMaster::create($input);
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'cschool_id' => $cschool->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => ($request->q6[$i] > 0) ? $request->q6[$i] : 0,
                    'q7' => ($request->q7[$i] > 0) ? $request->q7[$i] : 0,
                    'q8' => ($request->q8[$i] > 0) ? $request->q8[$i] : 0,
                    'q9' => ($request->q9[$i] > 0) ? $request->q9[$i] : 0,
                    'q10' => ($request->q10[$i] > 0) ? $request->q10[$i] : 0,
                    'q11' => ($request->q11[$i] > 0) ? $request->q11[$i] : 0,
                    'q12' => (!empty($request->q12[$i])) ? $request->q12[$i] : NULL,
                ];
            endfor;
            DB::table('cschool_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('cschool.index')->with('success','Data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //$data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('cschool_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.mcf_reqd), 0) cschool_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
        return view("cschool.consolidated");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheme = DB::table('schemes')->find(4);
        $questions = DB::table('questions')->where('scheme', $scheme->id)->get();
        $districts = DB::table('districts')->where('id', Auth::user()->district)->orderBy('name')->get();
        $corporations = DB::table('corporations')->where('district', Auth::user()->district)->orderBy('name')->get();
        $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->orderBy('name')->get();
        $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->orderBy('name')->get();
        $year = $this->year; $mname = $this->month_name; $month = $this->month;
        $data = CSchoolMaster::find($id);
        $records = DB::table('cschool_data')->where('cschool_id', $data->id)->orderBy('id')->get();
        return view('cschool.edit', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme', 'year', 'month', 'mname', 'data', 'records'));
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
        $cschool = CSchoolMaster::find($id);
        $input['created_by'] = $cschool->getOriginal('created_by');
        $input['updated_by'] = Auth::user()->id;
        $cschool->update($input);
        DB::table('cschool_data')->where('cschool_id', $id)->delete();
        try{
            for($i=0; $i<count($request->q1); $i++):
                $data[] = [
                    'cschool_id' => $cschool->id,
                    'lsg_id' => $input['lid'.$i][0],
                    'lsg_type'=> $input['ltype'.$i][0],
                    'q1' => ($request->q1[$i] > 0) ? $request->q1[$i] : 0,
                    'q2' => ($request->q2[$i] > 0) ? $request->q2[$i] : 0,
                    'q3' => ($request->q3[$i] > 0) ? $request->q3[$i] : 0,
                    'q4' => ($request->q4[$i] > 0) ? $request->q4[$i] : 0,
                    'q5' => ($request->q5[$i] > 0) ? $request->q5[$i] : 0,
                    'q6' => ($request->q6[$i] > 0) ? $request->q6[$i] : 0,
                    'q7' => ($request->q7[$i] > 0) ? $request->q7[$i] : 0,
                    'q8' => ($request->q8[$i] > 0) ? $request->q8[$i] : 0,
                    'q9' => ($request->q9[$i] > 0) ? $request->q9[$i] : 0,
                    'q10' => ($request->q10[$i] > 0) ? $request->q10[$i] : 0,
                    'q11' => ($request->q11[$i] > 0) ? $request->q11[$i] : 0,
                    'q12' => (!empty($request->q12[$i])) ? $request->q12[$i] : NULL,
                ];
            endfor;
            DB::table('cschool_data')->insert($data);
        }catch(Exception $e){
            throw $e;
        }
        return redirect()->route('cschool.index')->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CSchoolMaster::find($id)->delete();
        return redirect()->route('cschool.index')
                        ->with('success','Record deleted successfully');
    }
}
