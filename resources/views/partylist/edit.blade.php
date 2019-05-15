@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Partylist Information Update</div>
                    <div class="card-body">
                        <form action="{{ route('partylist.update', ['id' => $partylist->id ]) }}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                            <div class="form-group">
                                <label>Partylist Name</label>
                                <input type="text" class="form-control" name="name" value={{ $partylist->name }} required>
                                <label>Logo</label><br>
                                <input type="file" name="image"><br>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route ('partylist.index') }}" class="btn btn-danger"></i>Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection