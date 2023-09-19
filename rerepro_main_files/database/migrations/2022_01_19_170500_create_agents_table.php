<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('brokerage_company')->nullable();
            $table->string('brokerage_company_phone')->nullable();
            $table->string('brokerage_company_address')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_state')->nullable();
            $table->string('managing_broker_name')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('agents');
    }
}
