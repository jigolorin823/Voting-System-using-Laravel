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
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>

@endsection
@section('content')
@if (Route::has('login'))
        @auth
            @if(Auth::user()->voter->voted)
                <h1 style="text-align:center;">You already voted!</h1>
            @else
            <?php 
            $voter_id = Auth::user()->voter->id;
            $personID= Auth::user()->voter->person_id; 
            ?>
            <div class="container">
    <h1 style="text-align: center">Voting Form</h1>
    <hr>
    <hr>
    <center>Insert instructions here..</center>
    <hr>
    <form action="{{ route('vote.store') }}" method="POST">
    @csrf
    <input type="hidden" name="voter_id" value="{{ $voter_id }}">
    @foreach($positions as $position)
        <center><h3>{{ $position->description }}</h3></center>
        <div class="table-responsive">
            <table width="100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Partylist</th>
                        <th>Click to Vote</th>
                    </tr>
                </thead>
                @if($position->level_id==1)
                <tbody>
                <?php $q=0; $count=0?>
                @foreach($electorals as $electoral)
                    @if($electoral->position_id == $position->id)
                        <?php $count++; ?>
                    @endif
                @endforeach
                @foreach($electorals as $electoral)
                    @if($electoral->position_id == $position->id)
                        <tr>
                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                            <td>{{ $electoral->candidate->ballot_name }}</td>
                            <td>{{ $electoral->partylist->name }}</td>
                            <?php $desc = $position->description ?>
                            <td><input id="{{ $position->description }}{{ $q }}" type="checkbox" name="{{ $position->description }}[]" value="{{ $electoral->id }}" onclick="CountChecks({{ $count }},{{ $position->num_winners }},'{{ $desc }}',this)"></td>
                            <?php $q++; ?>
                        </tr>
                    @endif
                @endforeach
                </tbody>
                @elseif($position->level_id==2)
                <tbody>
                <?php $q=0; $count=0?>
                @if($position->id==4)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay->city->prov_id == Auth::user()->voter->person->barangay->city->prov_id)
                                        <?php $count++; ?>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($position->id==5)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay->city_id == Auth::user()->voter->person->barangay->city_id)
                                        <?php $count++; ?>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($position->id==6)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay_id == Auth::user()->voter->person->barangay_id)
                                        <?php $count++; ?>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($position->id==4)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay->city->prov_id == Auth::user()->voter->person->barangay->city->prov_id)
                                    <tr>
                                        <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                        <td>{{ $electoral->candidate->ballot_name }}</td>
                                        <td>{{ $electoral->partylist->name }}</td>
                                        <?php $desc = $position->description ?>
                                        <td><input id="{{ $position->description }}{{ $q }}" type="checkbox" name="{{ $position->description }}[]" value="{{ $electoral->id }}" onclick="CountChecks({{ $count }},{{ $position->num_winners }},'{{ $desc }}',this)"></td>
                                        <?php $q++; ?>
                                    </tr>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($position->id==5)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay->city_id == Auth::user()->voter->person->barangay->city_id)
                                    <tr>
                                        <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                        <td>{{ $electoral->candidate->ballot_name }}</td>
                                        <td>{{ $electoral->partylist->name }}</td>
                                        <?php $desc = $position->description ?>
                                        <td><input id="{{ $position->description }}{{ $q }}" type="checkbox" name="{{ $position->description }}[]" value="{{ $electoral->id }}" onclick="CountChecks({{ $count }},{{ $position->num_winners }},'{{ $desc }}',this)"></td>
                                        <?php $q++; ?>
                                    </tr>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($position->id==6)
                    @foreach($electorals as $electoral)
                        @if($electoral->position_id == $position->id)
                            @if (Route::has('login'))
                                @auth
                                    @if($electoral->candidate->person->barangay_id == Auth::user()->voter->person->barangay_id)
                                    <tr>
                                        <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                        <td>{{ $electoral->candidate->ballot_name }}</td>
                                        <td>{{ $electoral->partylist->name }}</td>
                                        <?php $desc = $position->description ?>
                                        <td><input id="{{ $position->description }}{{ $q }}" type="checkbox" name="{{ $position->description }}[]" value="{{ $electoral->id }}" onclick="CountChecks({{ $count }},{{ $position->num_winners }},'{{ $desc }}',this)"></td>
                                        <?php $q++; ?>
                                    </tr>
                                    @endif
                                @endauth
                            @endif
                        @endif
                    @endforeach
                @endif
                
                </tbody>
                @endif
            </table>    
        </div>
        <br><br>i
    @endforeach
        
        <center>
            <button class="btn btn-primary">Submit Vote</button>
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </center>
    </form>
</div>

<script type="text/javascript">
    function CountChecks(numOfEntries,maxchecked,extension,latestcheck) {
        // An array containing the id of each checkbox to monitor. 
        //   List the id of each checkbox in the set. If more than 
        //   one set, list other sets in their own arrays. The
        //   array name to use is passed to this function.

        var list = new Array();
        var x;
        for(x=0;x<numOfEntries;x++){
            list.push(x);
        }
        // End of customization.
        var count = 0;
        for( var i=0; i<list.length; i++ ) {
            
            if( document.getElementById(extension+""+list[i]).checked == true) { 
                count++;
            }
            
            if( count > maxchecked ) { 
                latestcheck.checked = false; 
                alert('Sorry, only ' + maxchecked + ' may be checked.');
            }
        }
    }
    

</script>
            @endif
        @endauth
    @endif

@endsection