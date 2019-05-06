<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
      protected $fillable = ['blog_id', 'nama_pengarang'];
      protected $table = 'blog_detail';
}
