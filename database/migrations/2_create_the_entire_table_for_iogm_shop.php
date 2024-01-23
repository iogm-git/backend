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
        Schema::create('web_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('web_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('web_details', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('type');
            $table->integer('price')->nullable(false);

            $table->foreign('category')->references('id')->on('web_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('web_types')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('member_stash', function (Blueprint $table) {
            $table->id();
            $table->string('web_id');
            $table->string('member_id');

            $table->foreign('web_id')->references('id')->on('web_details')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('member_transactions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('member_id');
            $table->string('web_id');
            $table->timestamp('date')->useCurrent();
            $table->integer('amount')->nullable(false);
            $table->string('status')->default('unpaid');
            $table->json('midtrans_data')->nullable();

            $table->foreign('member_id')->references('id')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('web_id')->references('id')->on('web_details')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('web_categories');
        Schema::dropIfExists('web_types');
        Schema::dropIfExists('web_details');
        Schema::dropIfExists('member_stash');
        Schema::dropIfExists('member_transactions');
    }
};
