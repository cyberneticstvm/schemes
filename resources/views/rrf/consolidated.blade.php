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
                        <div class="row mb-3">
                            <div class="col-md-12 table-responsive">
                                <table class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr><th></th><th colspan="4" class="text-center">Corporations</th><th colspan="4" class="text-center">Municipalities</th><th colspan="4" class="text-center">Grama Panchayats</th></tr>
                                        <tr><th>District</th><td>No.of Corp.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td><td>No.of Municipals.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td><td>No.of Panchayats.</td><td>RRF's Rqd</td><td>RRF's Functional</td><td>%</td></tr>
                                    </thead>
                                    <tbody>
                                        @php $c = 1; @endphp
                                        @forelse($data as $key => $row)
                                            @php
                                                $rrf_co = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'CO')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_mp = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'MP')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_mp_reqd = DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->sum('m.rrf_reqd');
                                                $rrf_gp = DB::table('rrf_data as md')->leftJoin('rrf_masters as m', 'm.id', 'md.rrf_id')->where('md.lsg_type', 'GP')->where('m.district', $row->id)->sum('md.q2');
                                                $rrf_gp_reqd = DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->sum('g.mcf_reqd');
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
                                            </tr>
                                        @empty
                                            <tr><td colspan="5" class="text-center">No records found</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>            
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection