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
                @foreach($provinces as $province)
                    <tr>
                        <td>{{$province->id}}</td>
                        <td>{{$province->description}}</td>
                        <td>
                            <a href="{{ route('city.show' , ['prov_id' => $province->id]) }}" class="btn btn-info">View Cities/Municipalities</a>
                            <a href="{{ route('province.edit' , ['id' => $province->id]) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

            

        </div>
    </div>
        

    <div class="container">
        <a href="{{ route ('province.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Province</a>
        <a href="{{ route ('province.index') }}" class="btn btn-info"><i class="fa fa-plus"></i>View all Provinces</a>
        @if (Route::has('login'))
            @auth
                @if(Auth::user()->role_id==1)
                    <a href="{{ route ('region.index') }}" class="btn btn-danger"></i>Back</a>
                @endif
            @endauth
        @endif
    </div>
        
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
           $('#table_id').DataTable();
        });
    </script>
@endsection