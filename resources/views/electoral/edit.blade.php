@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Electoral Information Update</div>
                    <div class="card-body">
                        <form action="{{ route('electoral.update', ['id' => $electoral->id ]) }}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <label>Candidate</label><br>
                        <input type="text" id="default" list="people" placeholder="Candidate" name="person"><br>
                        <datalist id="people">
                            @foreach($candidates as $candidate)
                            <option value="{{$candidate->id}}" {{ ($electoral->candidate_id == $candidate->id)? 'selected="selected"':'' }}>{{$candidate->ballot_name}}</option>
                            @endforeach
                        </datalist>
                        <label>Position</label><br>
                        <input type="text" id="default" list="positions" placeholder="Position" name="position"><br>
                        <datalist id="positions">
                            @foreach($positions as $position)
                            <option value="{{$position->id}}" {{ ($electoral->position_id == $position->id)? 'selected="selected"':'' }}>{{$position->description}}</option>
                            @endforeach
                        </datalist>
                        <label>Partylist</label><br>
                        <input type="text" id="default" list="partylist" placeholder="Partylist" name="partylist"><br>
                        <datalist id="partylist">
                            @foreach($partylists as $partylist)
                            <option value="{{$partylist->id}}" {{ ($electoral->partylist_id == $partylist->id)? 'selected="selected"':'' }}>{{$partylist->name}}</option>
                            @endforeach
                        </datalist> <br>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection

