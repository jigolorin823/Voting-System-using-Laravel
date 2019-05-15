@extends('layouts.app1')

@section('content')
<div class="container">
        <table style="width:100%;">
            <tr>
                <td rowspan="7" colspan="2"><img src="{{ url($electoral->candidate->person->image) }}" alt="Cover" width="250" height="450"></td>
                <td><label >Ballot Name:</label></td>
                <td colspan="3"><h1><b>{{ $electoral->candidate->ballot_name }}</b></h1></td>
            </tr>
            <tr>
            <td><label >Position:</label></td>
                <td colspan="3"><h5>{{ $electoral->position->description }}</h5></td>
            </tr>
            <tr>
            <td><label >Partylist:</label></td>
                <td colspan="3"><h5>{{ $electoral->partylist->name }}</h5></td>
            </tr>
            <tr>
            <td><label >Year:</label></td>
                <td><h5>{{ $electoral->year->year }}</h5></td>
            </tr>
            
            </tr>
        </table>    
        <br>
        <div class="container">
            <center><a href="{{ route('electoral.index') }}" class="btn btn-success">Back</a></center>
        </div>
        

    </div>


@endsection
