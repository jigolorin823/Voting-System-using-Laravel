@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Barangay</div>
                    <div class="card-body">
                        <form action="{{ route('barangay.update', ['id' => $barangay->id ]) }}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                            <div class="form-group">
                                <label>Region:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ ($barangay->city->prov->reg_id == $region->id)? 'selected="selected"':'' }}>{{ $region->description }}</option>
                                @endforeach
                                </select><br>
                                <label>Province:</label> <br>
                                <select name="prov">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}" {{ ($barangay->city->prov_id == $province->id)? 'selected="selected"':'' }}>{{ $province->description }}</option>
                                @endforeach
                                </select><br>
                                <label>City:</label> <br>
                                <select name="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ ($barangay->city_id == $city->id)? 'selected="selected"':'' }}>{{ $city->description }}</option>
                                @endforeach
                                </select><br>
                                <label>Barangay:</label>
                                <input type="text" class="form-control" name="description" value="{{ $barangay->description }}" required>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection