<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'deskripsi'];

    public function blog_detail()
    {
    	return $this->hasOne('App\Models\BlogDetail', 'blog_id', 'id');
    }

    public function coments()
    {
    	return $this->hasMany('App\Models\Coment', 'blog_id', 'id');
    }
}
