@extends("base")

@section("content")
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0 text-primary">Add Material Collection Facility</h5>
                    </div>
                    <form method="post" action="{{ route('mcf.save') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">District</label>
                                    <select class="form-control select2" name="district">
                                        @foreach($districts as $key => $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Month</label>
                                    <select class="form-control select2" name="month">                                        
                                        <option value="{{ $month }}">{{ $mname }}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Year</label>
                                    <select class="form-control select2" name="year">                                        
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 vh-100 overflow-auto table-responsive">
                                    <table class="tblLsg table table-bordered">
                                        <thead class="stickytblhead text-primary"><tr>
                                            <td>LSG Name</td>
                                            @foreach($questions as $key => $question)
                                            <td><a href="javascript:void(0)" data-toggle="tooltip" title="{{ $question->name }}" class="text-white">{{ $question->short_name }}</a></td>
                                            @endforeach
                                        </tr></thead>
                                        <tbody>
                                            <tr><td class="bg-success text-white">Corporations</td><td colspan="{{ $scheme->question_count }}" class="bg-success text-white"></td></tr>
                                            @php $k = 0; @endphp
                                            @foreach($corporations as $key => $corp)
                                            @php $c = 1 @endphp
                                                <tr>
                                                    <td>
                                                        {{ $corp->name }}
                                                        <input type="hidden" name="ltype{{$k}}[]" value="CO" />
                                                        <input type="hidden" name="lid{{$k}}[]" value="{{ $corp->id }}" />
                                                    </td>
                                                    @foreach($questions as $key => $question)
                                                    <td>
                                                        <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" placeholder="{{ $question->placeholder }}" />
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @php $k++; @endphp
                                            @endforeach
                                            <tr><td class="bg-success text-white">Municipalities</td><td colspan="{{ $scheme->question_count }}" class="bg-success text-white"></td></tr>
                                            
                                            @foreach($municipalities as $key => $mun)
                                            @php $c = 1 @endphp
                                                <tr>
                                                    <td>
                                                        {{ $mun->name }}
                                                        <input type="hidden" name="ltype{{$k}}[]" value="MP" />
                                                        <input type="hidden" name="lid{{$k}}[]" value="{{ $mun->id }}" />
                                                    </td>
                                                    @foreach($questions as $key => $question)
                                                    <td>
                                                        <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" placeholder="{{ $question->placeholder }}" />
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @php $k++; @endphp
                                            @endforeach
                                            <tr><td class="bg-success text-white">Grama Panchayats</td><td colspan="{{ $scheme->question_count }}" class="bg-success text-white"></td></tr>
                                            
                                            @foreach($gramapanchayats as $key => $gp)
                                            @php $c = 1 @endphp
                                                <tr>
                                                    <td>
                                                        {{ $gp->name }}
                                                        <input type="hidden" name="ltype{{$k}}[]" value="GP" />
                                                        <input type="hidden" name="lid{{$k}}[]" value="{{ $gp->id }}" />
                                                    </td>
                                                    @foreach($questions as $key => $question)
                                                    <td>
                                                        <input type="{{ $question->type }}" name="q{{$c++}}[]" min="0" class="form-control form-control-sm rounded-0 {{ $question->position }}" placeholder="{{ $question->placeholder }}" />                                                        
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @php $k++; @endphp
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12 text-center"><button type="submit" class="btn btn-submit rounded-0 btn-primary me-2">SAVE</button><button type="reset" class="btn rounded-0 btn-warning me-2">RESET</button><button type="button" onClick="history.back()" class="btn rounded-0 btn-danger">CANCEL</button></div>
                            </div>
                        </div>
                    </form>
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection