@extends('layouts.app1')

@section('content')
    <div class="col-lg-12">
        <div class="table-responsive">
            <table id="table_id" class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Year</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($years as $year)
                    <tr>
                        <td>{{$year->id}}</td>
                        <td>{{$year->year}}</td>
                        <td>{{$year->status? "Active": "Inactive" }}</td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

        </div>
    </div>
        
    <div class="container">
        <a href="{{ route ('year.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Electoral Year</a>
    </div>
    
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection
