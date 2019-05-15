@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Province</div>
                    <div class="card-body">
                        <form action="{{ route('province.update', ['id' => $province->id ]) }}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                            <div class="form-group">
                                <label>Region:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ ($province->reg_id == $region->id)? 'selected="selected"':'' }}>{{ $region->description }}</option>
                                @endforeach
                                </select><br>
                                <label>Province:</label>
                                <input type="text" class="form-control" name="description" value="{{ $province->description }}"required>
                            </div>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection