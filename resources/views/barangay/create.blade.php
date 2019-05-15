@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add City</div>
                    <div class="card-body">
                        <form action="{{ route ('barangay.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Region:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->description }}</option>
                                @endforeach
                                </select>
                                <label>Province:</label> <br>
                                <select name="prov">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->description }}</option>
                                @endforeach
                                </select>
                                <label>City:</label> <br>
                                <select name="city">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->description }}</option>
                                @endforeach
                                </select>
                                <label>Barangay:</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <button class="btn btn-primary">Add</button>
                            <a href="{{ route('barangay.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection