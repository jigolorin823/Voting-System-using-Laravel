@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Electoral Information</div>
                    <div class="card-body">
                        <form action="{{ route('electoral.store') }}" method="POST">
                        @csrf
                        <label>Candidate</label><br>
                        <input type="text" id="default" list="people" placeholder="Candidate" name="cand"><br>
                        <datalist id="people">
                            @foreach($candidates as $candidate)
                            <option value="{{$candidate->id}}">{{$candidate->ballot_name}}</option>
                            @endforeach
                        </datalist>
                        <label>Position</label><br>
                        <input type="text" id="default" list="positions" placeholder="Position" name="position"><br>
                        <datalist id="positions">
                            @foreach($positions as $position)
                            <option value="{{$position->id}}">{{$position->description}}</option>
                            @endforeach
                        </datalist>
                        <label>Partylist</label><br>
                        <input type="text" id="default" list="partylist" placeholder="Partylist" name="partylist"><br>
                        <datalist id="partylist">
                            @foreach($partylists as $partylist)
                            <option value="{{$partylist->id}}">{{$partylist->name}}</option>
                            @endforeach
                        </datalist>
                        <input type="hidden" id="default" list="year" name="year" value="{{ $year->id }}"><br>
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('electoral.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection

