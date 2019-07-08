<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Channels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('code');
            $table->string('name');
            $table->text('description');
            $table->string('timezone');
            $table->string('theme');
            $table->string('hostname');
            $table->string('logo');
            $table->string('favicon');
            $table->text('home_page_content');
            $table->text('footer_content');
            $table->uuid('default_locale_id');
            $table->uuid('base_currency_id');
            $table->timestamps();
            $table->uuid('root_category_id');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channels', function (Blueprint $table) {
            //
        });
    }
}
