<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewbornDatasTable extends Migration
{
    public function up()
    {
        Schema::create('newborn_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trial_code');
            $table->string('name')->nullable();
            $table->string('mother_name');
            $table->integer('mother_age');
            $table->integer('gravidity')->nullable();
            $table->integer('parity')->nullable();
            $table->float('accel_x', 15, 6)->nullable();
            $table->float('accel_y', 15, 6)->nullable();
            $table->float('accel_z', 15, 6)->nullable();
            $table->float('thermal', 15, 6)->nullable();
            $table->integer('pulse')->nullable();
            $table->integer('spo_2')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
