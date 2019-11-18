<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivationDataToProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('activation_number')->nullable();
            $table->string('reply_activation_number')->nullable();
            $table->dateTime('activation_date')->nullable();
            $table->dateTime('activation_request_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->string('activation_number')->nullable();
            $table->string('reply_activation_number')->nullable();
            $table->dateTime('activation_date')->nullable();
            $table->dateTime('activation_request_date')->nullable();
        });
    }
}
