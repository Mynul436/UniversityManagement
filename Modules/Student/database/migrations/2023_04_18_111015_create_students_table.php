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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
$table->string('name');
// $table->integer('student_id')->comment('user_id=student_id');
// $table->string('group_id')->nullable();
// $table->string('shift_id')->nullable();
// $table->integer('class_id');
// $table->integer('section_id');
// $table->integer('year');
            // $table->string('reg_no');
            // $table->unsignedBigInteger('class_id');
            // $table->unsignedBigInteger('section_id');
            // $table->string('father_name');
            // $table->string('mother_name');
            // $table->string('guardian_name');
            // $table->string('guardian_relation');
            // $table->string('guardian_phone');
            // $table->string('guardian_email');
            
            // $table->foreign('class_id')->references('id')->on('classes');
            // $table->foreign('section_id')->references('id')->on('sections');
            // $table->string('address')->nullable();

        
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
