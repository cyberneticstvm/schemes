@extends("base")

@section("content")
<!-- Body: Header -->
<div class="body-header d-flex text-light border-top py-3">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="/dash/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dash</li>
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
                    <small class="text-muted text-uppercase">Income</small>
                </div>
                <div class="p-2 me-md-3">
                    <div><span class="h6 mb-0">1.11K</span> <small class="text-secondary"><i class="fa fa-angle-up"></i> 4.33%</small></div>
                    <small class="text-muted text-uppercase">Expense</small>
                </div>
                <div class="p-2 pe-lg-0">
                    <div><span class="h6 mb-0">3.66K</span> <small class="text-danger"><i class="fa fa-angle-down"></i> 4.33%</small></div>
                    <small class="text-muted text-uppercase">Revenue</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0">MCF</h5>
                    </div>
                    <div class="card-body">
                        <div id="apex-StockQuality" class="ac-line-transparent"></div>
                    </div>
                </div> <!-- .card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0">RRF</h5>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div> <!-- .card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0">HKS</h5>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div> <!-- .card end -->
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0">C@S</h5>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection