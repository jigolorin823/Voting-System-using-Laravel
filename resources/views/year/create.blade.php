@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Electoral Year</div>
                    <div class="card-body">
                        <form action="{{ route ('year.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Year:</label>
                                <input type="text" class="form-control" name="year" required>
                            </div>
                            <button class="btn btn-primary">Add</button>
                            <a href="{{ route('year.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection