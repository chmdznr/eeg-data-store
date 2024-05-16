<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewbornEegsTable extends Migration
{
    public function up()
    {
        Schema::create('newborn_eegs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trial_code');
            $table->string('channel')->nullable();
            $table->float('value', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
