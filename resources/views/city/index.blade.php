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
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->id}}</td>
                        <td>{{$city->description}}</td>
                        <td>
                            <a href="{{ route('barangay.show' , ['city_id' => $city->id]) }}" class="btn btn-info">View Barangays</a>
                            <a href="{{ route('city.edit' , ['id' => $city->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

    </div>
    </div>
        

    <div class="container">
        <a href="{{ route ('city.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add City</a>
        <a href="{{ route ('city.index') }}" class="btn btn-info"><i class="fa fa-plus"></i>View all Cities</a>
        <a href="{{ route ('province.index') }}" class="btn btn-danger"></i>Back</a>
    </div>
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection