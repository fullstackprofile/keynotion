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
            $table->string('slug');
            $table->string('full_name');
            $table->string('profession');
            $table->string('company');
            $table->string('company_logo');
            $table->string('avatar');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('speakers');
    }
};
