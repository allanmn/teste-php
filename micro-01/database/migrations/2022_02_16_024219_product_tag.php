<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tag', function (Blueprint $table) {
            $table->foreignId('product_id');
            $table->foreignId('tag_id');
            $table->index('product_id');
            $table->index('tag_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tag');
        Schema::dropForeign('product_id');
        Schema::dropForeign('tag_id');
        Schema::dropIndex('tag_id');
        Schema::dropIndex('product_id');
    }
}
