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
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('reg_no')->nullable();
            $table->string('year_id')->nullable();
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('subject_id')->nullable();
            $table->double('total_marks')->nullable();
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
        Schema::dropIfExists('results');
    }
};
