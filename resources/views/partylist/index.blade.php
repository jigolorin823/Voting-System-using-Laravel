@extends('layouts.app1')

@section('content')
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($partylists as $partylist)
                    <tr>
                        <td>{{$partylist->id}}</td>
                        <td>{{$partylist->name}}</td>
                        <td>
                            <a href="{{ route('partylist.show' , ['id' => $partylist->id]) }}" class="btn btn-info">Details</a>
                            <a href="{{ route('partylist.edit' , ['id' => $partylist->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

        </div>
    </div>
        
    <div class="container">
        <a href="{{ route ('partylist.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Partylist</a>
    </div>
    
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection
