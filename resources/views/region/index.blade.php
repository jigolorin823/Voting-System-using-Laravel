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
                @foreach($regions as $region)
                    <tr>
                        <td>{{$region->id}}</td>
                        <td>{{$region->description}}</td>
                        <td>
                            <a href="{{ route('province.show' , ['region_id' => $region->id]) }}" class="btn btn-info">View Provinces</a>
                            
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

        </div>
    </div>
        

    
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection
