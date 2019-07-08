<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('channel_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->integer('status');
            $table->string('password');
            $table->uuid('customer_group_id')->nullable();
            $table->integer('subscribed_to_news_letter');
            $table->integer('is_verified');
            $table->string('token')->nullable();
            $table->text('notes');
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->primary('id');
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
        Schema::dropIfExists('customers');
    }
}
