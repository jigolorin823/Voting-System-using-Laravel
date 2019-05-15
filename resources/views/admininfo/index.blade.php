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
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Region</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <form action=""></form>
                <?php $z=1; ?>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{$admin->id}}</td>
                        <td>{{$admin->user->name}}</td>
                        <td>{{$admin->user->email}}</td>
                        <td>{{$admin->region->description}}</td>
                        <td>{{$admin->user->status? "Active":"Inactive"}}</td>
                        <td>
                        <button id="myBtn" onclick="btnClickOpen({{ $z }})" class="btn btn-info">{{$admin->user->status? "Deactivate":"Activate"}}</button>
                        </td>
                    </tr>
                    <?php $z++; ?>
                @endforeach
                </tbody>

            </table>
            <?php $x=1; ?>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                    <form action="{{ route('admininfo.update', ['id' => $x ]) }}" method="POST">
                    {{method_field('PUT')}}
                    @csrf
                        <input id="hidid" type="hidden" name="admin_id" value="0">

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
            
        </div>
    </div>
        

    <div class="container">
    <a href="{{ route ('admininfo.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Admin</a>
    </div>
        
@endsection

@section('script')
    <script type="text/javascript">
        function btnClickOpen(id) {
            document.getElementById('hidid').value = id;
            document.getElementById('myModal').style.display = "block";
        }

            // When the user clicks on <span> (x), close the modal
        function btnClickClose() {
            document.getElementById('myModal').style.display = "none";
        }

           
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection