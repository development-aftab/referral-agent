<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('sender_id')->nullable();
            $table->string('receiver_id')->nullable();
            $table->string('type')->nullable();
            $table->text('description')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('is_viewed_by_agent')->nullable();
            $table->string('is_viewed_by_admin')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_notifications');
    }
}
