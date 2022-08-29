<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuriyentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuriyents', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('country_id');
            $table->string('name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('pasport');
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
        Schema::dropIfExists('kuriyents');
    }
}
