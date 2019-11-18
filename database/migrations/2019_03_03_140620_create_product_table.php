<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('SN_Device')->unique();
            $table->string('NO_Sam')->nullable();
            $table->string('NO_Perso')->nullable();
            $table->string('PCID')->nullable();
            $table->string('CONFIG')->nullable();
            $table->string('Provinsi')->nullable();
            $table->string('Kota')->nullable();
            $table->string('Kecamatan')->nullable();
            $table->string('Alamat')->nullable();
            $table->string('IP_Address')->nullable();
            $table->string('User_name')->nullable();
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
        Schema::dropIfExists('product');
    }
}
