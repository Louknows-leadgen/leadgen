@if (count($candidates))
	@foreach($candidates as $candidate)
	<tr>
		<td>
			{{$candidate->first_name}}
		</td>
		<td>{{$candidate->middle_name}}</td>
		<td>{{$candidate->last_name}}</td>
		<td>{{$candidate->name}}</td>
		<td>{{date('m/d/Y g:i A', strtotime($candidate->schedule))}}</td>
		<td><a class="link" href="{{ route('applications.profile',['applicant_id'=>$candidate->applicant_id]) }}">Interview</a></td>
	</tr>
	@endforeach
@else
    <tr>
        <td colspan="6">No results found</td>
    </tr>
@endif