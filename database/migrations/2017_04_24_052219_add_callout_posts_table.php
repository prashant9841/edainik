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
            $table->string('callout')->nullable(); //Breaker
            $table->string('subtitle')->nullable();
            $table->string('address')->nullable();
            $table->string('author')->nullable();
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
            $table->dropColumn('subtitle');
            $table->dropColumn('address');
            $table->dropColumn('author');
        });
    }
}
