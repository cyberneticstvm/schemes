<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class MCFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = DB::table('districts')->get();
        $questions = DB::table('questions')->get();
        $scheme = DB::table('schemes')->find(1);
        if(Auth::user()->user_type == 'admin'):
            $districts = DB::table('districts')->where('id', Auth::user()->district)->get();
            $corporations = DB::table('corporations')->where('district', Auth::user()->district)->get();
            $municipalities = DB::table('municipalities')->where('district', Auth::user()->district)->get();
            $gramapanchayats = DB::table('gramapanchayats')->where('district', Auth::user()->district)->get();
        endif;
             
        return view('mcf', compact('districts', 'questions', 'corporations', 'municipalities', 'gramapanchayats', 'scheme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
