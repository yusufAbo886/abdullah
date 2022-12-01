<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_posts', function (Blueprint $table) {
            $table->id();
            $table->string('theTitleEn');
            $table->string('theTitleTr');
            $table->string('theLocation');
            $table->string('thePhone');
            $table->string('theEmail');
            $table->string('theWebsite')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instegram')->nullable();
            $table->string('twiter')->nullable();
            $table->text('map')->nullable();
            $table->text('theTextEn');
            $table->text('theTextTr');
            $table->string('thePhoto');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('doctor_posts');
    }
}
