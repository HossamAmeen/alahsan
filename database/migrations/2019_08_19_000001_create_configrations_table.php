<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configrations', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->text('description')->nullable();
            $table->text('about')->nullable();
            $table->string('school_vision')->nullable();
            $table->text('join_us')->nullable();
            $table->text('join_us2')->nullable();
            $table->text('value')->nullable();
            $table->text('message')->nullable();
            // $table->text('en_about')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->string('video')->nullable();
            $table->string('video2')->nullable();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('configrations');
    }
}
