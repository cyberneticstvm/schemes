@extends("base")

@section("content")
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0 text-primary">Haritha Karma Sena Consolidated</h5>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ route('hks.showc') }}">
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
                                        <tr><th></th><th colspan="4" class="text-center">Corporations</th><th colspan="4" class="text-center">Municipalities</th><th colspan="4" class="text-center">Grama Panchayats</th></tr>
                                        <tr><th>District</th><td>No.of Corp.</td><td>HKS's Rqd</td><td>HKS's Functional</td><td>%</td><td>No.of Municipals.</td><td>HKS's Rqd</td><td>HKS's Functional</td><td>%</td><td>No.of Panchayats.</td><td>HKS's Rqd</td><td>HKS's Functional</td><td>%</td></tr>
                                    </thead>
                                    <tbody>
                                        @php $c = 1; @endphp
                                        @forelse($data as $key => $row)
                                            @php
                                                $hks_co = DB::table('hks_data as md')->leftJoin('hks_masters as m', 'm.id', 'md.hks_id')->where('md.lsg_type', 'CO')->where('m.district', $row->id)->sum('md.q3');
                                                $hks_mp = DB::table('hks_data as md')->leftJoin('hks_masters as m', 'm.id', 'md.hks_id')->where('md.lsg_type', 'MP')->where('m.district', $row->id)->sum('md.q3');
                                                $hks_mp_reqd = DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->count('m.hks_reqd');
                                                $hks_gp = DB::table('hks_data as md')->leftJoin('hks_masters as m', 'm.id', 'md.hks_id')->where('md.lsg_type', 'GP')->where('m.district', $row->id)->sum('md.q3');
                                                $hks_gp_reqd = DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->count('g.hks_reqd');
                                            @endphp
                                            <tr>
                                                <td>{{ $row->district }}</td>
                                                <td class="text-end">{{ $row->ccount }}</td>
                                                <td class="text-end">{{ $row->hks_reqd }}</td>
                                                <td class="text-end">{{ $hks_co }}</td>
                                                <td class="text-end">{{ ($row->hks_reqd > 0 && $hks_co > 0) ? number_format((100/$row->hks_reqd)*$hks_co, 2) : 0.00 }}%</td>

                                                <td class="text-end">{{ DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->count('m.id') }}</td>
                                                <td class="text-end">{{ $hks_mp_reqd }}</td>
                                                <td class="text-end">{{ $hks_mp }}</td>
                                                <td class="text-end">{{ ($hks_mp_reqd > 0 && $hks_mp > 0) ? number_format((100/$hks_mp_reqd)*$hks_mp, 2) : 0.00 }}%</td>

                                                <td class="text-end">{{ DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->count('g.id') }}</td>
                                                <td class="text-end">{{ $hks_gp_reqd }}</td>
                                                <td class="text-end">{{ $hks_gp }}</td>
                                                <td class="text-end">{{ ($hks_gp_reqd > 0 && $hks_gp > 0) ? number_format((100/$hks_gp_reqd)*$hks_gp, 2) : 0.00 }}%</td>
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
                        <td colspan="7" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Haritha karma Sena</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>as on</span></strong></p>
                        </td>
                        <td colspan="2" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14- 09- 2022</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:17.35pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Sl No.</span></strong></p>
                        </td>
                        <td rowspan="2" style="border:solid windowtext 1.0pt;background:  white;padding:1.75pt 2.6pt 1.75pt 2.6pt;height:17.35pt;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>District</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Grama panchayaths</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Municipalities</span></strong></p>
                        </td>
                        <td colspan="4" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Corporations</span></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:25.9pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Grama panchayaths</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Required no. of Haritha Karmasena Units</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Haritha Karmasena Functioning Grama Panchayaths</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Municipalities</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Required no. of Haritha Karmasena Units</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>No. Haritha Karmasena Functioning in Municipalities</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total no. of Corporations</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Required no. of haritha Karmasena Units</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total No. Haritha Karmasena Functioning in Corporations</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 25.9pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Percentage</span></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid windowtext 1.0pt;background:#DADFE8;padding:0cm 0cm 0cm 0cm;height:  2.6pt;"><br></td>
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
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Thiruvananthapuram</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>73</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kollam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>68</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>68</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>68</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Pathanamthitta</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>53</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>53</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>53</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>4</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Alappuzha</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>72</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>72</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>98.61</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>5</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kottayam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Idukki</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>52</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Ernakulam</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>82</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>82</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>81</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>98.78</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>8</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Thrissur</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Palakkad</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>88</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>88</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>87</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>98.86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>10</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Malappuram</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>94</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>91.49</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>11</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kozhikode</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>70</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>70</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>70</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>7</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>12</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Wayanad</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>23</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>23</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>23</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>2</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>66.67</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>13</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kannur</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>71</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>9</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>1</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>14</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Kasargode</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>38</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>38</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>38</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>3</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0</span></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>0.00</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:2.0pt;border:solid #CCCCCC 1.0pt;background:  #F8F9FA;padding:0cm 0cm 0cm 0cm;height:17.35pt;"><br></td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;"><br></td>
                        <td colspan="2" style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>Total</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>941</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>941</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>930</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>98.83</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>87</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>87</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>86</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>98.85</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>6</span></strong></p>
                        </td>
                        <td style="border: 1pt solid windowtext;background: white;padding: 1.75pt 2.6pt;height: 17.35pt;vertical-align: bottom;">
                            <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:15px;font-family:"Arial",sans-serif;color:black;'>100.00</span></strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>-->
@endsection