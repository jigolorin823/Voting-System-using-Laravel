@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Province</div>
                    <div class="card-body">
                        <form action="{{ route ('province.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Region:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->description }}</option>
                                @endforeach
                                </select><br>
                                <label>Province:</label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                            <button class="btn btn-primary">Add</button>
                            <a href="{{ route('province.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection