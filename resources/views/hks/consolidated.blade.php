@extends("base")

@section("content")
<!-- Body: Header -->
<div class="body-header d-flex text-light border-top py-3">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="/dash/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">HKS => Consolidated</li>
                </ol>
            </div>
            <div class="col-auto">
                <div class="d-md-flex d-none justify-content-lg-end align-items-center">
                    <div class="progress" style="height: 3px; width: 170px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <label class="text-left text-muted ms-3">Project Status</label>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-auto">
                <h1 class="fs-4 mt-1 mb-0">Welcome back, {{ Auth::user()->name }}!</h1>
                <small class="text-muted">Your assigned district is {{ Auth::user()->district }}.</small>
            </div>
            <div class="col d-flex justify-content-lg-end mt-2 mt-md-0">
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">8.18K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 4.33%</small></div>
                    <small class="text-muted text-uppercase">Target</small>
                </div>
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">1.11K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 4.33%</small></div>
                    <small class="text-muted text-uppercase">Completed</small>
                </div>
                <div class="p-2 pe-lg-0">
                    <div><span class="h6 mb-0">3.66K</span> <small class="text-danger"><i class="fa fa-angle-down"></i> 4.33%</small></div>
                    <small class="text-muted text-uppercase">Ongoing</small>
                </div>
            </div>
        </div>
    </div>
</div>
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
                                                $hks_mp_reqd = DB::table('municipalities as m')->leftJoin('districts as d', 'm.district', 'd.id')->where('m.district', $row->id)->sum('m.hks_reqd');
                                                $hks_gp = DB::table('hks_data as md')->leftJoin('hks_masters as m', 'm.id', 'md.hks_id')->where('md.lsg_type', 'GP')->where('m.district', $row->id)->sum('md.q3');
                                                $hks_gp_reqd = DB::table('gramapanchayats as g')->leftJoin('districts as d', 'g.district', 'd.id')->where('g.district', $row->id)->sum('g.hks_reqd');
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
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection