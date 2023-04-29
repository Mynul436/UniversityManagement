<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();

            // $table->integer('student_id')->comment('user_id=student_id');
            $table->string('group_name')->nullable();
            $table->string('shift_name')->nullable();
            $table->string('class_name')->nullable();
            $table->string('section_name')->nullable();
            $table->integer('year')->nullable();

    $table->string('reg_no')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_email')->nullable();
            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable()->default('img/default-avatar.jpg');
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->rememberToken();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
