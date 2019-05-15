@extends('layouts.app1')

@section('content')
    <div class="col-lg-12">
    
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Description</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($barangays as $barangay)
                    <tr>
                        <td>{{$barangay->id}}</td>
                        <td>{{$barangay->description}}</td>
                        <td>
                            <a href="{{ route('barangay.edit' , ['id' => $barangay->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

        </div>
    </div>
        

    <div class="container">
        <a href="{{ route ('barangay.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Barangay</a>
        <a href="{{ route ('barangay.index') }}" class="btn btn-info"><i class="fa fa-plus"></i>View all Barangays</a>
        <a href="{{ route ('city.index') }}" class="btn btn-danger"></i>Back</a>
    </div>
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection