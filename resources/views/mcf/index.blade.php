@extends("base")

@section("content")
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0 text-primary">Material Collection Facility List</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12 table-responsive">
                                <table id="dataTbl" class="table table-bordered table-sm table-striped table-hover">
                                    <thead><tr><th>SL No.</th><th>District</th><th>Month</th><th>Year</th><th>Created at</th><th>Updated at</th><th>Edit</th><th>Remove</th></tr></thead>
                                    <tbody>
                                        @php $c = 1; @endphp
                                        @forelse($mcfs as $key => $mcf)
                                            <tr>
                                                <td>{{ $c++ }}</td>
                                                <td>{{ $mcf->name }}</td>
                                                <td>{{ $mcf->month }}</td>
                                                <td>{{ $mcf->year }}</td>
                                                <td>{{ $mcf->created_at }}</td>
                                                <td>{{ $mcf->updated_at }}</td>
                                                <td><a class='btn btn-link' href="{{ route('mcf.edit', $mcf->id) }}"></a></td>
                                                <td>
                                                    <form method="post" action="{{ route('mcf.delete', $mcf->id) }}">
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