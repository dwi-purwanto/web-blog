@extends('../layouts/app_master')

@section('content')	 
	<div class="container">
		<div class="row" style="margin-top: 100px">						
			<div class="col-md-12">
				<form action="javascript:void(0)" method="POST" id="form-edit">	        
					  {{ csrf_field() }}
					  <div class="form-group">
					    <label for="title">Title : </label>
					    <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
							<input type="hidden" id="id-blog" value="{{$blog->id}}">
							@if ($errors->has('title'))
					  		<p class="alert alert-danger">{{ $errors->first('title') }}</p>
					  	@endif
					  </div>					  
					  <input type="hidden" name="_method" value="PUT">					  
					  <div class="form-group">
					    <label for="title">Nama Pengarang : </label>
					    <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" value="{{$blog->blog_detail->nama_pengarang}}">
					  	@if ($errors->has('nama_pengarang'))
					  		<p class="alert alert-danger">{{ $errors->first('nama_pengarang') }}</p>
					  	@endif
					  </div>		
					 	<div class="form-group">
					    <label for="description">Description : </label>
					    <textarea name="descrip" id="" cols="30" rows="10" class="form-control">{{$blog->deskripsi}}</textarea>
					  	@if ($errors->has('descrip'))
					  		<p class="alert alert-danger">{{ $errors->first('descrip') }}</p>
					  	@endif
					  </div>					  				  
					  <button type="submit" class="btn btn-primary" id="button-edit">Edit Data</button>
						<a href="/blog" class="btn btn-danger">Cancel</a>
				</form>
			</div>
		</div>
	</div>
		
@endsection 
