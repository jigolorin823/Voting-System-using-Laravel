@extends('layouts.app1')
@section('css')
<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

@endsection
@section('content')
<div class="col-lg-12">
<center><h1><b>{{ $electoral->position->description }}</b></h1></center> <br><br>
    
           
            <center><h3><b>{{ $electoral->candidate->ballot_name }}</b></h3></center> <br><br>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Region</th>
                            <th>Votes</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                        foreach($provinces as $province){
                            
                            $count=0;?>
                            <tr>
                            <td>{{$province->description}}</td>
                    <?php 
                            foreach($votes as $vote){
                                
                                
                                if($vote->vote->voter->person->barangay->city->province_id==$province->id){
                                    if($vote->electoral_id==$electoral->id){
                                        $count++;
                                    }
                                }
                            }
                    ?>
                            <td>{{$count}}</td>
                            </tr>
                    <?php
                        }
                    ?>
                        
                    </tbody>

                </table>

                

            </div>
            
</div>
    

<div class="container">
    <a href="{{ route ('province.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Province</a>
    <a href="{{ route ('province.index') }}" class="btn btn-info"><i class="fa fa-plus"></i>View all Provinces</a>
    @if (Route::has('login'))
        @auth
            @if(Auth::user()->role_id==1)
                <a href="{{ route ('home') }}" class="btn btn-danger"></i>Back</a>
            @endif
        @endauth
    @endif
</div>
    
@endsection
