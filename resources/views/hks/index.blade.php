@extends("base")

@section("content")
<!-- Body: Header -->
<div class="body-header d-flex text-light border-top py-3">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="/dash/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">HKS => List</li>
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
                        <h5 class="m-0 text-primary">Haritha Karma Sena List</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 table-responsive">
                                <table id="dataTbl" class="table table-bordered table-sm table-striped table-hover">
                                    <thead><tr><th>SL No.</th><th>District</th><th>Month</th><th>Year</th><th>Created at</th><th>Updated at</th><th>Edit</th><th>Remove</th></tr></thead>
                                    <tbody>
                                        @php $c = 1; @endphp
                                        @forelse($hkss as $key => $hks)
                                            <tr>
                                                <td>{{ $c++ }}</td>
                                                <td>{{ $hks->name }}</td>
                                                <td>{{ $hks->month }}</td>
                                                <td>{{ $hks->year }}</td>
                                                <td>{{ $hks->created_at }}</td>
                                                <td>{{ $hks->updated_at }}</td>
                                                <td><a class='btn btn-link' href="{{ route('hks.edit', $hks->id) }}"><i class="fa fa-pencil text-warning"></i></a></td>
                                                <td>
                                                    <form method="post" action="{{ route('hks.delete', $hks->id) }}">
                                                        @csrf 
                                                        @method("DELETE")
                                                        <button type="submit" class="btn btn-link" onclick="javascript: return confirm('Are you sure want to delete this record?');"><i class="fa fa-trash text-danger"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="8" class="text-center">No records found</td></tr>
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