@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voter Update</div>
                    <div class="card-body">
                        <form action="{{ route('voter.update', ['id' => $voter->id ]) }}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" value="{{ $voter->person->name->fName }}" required>
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="mname" value="{{ $voter->person->name->mName }}" required>
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" value="{{ $voter->person->name->lName }}" required>
                                <label>Gender</label><br>
                                <select name="gender">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}" {{ ($voter->person->gend_id == $gender->id)? 'selected="selected"':'' }}>{{ $gender->description }}</option>
                                    @endforeach
                                </select> <br>
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="birthdate" value="{{ $voter->person->date_birth }}" required>
                                <label>Region</label><br>
                                <select name="region">
                                    @foreach($regions as $region)
                                        <option value="{{ $region->id }}" {{ ($voter->person->barangay->city->province->reg_id == $region->id)? 'selected="selected"':'' }}>{{ $region->description }}</option>
                                    @endforeach
                                </select> <br>
                                <label>Province</label><br>
                                <select name="prov">
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}" {{ ($voter->person->barangay->city->province_id == $province->id)? 'selected="selected"':'' }}>{{ $province->description }}</option>
                                    @endforeach
                                </select><br>
                                <label>City</label><br>
                                <select name="city">
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ ($voter->person->barangay->city_id == $city->id)? 'selected="selected"':'' }}>{{ $city->description }}</option>
                                    @endforeach
                                </select><br>
                                <label>Barangay</label><br>
                                <select name="brgy">
                                    @foreach($barangays as $barangay)
                                        <option value="{{ $barangay->id }}" {{ ($voter->person->barangay_id == $barangay->id)? 'selected="selected"':'' }}>{{ $barangay->description }}</option>
                                    @endforeach
                                </select><br>
                                <label>House No./Street</label>
                                <input type="text" class="form-control" name="strt" value="{{ $voter->person->house_street }}" required>
                                <label>Civil Status</label><br>
                                <select name="civil_status">
                                    @foreach($civilstatuses as $civilstatus)
                                        <option value="{{ $civilstatus->id }}" {{ ($voter->person->civil_status_id == $civilstatus->id)? 'selected="selected"':'' }}>{{ $civilstatus->description }}</option>
                                    @endforeach
                                </select><br>
                                <label>Occupation</label>
                                <input type="text" class="form-control" name="occup" value="{{ $voter->person->occupation }}" required>
                                <label>Image</label><br>
                                <input type="file" name="image" value="{{ $voter->person->image }}"><br>
                                <label>Voter's ID</label>
                                <input type="text" class="form-control" name="voter_id" value="{{ $voter->voter_id }}" required>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
@endsection