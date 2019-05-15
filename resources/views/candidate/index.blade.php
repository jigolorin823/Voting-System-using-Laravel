@extends('layouts.app1')

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
                        <td>Ballot Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($candidates as $candidate)
                    <tr>
                        <td>{{$candidate->id}}</td>
                        <td>{{$candidate->person->name->fName}} {{$candidate->person->name->lName}}</td>
                        <td>{{$candidate->ballot_name}}</td>
                        <td>
                            <a href="{{ route('candidate.show' , ['candidate_id' => $candidate->id]) }}" class="btn btn-info">Details</a>
                            <a href="{{ route('candidate.edit' , ['candidate_id' => $candidate->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            

        </div>
    </div>
        

    <div class="container">
        <a href="{{ route ('candidate.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Candidate</a>
    </div>
    @elseif(Auth::user()->role_id==2)
    <div class="col-lg-12">
    
    <div class="table-responsive">
        <table id="table_id" class="table">
        <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Ballot Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
            <tbody>
            <?php $userID =Auth::user()->id;  
                        $admin = $admins->where('user_id',"==",$userID)->first();
                        $adminRegID = $admin->region_id;
            ?>
            @foreach($candidates as $candidate)
            <?php $candRegID = $candidate->person->barangay->city->province->region_id;
            ?>
                @if($candRegID==$adminRegID)
                <tr>
                    <td>{{$candidate->id}}</td>
                    <td>{{$candidate->person->name->fName}} {{$candidate->person->name->lName}}</td>
                    <td>{{$candidate->ballot_name}}</td>
                    <td>
                        <a href="{{ route('candidate.show' , ['candidate_id' => $candidate->id]) }}" class="btn btn-info">Details</a>
                        <a href="{{ route('candidate.edit' , ['candidate_id' => $candidate->id]) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        

    </div>
</div>
    

<div class="container">
    <a href="{{ route ('candidate.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Candidate</a>
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
                        title: 'Candidates',
                        exportOptions: {
                            columns: [ 1,2 ]
                        },
                        message: 'candidates_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    },
                    {
                        text: 'Print Details',
                        extend: 'print',
                        title: 'Candidates',
                        exportOptions: {
                            columns: [ 1,2, ]
                        },
                        message: 'candidates_list_'+getDate(),
                        messageBottom: 'Waeyatic '+getyear()
                    }
                ]
            
            });
    });
    </script>
@endsection