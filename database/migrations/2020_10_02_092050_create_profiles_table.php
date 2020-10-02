<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->text('about_me')->nullable();
            $table->text('education')->nullable();
            $table->text('my_skills')->nullable();
            $table->text('links')->nullable();
            $table->text('work_experience')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('cv', 255)->nullable();
            $table->boolean('confirm')->default(0);
            $table->text('watch')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
