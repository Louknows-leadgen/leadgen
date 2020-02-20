<table class="table table-striped table-hover table-responsive">
    <thead>
        <tr class="thead-dark">
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Applied For</th>
            <th>Applied Date</th>
            <th>Assessment</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($interviews))
            @foreach($interviews as $interview)
                <tr>
                    <td>
                        {{$interview->applicant_first_name}}
                    </td>
                    <td>
                        {{$interview->applicant_middle_name}}
                    </td>
                    <td>
                        {{$interview->applicant_last_name}}
                    </td>
                    <td>
                        {{$interview->applicant_applied_for}}
                    </td>
                    <td>{{date('m/d/Y', strtotime($interview->applicant_applied_date))}}</td>
                    
                    <td>{{$interview->result}}</td>
                    <td>
                        <a class="shadow-sm btn btn-outline-secondary" 
                           href="{{ route('history.show',['history'=>$interview->id]) }}">
                            View result
                        </a>
                    </td>
                    <td>
                        <span class="shadow-sm btn btn-outline-danger remove-trigger" data-id="{{ $interview->id }}">Remove</span>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No results found. Visit <a href="{{ route('applications.candidates') }}">Candidate list</a>.</td>
            </tr>
        @endif
    </tbody>
</table>
{!! $interviews->appends(['skey'=>$skey])->links() !!}