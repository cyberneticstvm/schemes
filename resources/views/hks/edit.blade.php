@extends("base")

@section("content")
<!-- Body: Header -->
<div class="body-header d-flex text-light border-top py-3">
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="/dash/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">HKS => Update</li>
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
                        <h5 class="m-0 text-primary">Update Haritha Karma Sena</h5>
                    </div>
                    <form method="post" action="{{ route('hks.update', $data->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">District</label>
                                    <select class="form-control select2" name="district">
                                        @foreach($districts as $key => $district)
                                            <option value="{{ $district->id }}" {{ ($district->id == $data->district) ? 'selected' : '' }}>{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Month</label>
                                    <select class="form-control select2" name="month">                                        
                                        <option value="{{ $month }}" {{ ($month == $data->month) ? 'selected' : '' }}>{{ $mname }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Year</label>
                                    <select class="form-control select2" name="year">                                       
                                        <option value="{{ $year }}" {{ ($year == $data->year) ? 'selected' : '' }}>{{ $year }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 vh-100 overflow-auto table-responsive">
                                    <table class="tblLsg table table-bordered">
                                        <thead class="stickytblhead text-primary"><tr>
                                            <td>LSG Name</td>
                                            @foreach($questions as $key => $question)
                                            <td>{{ $question->short_name }}</td>
                                            @endforeach
                                        </tr></thead>
                                        <tbody>
                                            <tr><td class="bg-primary text-white">Corporations</td><td colspan="{{ $scheme->question_count }}" class="bg-primary text-white"></td></tr>
                                            @php $k = 0; @endphp
                                            @foreach($records as $key => $corp)
                                                @if($corp->lsg_type == 'CO')
                                                    @php $c = 1 @endphp
                                                        <tr>
                                                            <td>
                                                                {{ DB::table('corporations')->where('id', $corp->lsg_id)->value('name') }}
                                                                <input type="hidden" name="ltype{{$k}}[]" value="CO" />
                                                                <input type="hidden" name="lid{{$k}}[]" value="{{ $corp->lsg_id }}" />
                                                            </td>
                                                            @foreach($questions as $key => $question)
                                                            <td>
                                                                <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" value="{{ DB::table('hks_data')->where('id', $corp->id)->value('q'.$key+1) }}" placeholder="{{ $question->placeholder }}" />
                                                            </td>
                                                            @endforeach
                                                        </tr>
                                                    @php $k++; @endphp
                                                @endif
                                            @endforeach
                                            <tr><td class="bg-primary text-white">Municipalities</td><td colspan="{{ $scheme->question_count }}" class="bg-primary text-white"></td></tr>
                                            
                                            @foreach($records as $key => $mun)
                                                @if($mun->lsg_type == 'MP')
                                                    @php $c = 1 @endphp
                                                    <tr>
                                                        <td>
                                                            {{ DB::table('municipalities')->where('id', $mun->lsg_id)->value('name') }}
                                                            <input type="hidden" name="ltype{{$k}}[]" value="MP" />
                                                            <input type="hidden" name="lid{{$k}}[]" value="{{ $mun->lsg_id }}" />
                                                        </td>
                                                        @foreach($questions as $key => $question)
                                                        <td>
                                                            <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" value="{{ DB::table('hks_data')->where('id', $mun->id)->value('q'.$key+1) }}" placeholder="{{ $question->placeholder }}" />
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @php $k++; @endphp
                                                @endif
                                            @endforeach
                                            <tr><td class="bg-primary text-white">Grama Panchayats</td><td colspan="{{ $scheme->question_count }}" class="bg-primary text-white"></td></tr>
                                            
                                            @foreach($records as $key => $gp)
                                                @if($gp->lsg_type == 'GP')
                                                    @php $c = 1 @endphp
                                                    <tr>
                                                        <td>
                                                            {{ DB::table('gramapanchayats')->where('id', $gp->lsg_id)->value('name') }}
                                                            <input type="hidden" name="ltype{{$k}}[]" value="GP" />
                                                            <input type="hidden" name="lid{{$k}}[]" value="{{ $gp->lsg_id }}" />
                                                        </td>
                                                        @foreach($questions as $key => $question)
                                                        <td>
                                                            <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" value="{{ DB::table('hks_data')->where('id', $gp->id)->value('q'.$key+1) }}" placeholder="{{ $question->placeholder }}" />                                                        
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    @php $k++; @endphp
                                                @endif
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 text-center"><button type="submit" class="btn btn-submit rounded-0 btn-primary me-2">UPDATE</button><button type="reset" class="btn rounded-0 btn-warning me-2">RESET</button><button type="button" onClick="history.back()" class="btn rounded-0 btn-danger">CANCEL</button></div>
                            </div>
                        </div>
                    </form>
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection