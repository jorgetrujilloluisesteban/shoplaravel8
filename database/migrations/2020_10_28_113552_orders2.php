<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders2', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('ordercontent');
            $table->dateTime('fecharegistro', 0);
            $table->integer('estado');
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
        Schema::dropIfExists('orders2');
    }
}
