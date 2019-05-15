@extends('layouts.app1')

@section('content')
<div class="container">
        <table style="width:100%;">
            <tr>
                <td rowspan="7" colspan="2"><img src="{{ url($candidate->person->image) }}" alt="Cover" width="250" height="450"></td>
                <td><label >Name:</label></td>
                <td colspan="3"><h1><b>{{ $candidate->person->name->fName }} {{ $candidate->person->name->lName }}</b></h1></td>
            </tr>
            <tr>
            <td><label >Ballot Name:</label></td>
                <td colspan="3"><h5>"{{ $candidate->ballot_name }}"</h5></td>
            </tr>
            <tr>
            <td><label >Address:</label></td>
                <td colspan="3"><h5>{{ $candidate->person->house_street }}, {{ $candidate->person->barangay->description }}, {{ $candidate->person->barangay->city->description }}, {{ $candidate->person->barangay->city->province->description }}</h5></td>
            </tr>
            <tr>
            <td><label >Date of Birth:</label></td>
                <td><h5>{{ $candidate->person->date_birth }}</h5></td>
            </tr>
            <tr>
            <td><label >gender:</label></td>
                <td colspan="3"><h5>{{ $candidate->person->gender->description }}</h5></td>
            </tr>
            <tr>
            <td><label >Civil Status:</label></td>
                <td colspan="3""><h5>{{ $candidate->person->civil_status_id }}</h5></td>
            </tr>
            <tr>
            <td><label >Occupation:</label></td>
                <td colspan="3"><h5>{{ $candidate->person->occupation }}</h5></td>
            </tr>
            
            </tr>
        </table>    
        <br>

        <h3 style="text-align:center">Candidacy History</h3>
        <center><table style="width:70%;text-align:center"  frame="border">
            @foreach($electorals as $electoral)
            <tr>
                <td><h5>{{ $electoral->position->description }}</h5></td>
                <td><h5>{{ $electoral->year->year }}</h5></td>
            </tr>
            @endforeach
        </table></center>

        <div class="container">
            <center><a href="{{ route('candidate.index') }}" class="btn btn-success">Back</a></center>
        </div>
        

    </div>


@endsection
