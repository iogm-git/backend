<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'pgsql';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('DROP TABLE IF EXISTS member_data, instructor_courses, instructor_course_reviews, instructor_earnings, instructor_sections, instructor_lessons, student_questions, instructor_answers, student_stash, student_transactions, student_course_progress, student_certificates, discussion_forums CASCADE;');

        Schema::create('member_data', function (Blueprint $table) {
            $table->string('username')->primary();
            $table->string('name')->default('User');
            $table->enum('role', ['instructor', 'student']);
            $table->date('dob')->nullable();
            $table->string('address')->nullable()->default(null);
        });

        Schema::create('instructor_courses', function (Blueprint $table) {
            $table->id();
            $table->string('instructor_id');
            $table->string('title')->unique();
            $table->text('description');
            $table->decimal('price');
            $table->timestamps();

            $table->foreign('instructor_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('instructor_course_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->text('review');
            $table->unsignedInteger('rating');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('instructor_earnings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->date('recorded_at');
            $table->integer('amount');
            $table->string('status')->default('UNPAID');

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('instructor_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('title');
            $table->integer('order_in_course');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('instructor_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('title');
            $table->text('code')->nullable();
            $table->integer('order_in_section');
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('instructor_sections')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('student_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->text('question');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('instructor_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->string('instructor_id');
            $table->text('answer');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('student_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('instructor_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('student_stash', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('student_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->unsignedBigInteger('course_id');
            $table->integer('amount');
            $table->string('status')->default('UNPAID');
            $table->timestamps();

            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('student_course_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->decimal('completed_lectures')->default(0);
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('student_certificates', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('student_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('discussion_forums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('user_id');
            $table->text('message');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('instructor_courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('username')->on('member_data')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
