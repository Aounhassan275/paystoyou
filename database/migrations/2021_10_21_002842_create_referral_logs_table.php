<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('main_owner')->nullable();
            $table->unsignedSmallInteger('leftUser')->nullable();
            $table->unsignedSmallInteger('rightUser')->nullable();
            $table->integer('countLeft')->default(0);
            $table->integer('countRight')->default(0);
            $table->double('amount')->default(0);
            $table->string('type')->nullable();
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
        Schema::dropIfExists('referral_logs');
    }
}
