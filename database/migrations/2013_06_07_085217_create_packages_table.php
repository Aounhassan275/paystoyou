<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->float('price');
            $table->float('t_earning');
            $table->integer('ads');
            $table->double('click')->nullable();
            $table->integer('day');
            $table->string('w_day');
            $table->float('package_validity');
            $table->float('discount')->nullable();
            $table->integer('max')->nullable();
            $table->integer('min')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
