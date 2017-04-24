<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCalloutPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts',function(Blueprint $table){
            $table->string('callout'); //Breaker
            $table->string('subtitle');
            $table->string('address');
            $table->string('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts',function(Blueprint $table){
            $table->dropColumn('callout');
            $table->string('subtitle');
            $table->string('address');
            $table->string('author');
        });
    }
}
