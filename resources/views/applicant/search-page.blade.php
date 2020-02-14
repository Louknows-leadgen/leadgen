@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="box">
                <h5>Applicant List</h5>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" id="search-applicant" class="form-control" placeholder="Search" value="{{ $skey }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 applicant-list">
                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                                <tr class="std-blue-bg text-white">
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email Address</th>
                                    <th>Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($persons))
                                @foreach($persons as $person)
                                    <tr>
                                        <td><a class="link" 
                                               href="{{route('rd.index',['person_id'=>$person->person_id])}}">
                                               {{ $person->first_name }}
                                           </a>
                                       </td>
                                        <td>{{ $person->middle_name }}</td>
                                        <td>{{ $person->last_name }}</td>
                                        <td>{{ $person->mobile_1 }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td>
                                            <a href="{{route('applications.procedure',[$person->person_id])}}">
                                                {{ $person->status_name}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No results found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {!! $persons->appends(['skey'=>$skey])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
