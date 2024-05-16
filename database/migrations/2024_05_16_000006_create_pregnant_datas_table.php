<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnantDatasTable extends Migration
{
    public function up()
    {
        Schema::create('pregnant_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trial_code');
            $table->string('name');
            $table->integer('gravidity');
            $table->integer('parity');
            $table->integer('age');
            $table->integer('hr')->nullable();
            $table->integer('spo_2')->nullable();
            $table->integer('resp_count')->nullable();
            $table->integer('sistole')->nullable();
            $table->integer('diastole')->nullable();
            $table->integer('fetal_hr')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
