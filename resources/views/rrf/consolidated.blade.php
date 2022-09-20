@extends("base")

@section("content")
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0 text-primary">Resource Recovery Facility Consolidated</h5>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ route('rrf.showc') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">District</label>
                                    <select class="form-control select2 fsub" name="district">
                                        <option value="0">Select</option>
                                        @foreach($districts as $key => $ds)
                                            <option value="{{ $ds->id }}"  {{ ($ds->id == $district) ? 'selected' : '' }}>{{ $ds->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Month</label>
                                    <select class="form-control select2 fsub" name="month">
                                        <option value="0">Select</option>                                        
                                        @foreach($months as $key => $mn)
                                            <option value="{{ $mn->id }}"  {{ ($mn->id == $month) ? 'selected' : '' }}>{{ $mn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Year</label>                                
                                    <select class="form-control select2 fsub" name="year">
                                        <option value="0">Select</option>                                        
                                        <option value="{{ $year }}" selected>{{ $year }}</option>
                                    </select>
                                </div>                            
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr><th></th><th colspan="4" class="text-center">Corporations</th><th colspan="4" class="text-center">Municipalities</th><th colspan="4" class="text-center">Grama Panchayats</th><th colspan="4" class="text-center">Block Panachayats</th></tr>
                                        <tr><th>District</th><td>No.of Corp.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td><td>No.of Municipals.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td><td>No.of Panchayats.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td><td>No.of Blocks</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td></tr>
                                    </thead>
                                    <tbody>
                                        @php $c = 1; @endphp
                                        @forelse($data as $key => $row)
                                            @php
                                                $rrf_co = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'CO')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_mp = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'MP')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_mp_reqd = DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->sum('m.rrf_reqd');
                                                $rrf_gp = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'GP')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_gp_reqd = DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->sum('g.rrf_reqd');
                                                $rrf_bl = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'BL')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_bl_reqd = DB::table('blocks as b')->leftJoin('districts as d', 'b.district', 'd.id')->where('b.district', $row->id)->sum('b.rrf_reqd');
                                            @endphp
                                            <tr>
                                                <td>{{ $row->district }}</td>
                                                <td class="text-end">{{ $row->ccount }}</td>
                                                <td class="text-end">{{ $row->rrf_reqd }}</td>
                                                <td class="text-end">{{ $rrf_co }}</td>
                                                <td class="text-end">{{ ($row->rrf_reqd > 0 && $rrf_co > 0) ? number_format((100/$row->rrf_reqd)*$rrf_co, 2) : 0.00 }}%</td>

                                                <td class="text-end">{{ DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->count('m.id') }}</td>
                                                <td class="text-end">{{ $rrf_mp_reqd }}</td>
                                                <td class="text-end">{{ $rrf_mp }}</td>
                                                <td class="text-end">{{ ($rrf_mp_reqd > 0 && $rrf_mp > 0) ? number_format((100/$rrf_mp_reqd)*$rrf_mp, 2) : 0.00 }}%</td>

                                                <td class="text-end">{{ DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->count('g.id') }}</td>
                                                <td class="text-end">{{ $rrf_gp_reqd }}</td>
                                                <td class="text-end">{{ $rrf_gp }}</td>
                                                <td class="text-end">{{ ($rrf_gp_reqd > 0 && $rrf_gp > 0) ? number_format((100/$rrf_gp_reqd)*$rrf_gp, 2) : 0.00 }}%</td>

                                                <td class="text-end">{{ DB::table('blocks as b')->leftJoin('districts as d', 'b.district', 'd.id')->where('b.district', $row->id)->count('b.id') }}</td>
                                                <td class="text-end">{{ $rrf_bl_reqd }}</td>
                                                <td class="text-end">{{ $rrf_bl }}</td>
                                                <td class="text-end">{{ ($rrf_bl_reqd > 0 && $rrf_bl > 0) ? number_format((100/$rrf_bl_reqd)*$rrf_bl, 2) : 0.00 }}%</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" class="text-center">No records found</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12 table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="10" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Resource Recovery Facility</span></strong></p>
                        </td>
                        <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>as on</span></strong></p>
                        </td>
                        <td colspan="3" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14- 09- 2022</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:17.35pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Sl No.</span></strong></p>
                        </td>
                        <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:17.35pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>District</span></strong></p>
                        </td>
                        <td colspan="2" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Grama panchayaths</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Block Panchayaths</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Municipalities</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Corporations</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:34.9pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Grama panchayaths</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s Functional</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of Block Panchayats</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s required</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s Functional</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Municipalities</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s required</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s Functional</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Corporations</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s required</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. of RRF&apos;s Functional</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 34.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 34.9pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid windowtext 1.0pt;background:#DADFE8;padding:0cm 0cm 0cm 0cm;height:  2.6pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: rgb(218, 223, 232);padding: 0cm;height: 2.6pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Thiruvananthapuram</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>45.45</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>75.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>50.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kollam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>68</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>18.18</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>25.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Pathanamthitta</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>53</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>50.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Alappuzha</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>72</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>25.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kottayam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>63.64</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Idukki</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>25.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Ernakulam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>82</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>35.71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>69.23</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>50.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Thrissur</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>16</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>10</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>62.50</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>85.71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>75.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Palakkad</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>88</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>30.77</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>85.71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>10</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Malappuram</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>15</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>15</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>16.67</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kozhikode</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>70</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>33.33</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14.29</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>25.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Wayanad</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>23</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kannur</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>81.82</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>77.78</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>25.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kasargode</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>38</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 0cm 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:.3pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td colspan="2" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>941</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>59</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>152</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>152</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>55</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>36.18</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>87</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>87</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>59</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>67.82</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>24</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>10</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:20px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>41.67</span></strong></p>
                        </td>
                        <td style="padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>-->
@endsection