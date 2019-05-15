@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Partylist Information</div>
                    <div class="card-body">
                        <form action="{{ route('partylist.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>Partylist Name</label>
                                <input type="text" class="form-control" name="name" required>
                                <label>Logo</label><br>
                                <input type="file" name="image" required><br>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('partylist.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection