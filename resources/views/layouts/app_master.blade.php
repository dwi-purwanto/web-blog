<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
</head>
<body>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="{{route('home')}}">Blog</a></li>	      
	      <li><a href="#">Page 2</a></li>
	      <li><a href="#">Page 3</a></li>
	    </ul>
	  </div>
	</nav>	
	@yield('content')	
	<script src="{{ asset('js/jquery.min.js') }}"></script>		
	<script src="{{ asset('js/app.js') }}"></script>	
	<script src="{{ asset('datatables/datatables.min.js') }}"></script>		
	<script src="{{ asset('datatables/bootstrap4.min.js') }}"></script>		
	<script src="{{ asset('datatables/fixedHeader.min.js') }}"></script>		
	<script>	
		$("#button-edit").click(function(event) {	    
	    event.preventDefault();	    	    
	    var id = $('#id-blog').val();	    	    	   	    
	    $.ajax({
	        type: "post",
	        url: "/blog/"+id+"/edit",
	        dataType: "json",
	        data: $('#form-edit').serialize(),	        	
	        success: function(data){	              	         	      
	          alert("Data berhasil diedit");	              
	       		window.location="/blog";
	        },
	        error: function(data){
	            alert("error");
	        }
	    });			 
		});

		$("#button-save").click(function(event) {	    
	    event.preventDefault();	    	    
	    $.ajax({
	        type: "post",
	        url: "/blog/create",
	        dataType: "json",
	        data: $('#form-blog').serialize(),
	        success: function(data){	              	         	      
	          alert("Data berhasil disimpan");	              
	       		window.location.reload();
	        },
	        error: function(data){
	            alert("Error");
	        }
	    });			 
		});

		$(".button-delete").click(function(){
      	var token = $("meta[name='csrf-token']").attr("content");
        var id = $(this).data("id");                       
        $.ajax({
          url: "/blog/delete/"+id,
          type: 'DELETE',            
          data: {
              "id": id,                
              "_token": token,
          },
          success: function (){
              alert('Data berhasil dihapus');
              window.location.reload();
          }
        });        
    });

		$(document).ready(function() {
   		 // Setup - add a text input to each footer cell
	    $('#table-blogs thead tr').clone(true).appendTo( '#table-blogs thead' );
	    $('#table-blogs thead tr:eq(1) th').each( function (i) {
	        var title = $(this).text();
	        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
	 
	        $( 'input', this ).on( 'keyup change', function () {
	            if ( table.column(i).search() !== this.value ) {
	                table
	                    .column(i)
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
		 
	    var table = $('#table-blogs').DataTable( {
	        orderCellsTop: true,
	        fixedHeader: false,	       	   
	        processing: true,
	        serverSide: true,
	        ajax: {
				    "url": "{!! route("getjson") !!}",
				    "type": "GET",
				  },
	        columns: [
	            { data: 'id', name: 'id' },
	            { data: 'title', name: 'title' },
	            { data: 'deskripsi', name: 'deskripsi' },
	            { data: 'action', name: 'action' }
	        ]	 
	    });
		} );
	</script>
</body>
</html>