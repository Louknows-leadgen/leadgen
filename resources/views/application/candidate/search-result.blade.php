<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr class="std-blue-bg text-white">
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Applied For</th>
            <th>Schedule</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($candidates))
            @foreach($candidates as $candidate)
                <tr>
                    <td>
                        {{$candidate->first_name}}
                    </td>
                    <td>{{$candidate->middle_name}}</td>
                    <td>{{$candidate->last_name}}</td>
                    <td>{{$candidate->name}}</td>
                    <td>{{date('m/d/Y g:i A', strtotime($candidate->schedule))}}</td>
                    <td>
                        <a class="shadow-sm btn btn-outline-primary" href="{{ route('applications.profile',['applicant_id'=>$candidate->applicant_id]) }}">Interview</a>
                    </td>
                    <td>
                        <a class="fin-no-show 
                                  shadow-sm 
                                  btn 
                                  btn-outline-danger" 
                            href="#" 
                            onclick="event.preventDefault();
                                     document.getElementById('{{ $candidate->applicant_id }}').submit();">
                            No Show
                        </a>

                        <form id="{{$candidate->applicant_id}}"      
                              action="{{ route('fin.no_show',['id'=>$candidate->applicant_id]) }}" 
                              method="POST" 
                              style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No results found. Visit <a href="{{ route('history.index') }} ">Interview history</a>.</td>
            </tr>
        @endif
    </tbody>
</table>
{!! $candidates->appends(['skey'=>$skey])->links() !!}