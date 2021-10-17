<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('fname')->nullable();
            $table->string('verification')->nullable();
            $table->string('phone')->nullable();
            $table->string('cnic')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('city')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('package_id')->nullable();
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('left')->nullable();
            $table->string('right')->nullable();
            $table->string('address')->nullable();
            $table->float('ad_veiw')->default(0);
            $table->float('balance')->default(0);
            $table->float('r_earning')->default(0);
            $table->date('a_date')->nullable();
            $table->unsignedSmallInteger('refer_by')->nullable();
            $table->unsignedSmallInteger('left_refferal')->nullable();
            $table->unsignedSmallInteger('right_refferal')->nullable();
            $table->float('left_amount')->default(0);
            $table->float('right_amount')->default(0);
            $table->string('refer_type')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
