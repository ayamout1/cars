<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mmr')->nullable();
            $table->string('caroffer')->nullable();
            $table->string('blackbook')->nullable();
            $table->string('retail')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
