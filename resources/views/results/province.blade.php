@extends('layouts.app1')
@section('css')
<style>
table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>

@endsection
@section('content')
<div class="col-lg-12">
<center><h1><b>{{ $electoral->position->description }}</b></h1></center> <br><br>
    
            <?php $name = $electoral->candidate->ballot_name;
                    $pos=$electoral->position->description;
            ?>
          
            <center><h3><b>{{ $electoral->candidate->ballot_name }}</b></h3></center> <br><br>
            <div class="table-responsive">
                <table id="table">
                    <thead>
                    
                        <tr>
                            <th>Province</th>
                            <th>Votes</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php 
                        foreach($provinces as $province){
                            
                            $count=0;?>
                            <tr>
                            <td>{{$province->description}}</td>
                    <?php 
                            foreach($votes as $vote){
                                
                                
                                if($vote->vote->voter->person->barangay->city->province_id==$province->id){
                                    
                                    if($vote->electoral_id==$electoral->id){
                                        $count++;
                                    }
                                }
                            }
                    ?>
                            <td>{{$count}}</td>
                            <td><a href="{{ route('resultsPerCity',['id'=>$electoral->id,'province_id'=>$province->id]) }}" class="btn btn-info">View Details</a></td>
                            </tr>
                    <?php
                        }
                    ?>
                        
                    </tbody>

                </table>

                

            </div>
            
</div>
    

<div class="container">
    
    
                <a href="{{ route('resultsPerRegion',['id'=>$electoral->id]) }}" class="btn btn-danger"></i>Back</a>
           
</div>
    
@endsection
@section('script')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>
    <script>
    var name = <?php echo json_encode($name); ?>;
    var pos = <?php echo json_encode($pos); ?>;
    function getDate(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 

        today = mm + '' + dd + '' + yyyy;
        return today;
        
    }
    function getyear(){
        var today = new Date();
        var yyyy = today.getFullYear();
 return yyyy;
        
    }
    $(document).ready(function() {
        $('#table').DataTable( {
            "scrollY":        "300px",
            "scrollCollapse": true,
            "order": [[ 1, "desc" ]],
            "dom": 'Bfrtip',
            "paging": false,
            buttons: [
            
                {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 0, 1 ]
                    },
                    message: name+getDate(),
                    messageBottom: 'Waeyatic '+getyear(),
                    header: false
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 0, 1 ]
                    },
                    message: name+getDate(),
                    messageBottom: 'Waeyatic '+getyear(),
                    header: false
                }
            ]
        
    }    );
    } );
    </script>
@endsection