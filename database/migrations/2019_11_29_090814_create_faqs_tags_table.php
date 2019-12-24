<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('faq_id');
            $table->integer('tag_id');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at');
            $table->foreign('faq_id')->references('id')->on('faq');
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
        Schema::dropIfExists('faqs_tags');
    }
}
