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
            $table->string('slug')->unique();
            $table->longText('title');
            $table->longText('subtitle');
            $table->longText('content_raw');
            $table->longText('content_html');
            $table->string('page_image');
            $table->longText('meta_description');
            $table->string('author');
            $table->string('layout')->default('blog.post');
            $table->boolean('is_draft')->default(1);
            $table->timestamps();
            $table->timestamp('published_at')->nullable()->index();
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
