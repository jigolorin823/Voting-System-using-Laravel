@extends('layouts.app1')
@section('css')
<style>
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
                            <td>Name</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Voted</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voters as $voter)
                            <tr>
                                <td>{{ $voter->id }}</td>
                                <td>{{ $voter->person->name->fName." ".$voter->person->name->lName }}</td>
                                <td>{{ $voter->user->email }}</td>
                                <td>{{ $voter->status }}</td>
                                <td>{{ $voter->voted? "Yes":"No" }}</td>
                                <td>{{ $voter->person->house_street }}, {{ $voter->person->barangay->description }}, {{ $voter->person->barangay->city->description }}, {{ $voter->person->barangay->city->province->description }}</td>
                                <td>
                                    <a href="{{ route('voter.show' , ['id' => $voter->id]) }}" class="btn btn-info">Details</a>
                                    <a href="{{ route('voter.edit' , ['voter_id' => $voter->id]) }}" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                

            </div>
        </div>
            
<br>
        <div class="container">
            <a href="{{ route ('voter.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Voter</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button id="myBtn" onclick="btnClickOpen()" class="btn btn-success">Start Voting Period</button>
            <button id="myBtn2" onclick="btnClickOpen2()" class="btn btn-success">End Voting Period</button>
        </div>
        <div id="myModal" class="modal">
                    <div class="modal-content">
                    <form action="{{ route('startVoting') }}" method="GET">
                    @csrf
                        <div class="container">
                            <h2 style="text-align:center;">Are you sure?</h2>
                            <center><button style="width:50%" id="close" class="btn btn-primary">Confirm</button></center>
                            
                        </div>
                    </form>
                    <br>
                    <div class="container">
                    <center><button style="width:50%" class="btn btn-danger" onclick="btnClickClose()">Cancel</button></center>
                    </div>
                    </div>
                </div>
        <div id="myModal2" class="modal">
                    <div class="modal-content">
                    <form action="{{ route('endVoting') }}" method="GET">
                    @csrf
                        <div class="container">
                            <h2 style="text-align:center;">Are you sure?????</h2>
                            <center><button style="width:50%" id="close" class="btn btn-primary">Confirm</button></center>
                            
                        </div>
                    </form>
                    <br>
                    <div class="container">
                    <center><button style="width:50%" class="btn btn-danger" onclick="btnClickClose2()">Cancel</button></center>
                    </div>
                    </div>
                </div>
        @elseif(Auth::user()->role_id==2)
        <div class="col-lg-12">
            <div class="table-responsive">
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Status</td>
                            <td>Voted</td>
                            <td>Address</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $userID =Auth::user()->id;  
                        $admin = $admins->where('user_id',$userID)->first();
                        $adminRegID = $admin->region_id;
                    ?>
                        @foreach($voters as $voter)
                        <?php $voterRegID = $voter->person->barangay->city->province->region_id;
                        ?>
                            @if($voterRegID==$adminRegID)
                            <tr>
                                <td>{{ $voter->id }}</td>
                                <td>{{ $voter->person->name->fname." ".$voter->person->name->lName }}</td>
                                <td>{{ $voter->user->email }}</td>
                                <td>{{ $voter->status }}</td>
                                <td>{{ $voter->voted? "Yes":"No" }}</td>
                                <td>{{ $voter->person->house_street }}, {{ $voter->person->barangay->description }}, {{ $voter->person->barangay->city->description }}, {{ $voter->person->barangay->city->province->description }}</td>
                                <td>
                                    <a href="#" class="btn btn-info">Details</a>
                                    <a href="#" class="btn btn-info">Edit</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>

                

            </div>
        </div>
            
        
        <div class="container">
            <a href="{{ route ('voter.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Voter</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
        </div>

         
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
        function btnClickOpen2(id) {
            document.getElementById('myModal2').style.display = "block";
        }

        function btnClickClose2() {
            document.getElementById('myModal2').style.display = "none";
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
                        title: 'Voters',
                        exportOptions: {
                            columns: [ 1,2,3,4,5 ]
                        },
                        message: 'voters_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    },
                    {
                        text: 'Print Details',
                        extend: 'print',
                        title: 'Voters',
                        exportOptions: {
                            columns: [ 1,2,3,4,5 ]
                        },
                        message: 'voters_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    }
                ]
            
            });
    });
    </script>
@endsection
    