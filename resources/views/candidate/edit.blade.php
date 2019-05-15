@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Candidate Information Update</div>
                    <div class="card-body">
                        <form action="{{ route('candidate.update', ['id' => $candidate->id ]) }}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <label>Person</label><br>
                        <input type="text" id="default" list="people" placeholder="Person" name="person"><br>
                        <datalist id="people">
                            @foreach($people as $person)
                            <option value="{{$person->id}}" {{ ($candidate->person_id == $person->id)? 'selected="selected"':'' }}>{{$person->name->fName}} {{$person->name->lName}}</option>
                            @endforeach
                        </datalist>
                        <label>Ballot Name</label><br>
                        <input type="text" class="form-control" name="ballot_name" value="{{ $candidate->ballot_name }}" required><br>
                        
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection

