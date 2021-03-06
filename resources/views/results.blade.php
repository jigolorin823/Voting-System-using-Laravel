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
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>

@endsection

@section('content')
<div class="col-lg-12">
<div class="table-responsive">
    
                
                @foreach($positions as $position)
                   
                        <center><h2><strong>{{ $position->description }}</strong></h2></center><br>
                        <center><div class="table-responsive">
                            <table style="text-align:center" id="table_id{{ $position->id }}" width="70%">
                                <thead>
                                    <tr>
                                        <th><h4>Image</h4></th>
                                        <th><h4>Name</h4></th>
                                        <th><h4>Votes</h4></th>
                                        <th><h4>Action</h4></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($electorals as $electoral)
                                    @if($electoral->position_id == $position->id)
                                        <tr>
                                            <td><img src="{{ url($electoral->candidate->person->image) }}" alt="Image" width="80" height="120"></td>
                                            <td><h5>{{ $electoral->candidate->ballot_name }}</h5></td>
                                            <td><h5>{{ $electoral->votesCount }}</h5></td>
                                            <td><a href="{{ route('resultsPerRegion',['id'=>$electoral->id]) }}" class="btn btn-info">View Details</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>    
                        </div></center>
                
                    <br><br>

                  

                <br><br>
                @endforeach
           
</div>

</div>
@endsection

@section('script')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('#table_id1').DataTable( {
		"scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
    $('#table_id2').DataTable( {
		"scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
    $('#table_id3').DataTable( {
		"scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
    $('#table_id4').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
    $('#table_id5').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
    $('#table_id6').DataTable( {
        "scrollY":        "300px",
        "scrollCollapse": true,
		"order": [[ 2, "desc" ]],
        "dom": 'Bfrtip',
		"paging": false,
        buttons: [
           
            {
                    text: 'Create PDF',
                    extend: 'pdfHtml5',
                    title: 'Vote_Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                },
                {
                    text: 'Print Details',
                    extend: 'print',
                    title: 'Vote Details',
                    exportOptions: {
                        columns: [ 1, 2 ]
                    },
                    messageBottom: 'Waeyatic '+getyear(),
                     
                }
        ]
	
    } );
} );
function getyear(){
        var today = new Date();
        var yyyy = today.getFullYear();
 return yyyy;
        
    }
</script>
@endsection
