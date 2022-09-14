<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function consolidated($scheme, $district){
        $districts = DB::table('districts')->get();
        if($scheme == 1):
            $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('mcf_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.mcf_reqd), 0) mcf_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
            return view("mcf.consolidated", compact('data'));
        endif;
        if($scheme == 2):
            $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('rrf_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.rrf_reqd), 0) rrf_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
            return view("rrf.consolidated", compact('data'));
        endif;
        if($scheme == 3):
            $data = DB::table('districts as d')->leftJoin('corporations as c', 'd.id', 'c.district')->leftJoin('hks_masters as m', 'd.id', 'm.district')->selectRaw("d.id, d.name as district, count(c.id) as ccount, IFNULL(sum(c.hks_reqd), 0) hks_reqd")->orderBy('id', 'asc')->groupBy('d.id', 'd.name')->get();
            return view("hks.consolidated", compact('data'));
        endif;
    }
}
