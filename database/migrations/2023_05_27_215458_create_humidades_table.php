<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumedadTable extends Migration
{
    public function up()
    {
        Schema::create('humedad', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad');
            $table->float('humedad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('humedades');
    }
};
