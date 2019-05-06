@extends('../layouts/app_master')

@section('content')	 
	<div class="container">
		<div class="row" style="margin-top: 100px">			
			<div class="col-md-12">
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Create Blog</button>
					<div class="table-responsive" style="margin-top: 20px">					  
				    <table class="table table-bordered text-center" id="table-blogs">
				        <thead class="bg-primary">
				            <tr>
				                <th class="text-center">ID</th>
				                <th class="text-center">Title</th>
				                <th class="text-center">Description</th>					                								
				                <th class="text-center">Actions</th>
				            </tr>
				        </thead>
				        {{-- @foreach($blogs as $blog)
				        <tr class="item{{$blog->id}}">
				            <td id="{{$blog->id}}">					            							            	 
				            	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$blog->id}}">Detail Blog ID : {{$blog->id}} </button>
				            </td>
				            <td>{{$blog->title}}</td>
				            <td>{{$blog->deskripsi}}</td>				
				            <td>{{$blog->created_at}}</td>
				            <td>{{$blog->updated_at}}</td>					            
				            <td>				            	
				            	<a href="/blog/{{$blog->id}}/edit" class="btn btn-info">Edit Data</a>
				              <button class="button-delete btn btn-danger" data-id="{{$blog->id}}" data-name="{{$blog->title}}">Delete</button>				            	
				            </td>
				        </tr>				        

				        <!-- Modal Detail-->
								<div id="{{$blog->id}}" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">{{$blog->title}}</h4>
								      </div>
								      <div class="modal-body">
								        <div class="row">
								        	<div class="col-md-12">
								        		<h3> Deskripsi : {{ $blog->deskripsi }}</h3>
								        		<h3> Pengarang : {{ $blog->blog_detail->nama_pengarang}} </h3>
								        		@php $i = 1; @endphp
								        		@foreach ($blog->coments as $coment)									        			
								        			<p>Komentar @php echo $i++; @endphp : {{ $coment->isi_komentar }}</p>
								        		@endforeach
								        	</div>
								        </div>
								      </div>
								    </div>

								  </div>
								</div>	
				        @endforeach --}}
				    </table>							    
					</div>				
			</div>
		</div>
	</div>
	
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Create Blog</h4>
	      </div>
	      <div class="modal-body">
	        <form action="javascript:void(0)" method="POST" id="form-blog">	        
					  {{ csrf_field() }}
					  <div class="form-group">
					    <label for="title">Title : </label>
					    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
					  	@if ($errors->has('title'))
					  		<p class="alert alert-danger">{{ $errors->first('title') }}</p>
					  	@endif
					  </div>					  
					  <div class="form-group">
					    <label for="title">Nama Pengarang : </label>
					    <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" value="{{old('nama_pengarang')}}">
					  	@if ($errors->has('nama_pengarang'))
					  		<p class="alert alert-danger">{{ $errors->first('nama_pengarang') }}</p>
					  	@endif
					  </div>		
					 	<div class="form-group">
					    <label for="description">Description : </label>
					    <textarea name="descrip" id="" cols="30" rows="10" class="form-control">{{old('descrip')}}</textarea>
					    @if ($errors->has('descrip'))
					  		<p class="alert alert-danger">{{ $errors->first('descrip') }}</p>
					  	@endif
					  </div>					  				  
					  <button type="submit" class="btn btn-primary" id="button-save">Create</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</form>
	      </div>
	    </div>

	  </div>
	</div>
@endsection 
