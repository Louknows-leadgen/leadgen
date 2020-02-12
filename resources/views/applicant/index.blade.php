@extends('layouts.main')

@section('title', 'Resources > Applicant')


@section('contents')
    <div class="row">
        <div class="col-md-2 mb-4">
            <div class="box text-center">
                <div><a class="link" href="{{ route('applicants.index') }}">Applicants</a></div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="box">
                <h5>Applicant List</h5>
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" id="search-applicant" class="form-control" placeholder="Search">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 applicant-list">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="std-blue-bg text-white">
                                    <th class="th-lg">First Name</th>
                                    <th class="th-lg">Middle Name</th>
                                    <th class="th-lg">Last Name</th>
                                    <th class="th-lg">Mobile Number</th>
                                    <th class="th-lg">Email Address</th>
                                    <th class="th-lg">Application Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($applicants))
                                @foreach($applicants as $applicant)
                                    <tr>
                                        <td><a class="link" href="{{route('rd.index',['person_id'=>$applicant->person->id])}}">{{ $applicant->person->first_name }}</a></td>
                                        <td>{{ $applicant->person->middle_name }}</td>
                                        <td>{{ $applicant->person->last_name }}</td>
                                        <td>{{ $applicant->person->mobile_1 }}</td>
                                        <td>{{ $applicant->person->email }}</td>
                                        <td>
                                            <a href="{{route('applications.procedure',[$applicant->id])}}">
                                                {{ $applicant->application_status->name}}
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
                        {!! $applicants->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
