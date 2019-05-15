@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Update</div>
                    <div class="card-body">
                        <H3>{{$admininfo->user->name}}</H3>
                        <form action="{{ route ('admininfo.store') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label>Region Assigned:</label> <br>
                                <select name="region">
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->description }}</option>
                                @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection