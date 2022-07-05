<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('full_name');
            $table->string('profession');
            $table->string('company');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('speakers');
    }
};
