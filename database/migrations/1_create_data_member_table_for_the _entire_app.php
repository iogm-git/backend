<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_data', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('username')->unique();
            $table->string('member_password')->nullable(false);
            $table->string('name')->default('User');
            $table->string('email')->nullable();
            $table->string('otp')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->default('profile.svg');
            $table->date('verification_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('member_data');
    }
};
