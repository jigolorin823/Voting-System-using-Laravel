@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update City</div>
                    <div class="card-body">
                        <form action="{{ route('city.update', ['id' => $city->id ]) }}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                            <div class="form-group">
                                <label>Region:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ ($city->prov->reg_id == $region->id)? 'selected="selected"':'' }}>{{ $region->description }}</option>
                                @endforeach
                                </select><br>
                                <label>Province:</label> <br>
                                <select name="prov">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ ($city->prov_id == $province->id)? 'selected="selected"':'' }}>{{ $province->description }}</option>
                                @endforeach
                                </select><br>
                                <label>City:</label>
                                <input type="text" class="form-control" name="description" value="{{$city->description}}" required>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection