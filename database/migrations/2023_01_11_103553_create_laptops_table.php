<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("brand_id");
            $table->foreign("brand_id")->references("id")->on("brands")->onUpdate("cascade")->onDelete("cascade");
            $table->string('type');
            $table->string('model');
            $table->string('processor');
            $table->integer('ram');
            $table->integer('storage');
            $table->integer('price');
            $table->string('image');
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
        Schema::dropIfExists('laptops');
    }
}
