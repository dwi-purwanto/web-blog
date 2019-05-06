<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_id')->references('id')->on('blogs')->onDelete('cascade');   
            $table->string('nama_pengarang', 20);
            $table->timestamps();                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_detail');
    }
}
