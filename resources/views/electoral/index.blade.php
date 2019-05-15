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
      @if(Auth::user()->role_id==1)
    <div class="col-lg-12">
    
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Ballot Name</td>
                        <td>Position</td>
                        <td>Partylist</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($electorals as $electoral)
                    @if($electoral->year_id==$year->id)
                    <tr>
                        <td>{{$electoral->id}}</td>
                        <td>{{$electoral->candidate->ballot_name}}</td>
                        <td>{{$electoral->position->description}}</td>
                        <td>{{$electoral->partylist->name}}</td>
                        <td>
                            <a href="{{ route('electoral.show' , ['electoral_id' => $electoral->id]) }}" class="btn btn-info">Details</a>
                            <a href="{{ route('electoral.edit' , ['electoral_id' => $electoral->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            

        </div>
    </div>
        

    <div class="container">
        <a href="{{ route ('electoral.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Electoral</a>
    </div>
    @elseif(Auth::user()->role_id==2)
    <div class="col-lg-12">
    
    <div class="table-responsive">
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Ballot Name</td>
                    <td>Position</td>
                    <td>Partylist</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php $userID =Auth::user()->id;  
                        $admin = $admins->where('user_id',$userID)->first();
                        $adminRegID = $admin->region_id;
            ?>
            @foreach($electorals as $electoral)
            @if($electoral->year_id==$year->id)
            <?php $candidateRegID = $electoral->candidate->person->barangay->city->province->region_id;
            ?>
                @if($candidateRegID==$adminRegID)
                <tr>
                    <td>{{$electoral->id}}</td>
                    <td>{{$electoral->candidate->ballot_name}}</td>
                    <td>{{$electoral->position->description}}</td>
                    <td>{{$electoral->partylist->name}}</td>
                    <td>{{$electoral->status}}</td>
                    <td>
                        <a href="{{ route('electoral.edit' , ['electoral_id' => $electoral->id]) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                @endif
            @endif
            @endforeach
            </tbody>
        </table>

        

    </div>
</div>
    

<div class="container">
    <a href="{{ route ('electoral.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Electoral</a>
</div>
        @else
            <h2 style="text-align:center;">Candidates for 2019 Election</h2>
            <br>
                <?php 
                    foreach($positions as $position){ ?>
                        <div class="col-lg-12">
                        <h4 style="text-align:center;">{{ $position->description }}</h4>
                        <div class="table-responsive">
                            <table  class="table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Partylist</th>
                                    </tr>
                                </thead>
                                <tbody>
                <?php        
                        if($position->level_id==1){
                            foreach($electorals as $electoral){
                                if($electoral->year_id==$year->id){
                                    
                                    if($position->id==$electoral->position_id){ ?>
                                    
                                        <tr>
                                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                            <td>{{ $electoral->candidate->ballot_name }}</td>
                                            <td>{{ $electoral->partylist->name }}</td>
                                        </tr>
                <?php               }
                                }
                            }
                        } else {
                            foreach($electorals as $electoral){
                                if($electoral->year_id==$year->id){
                                if($position->id==$electoral->position_id){
                                    switch($electoral->position_id){
                                        case "4": {
                                                    if($electoral->candidate->person-> barangay->city->prov_id == Auth::user()->voter->person-> barangay->city->prov_id){ ?>
                                                        <tr>
                                                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                                            <td>{{ $electoral->candidate->ballot_name }}</td>
                                                            <td>{{ $electoral->partylist->name }}</td>
                                                        </tr>
                <?php                               } 
                                                    break;
                                                }
                                                
                                        case "5":{
                                                    if($electoral->candidate->person-> barangay->city_id == Auth::user()->voter->person-> barangay->city_id){ ?>
                                                        <tr>
                                                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                                            <td>{{ $electoral->candidate->ballot_name }}</td>
                                                            <td>{{ $electoral->partylist->name }}</td>
                                                        </tr>
                <?php                               } 
                                                    break;
                                                }
                                        case "6":{
                                                    if($electoral->candidate->person-> barangay_id == Auth::user()->voter->person-> barangay_id){ ?>
                                                        <tr>
                                                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="50" height="80"></td>
                                                            <td>{{ $electoral->candidate->ballot_name }}</td>
                                                            <td>{{ $electoral->partylist->name }}</td>
                                                        </tr>
                <?php                               } 
                                                    break;
                                                }
                                            }
                                    }
                                }
                            }
                        }
                        echo "</tbody></table></div></div>";
                    }
                ?>
                
        @endif
    @endauth
@endif

@endsection

@section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>
    <script>
        function getDate(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 

            today = mm + '' + dd + '' + yyyy;
            return today;
            
        }
        function getyear(){
            var today = new Date();
            var yyyy = today.getFullYear();
            return yyyy;
            
        }
   
        function btnClickOpen(id) {
            document.getElementById('myModal').style.display = "block";
        }

        function btnClickClose() {
            document.getElementById('myModal').style.display = "none";
        }
    $(document).ready(function () {
        $('#table_id').DataTable({
            "scrollY":        "300px",
                "scrollCollapse": true,
                "order": [[ 1, "asc" ]],
                "dom": 'Bfrtip',
                "paging": false,
                buttons: [
                
                    {
                        text: 'Create PDF',
                        extend: 'pdfHtml5',
                        title: 'Electorals',
                        exportOptions: {
                            columns: [ 1,2,3 ]
                        },
                        message: 'electorals_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    },
                    {
                        text: 'Print Details',
                        extend: 'print',
                        title: 'Electorals',
                        exportOptions: {
                            columns: [ 1,2,3 ]
                        },
                        message: 'electorals_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    }
                ]
            
            });
    });
    </script>
@endsection