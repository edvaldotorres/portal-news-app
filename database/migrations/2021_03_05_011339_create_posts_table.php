<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {                                                               
            $table->increments('id');
            
            // $table->unsignedInteger('id_user')->nullable();
            // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->string('title');
            $table->string('lead', 191);
            $table->text('content');
            $table->boolean('published');
            // $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
