@extends('layouts.app1')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Voter Information</div>
                    <div class="card-body">
                        <form action="{{ route('voter.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" required>
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="mname" required>
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" required>
                                <label>Gender</label><br>
                                <select name="gender">
                                    @foreach($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->description }}</option>
                                    @endforeach
                                </select> <br>
                                <label>Birthdate</label>
                                <input type="text" class="form-control" name="birthdate" required>
                                <label>Region</label><br>
                                <div id="dropdown">
                                    <select name="region" id="selectReg" onchange="setProvs({{ $provinces }})">
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->description }}</option>
                                        @endforeach
                                    </select> <br>
                                    <label>Province</label><br>
                                    <select name="prov" id="selectProv" onchange="setCities({{ $cities }})">
                                       
                                    </select><br>
                                    <label>City</label><br>
                                    <select name="city" id="selectCity" onclick="setBarangays({{ $barangays }})">
                                    </select><br>
                                    <label>Barangay</label><br>
                                    <select name="brgy" id="selectBrgy">
                                    </select>
                                </div>
                                <br>
                                <label>House No./Street</label>
                                <input type="text" class="form-control" name="strt" required>
                                <label>Civil Status</label><br>
                                <select name="civil_status">
                                    @foreach($civilstatuses as $civilstatus)
                                        <option value="{{ $civilstatus->id }}">{{ $civilstatus->description }}</option>
                                    @endforeach
                                </select><br>
                                <label>Occupation</label>
                                <input type="text" class="form-control" name="occup" required>
                                <label>Image</label><br>
                                <input type="file" name="image" required><br>
                                <label>Voter's ID</label>
                                <input type="text" class="form-control" name="voter_id" required>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('voter.index') }}" class="btn btn-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
       </div>
    </div>
    
@endsection

@section('script')
<script type="text/javascript">
    var provinces = [];
    var cities = [];
    var barangays = [];
    function setProvs(provincess){
        provinces = provincess;
    }
    function setCities(citiess){
        cities = citiess;
    }
    function setBarangays(barangayss){
        barangays = barangayss;
    }
       $(document).ready(function(){
            $("#selectReg").click(function(){
                var reg_id = $(this).children("option:selected").val();
                var struct;
                $('#selectProv').empty();
                for(q=0;q<provinces.length;q++){
                    if(provinces[q].region_id==reg_id){
                        $('#selectProv').append(new Option(provinces[q].description,provinces[q].id));
                    }
                }
                
            });
            $("#selectProv").click(function(){
                var reg_id = $(this).children("option:selected").val();
                var struct;
                $('#selectCity').empty();
                for(q=0;q<cities.length;q++){
                    if(cities[q].province_id==reg_id){
                        $('#selectCity').append(new Option(cities[q].description,cities[q].id));
                    }
                }
                
            });
            $("#selectCity").click(function(){
                var reg_id = $(this).children("option:selected").val();
                var struct;
                $('#selectBrgy').empty();
                for(q=0;q<barangays.length;q++){
                    if(barangays[q].city_id==reg_id){
                        $('#selectBrgy').append(new Option(barangays[q].description,barangays[q].id));
                    }
                }
                
            });
        });
</script>
@endsection
