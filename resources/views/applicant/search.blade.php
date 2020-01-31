@if (count($persons))
    @foreach($persons as $person)
        <tr>
            <td><a class="link" href="{{route('rd.index',['person_id'=>$person->person_id])}}">{{ $person->first_name }}</a></td>
            <td>{{ $person->middle_name }}</td>
            <td>{{ $person->last_name }}</td>
            <td>{{ $person->mobile_1 }}</td>
            <td>{{ $person->email }}</td>
            <td>
                <a class="link" href="{{route('applications.procedure',[$person->person_id])}}">
                    {{ $person->status_name }}
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6">No results found</td>
    </tr>
@endif