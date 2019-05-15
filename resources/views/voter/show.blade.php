@extends('layouts.app1')

@section('content')
<div class="container">
        <table id="table">
            <tr>
                <td rowspan="7" colspan="2"><img src="{{ url($voter->person->image) }}" alt="Cover" width="250" height="450"></td>
                <td><label >Name:</label></td><?php $name = $voter->person->name->fName.$voter->person->name->lName; ?>
                <td colspan="3"><h1><b>{{ $voter->person->name->fName }} {{ $voter->person->name->lName }}</b></h1></td>
            </tr>
            <tr>
                <td><label >Address:</label></td>
                <td colspan="3"><h5>{{ $voter->person->house_street }}, {{ $voter->person->barangay->description }}, {{ $voter->person->barangay->city->description }}, {{ $voter->person->barangay->city->province->description }}</h5></td>
            </tr>
            <tr>
                <td><label >Date of Birth:</label></td>
                <td><h5>{{ $voter->person->date_birth }}</h5></td>
            </tr>
            <tr>
                <td><label >genderer:</label></td>
                <td colspan="3"><h5>{{ $voter->person->gender->description }}</h5></td>
            </tr>
            <tr>
                <td><label >Civil Status:</label></td>
                <td colspan="3""><h5>{{ $voter->person->civil_status_id }}</h5></td>
            </tr>
            <tr>
                <td><label >Occupation:</label></td>
                <td colspan="3"><h5>{{ $voter->person->occupation }}</h5></td>
            </tr>
            <tr>
                <td><label >Voter's ID:</label></td>
                <td colspan="3"><h5>{{ $voter->voter_id }}</h5></td>
            </tr>
            <tr colspan="2">
                
                <table style="width:70%;text-align:center" >
                <caption>Voting History</caption>
                    <thead>
                        <tr>
                            <td>Electoral Year</td>
                            <td>Voted</td>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                
                    foreach($years as $year){
                        $flag = false;
                        
                        foreach($votes as $vote){
                            foreach($votedetails as $votedetail){
                                if($votedetail->voter_id==$vote->id){
                                    if($votedetail->year_id==$year->id){
                                        $flag=true;
                                        break;
                                    }
                                }
                            }
                        }
                        ?>
                            
                            <tr>
                                <td><h5>{{ $year->year }}</h5></td>
                                <td><h5>{{ $flag? "Yes":"No" }}</h5></td>
                            </tr>
                <?php   
                    }
                ?>
                    </tbody>
                </table>
            
            </tr>
        </table>    
        <br>

        
        <div class="container">
            <center><a href="{{ route('voter.index') }}" class="btn btn-success">Back</a></center>
        </div>
        

    </div>


@endsection
@section('script')
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

@endsection