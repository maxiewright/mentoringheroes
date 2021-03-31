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
            $table->id();
            $table->string('title')->unique();
            $table->string('meta_title')->unique();
            $table->string('slug')->unique();
            $table->string('image_path');
            $table->text('excerpt');
            $table->text('body');
            $table->integer('view_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->foreignId('post_status_id')->default(1)->constrained();
            $table->boolean('is_featured')->default(0);
            $table->date('published_at')->nullable();
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
