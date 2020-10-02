<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('course_id');
            $table->integer('category_id');
            $table->string('company', 255);
            $table->string('title', 255);
            $table->text('description');
            $table->text('requirements');
            $table->text('salary');
            $table->string('location', 255);
            $table->string('phone', 15);
            $table->string('contact_email', 255);
            $table->boolean('confirm')->default(0);
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
        Schema::dropIfExists('jobs');
    }
}
