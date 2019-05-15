@extends('layouts.app1')

@section('content')
<div class="container">
        <table style="width:100%;">
            <tr>
                <td rowspan="7" colspan="2"><img src="{{ url($partylist->image) }}" alt="Cover" width="250" height="450"></td>
                <td><label >Name:</label></td>
                <td colspan="3"><h1><b>{{ $partylist->name }}</b></h1></td>
            </tr>
            
            </tr>
        </table>    
        <br>
        <div class="container">
            <center><a href="{{ route('partylist.index') }}" class="btn btn-success">Back</a></center>
        </div>
        

    </div>


@endsection
