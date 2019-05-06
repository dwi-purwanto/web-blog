<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Blog;
use App\Models\BlogDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {    	
    	$blogs = Blog::get();    	    
    	return view('blog.index', ['blogs' => $blogs]);
    }    

    public function store(Request $request)
    {			    	
    	$this->validate($request, [
    		'title' 					=> 'required',
    		'descrip' 				=> 'required|min:5',
    		'nama_pengarang'	=> 'required' 
    	]);

			$blog = new Blog;      
      $blog->title 		 = $request->title;
      $blog->deskripsi = $request->descrip;
      $blog->save();    	
      if ( $blog == TRUE) {
	    		$blogDetail = new BlogDetail;
	    		$blogDetail->blog_id 		 		 = $blog->id;
		      $blogDetail->nama_pengarang  = $request->nama_pengarang;
		      $blogDetail->save();    			      
	        return response()->json($blog);
	    } else {
	        return response()->json([
	          'error' => 'data gagal disimpan'
	        ]);
	    }			
    }

    public function destroy($id)
    {
      Blog::find($id)->delete($id);
	  
	    return response()->json([
	        'success' => 'Record deleted successfully!'
	    ]);
    }

    public function edit($id)
    {
    	$blog = Blog::find($id);

    	return view('blog.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {		
    	$this->validate($request, [
    		'title' 					=> 'required',
    		'descrip' 				=> 'required|min:5', 
    		'nama_pengarang'	=> 'required'
    	]);	    	    	

			$blog = Blog::find($id);      
      $blog->title 		 = $request->title;
      $blog->deskripsi = $request->descrip;
      $blog->save();    	
      if ( $blog == TRUE) {
	    		$blogDetail = BlogDetail::where('blog_id', $id)->first();	    		
		      $blogDetail->nama_pengarang  = $request->nama_pengarang;
		      $blogDetail->save();    			      
	        return response()->json($blog);
	    } else {
	        return response()->json([
	          'error' => 'data gagal disimpan'
	        ]);
	    }			
    }

    public function json()
    {
      $blog = DB::table('blogs')->select('id', 'title', 'deskripsi')->get();
      return Datatables::of($blog)
      ->addColumn('action', function( $row){        
        return "<a href=\"".route('edit', $row->id)."\" class=\"btn btn-info\">Edit Data</a>
                      <form action=\"".route('delete', $row->id)."\" method=\"post\">
                          <input class='btn btn-default' type='submit' value='Delete' />
                          <input type='hidden' name='_method' value='delete' />                          
                      </form>";
      })->make(true);
    }    

}
