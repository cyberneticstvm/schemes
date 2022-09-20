@extends("base")

@section("content")
<!-- Body: Body -->
<div class="body d-flex py-lg-4 py-3">
    <div class="container-fluid">
        <div class="row g-1 mb-5 row-deck">            
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h5 class="m-0 text-primary">Material Collection Facility Consolidated</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('mcf.showc') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label class="form-label">District</label>
                                    <select class="form-control select2 fsub" name="district">
                                        <option value="0">Select</option>
                                        @foreach($districts as $key => $ds)
                                            <option value="{{ $ds->id }}" {{ ($ds->id == $district) ? 'selected' : '' }}>{{ $ds->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Month</label>
                                    <select class="form-control select2 fsub" name="month">
                                        <option value="0">Select</option>                                        
                                        @foreach($months as $key => $mn)
                                            <option value="{{ $mn->id }}" {{ ($mn->id == $month) ? 'selected' : '' }}>{{ $mn->name }}</option>
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
                                        @foreach($records as $key => $corp)
                                            @if($corp->lsg_type == 'CO')
                                                @php $c = 1 @endphp
                                                    <tr>
                                                        <td>
                                                            {{ DB::table('corporations')->where('id', $corp->lsg_id)->value('name') }}
                                                        </td>
                                                        @foreach($questions as $key => $question)
                                                        <td>
                                                            {{ DB::table('mcf_data')->where('id', $corp->id)->where('mcf_id', $corp->mcfid)->value('q'.$key+1) }}
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                @php $k++; @endphp
                                            @endif
                                        @endforeach
                                        <tr><td class="bg-success text-white">Municipalities</td><td colspan="{{ $scheme->question_count }}" class="bg-success text-white"></td></tr>
                                        
                                        @foreach($records as $key => $mun)
                                            @if($mun->lsg_type == 'MP')
                                                @php $c = 1 @endphp
                                                <tr>
                                                    <td>
                                                        {{ DB::table('municipalities')->where('id', $mun->lsg_id)->value('name') }}
                                                    </td>
                                                    @foreach($questions as $key => $question)
                                                    <td>
                                                        {{ DB::table('mcf_data')->where('id', $mun->id)->where('mcf_id', $mun->mcfid)->value('q'.$key+1) }}
                                                    </td>
                                                    @endforeach
                                                </tr>
                                                @php $k++; @endphp
                                            @endif
                                        @endforeach
                                        <tr><td class="bg-success text-white">Grama Panchayats</td><td colspan="{{ $scheme->question_count }}" class="bg-success text-white"></td></tr>
                                        
                                        @foreach($records as $key => $gp)
                                            @if($gp->lsg_type == 'GP')
                                                @php $c = 1 @endphp
                                                <tr>
                                                    <td>
                                                        {{ DB::table('gramapanchayats')->where('id', $gp->lsg_id)->value('name') }}
                                                    </td>
                                                    @foreach($questions as $key => $question)
                                                    <td>
                                                        {{ DB::table('mcf_data')->where('id', $gp->id)->where('mcf_id', $gp->mcfid)->value('q'.$key+1) }}                                                        
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
                    </div>            
                </div> <!-- .card end -->
            </div>
        </div>
    </div>
</div>
@endsection