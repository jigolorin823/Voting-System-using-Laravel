@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Candidate Information</div>
                    <div class="card-body">
                        <form action="{{ route('candidate.store') }}" method="POST">
                        @csrf
                        <label>Person</label><br>
                        <input type="text" id="default" list="people" placeholder="Person" name="person"><br>
                        <datalist id="people">
                            @foreach($people as $person)
                            <option value="{{$person->name_id}}">{{$person->name->fName}} {{$person->name->lName}}</option>
                            @endforeach
                        </datalist>
                        <label>Ballot Name</label><br>
                        <input type="text" class="form-control" name="ballot_name" required><br>
                        
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('candidate.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>

    <script>
        function ifExists(id){
            
        }
    </script>
@endsection

