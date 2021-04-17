<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_settings', function (Blueprint $table) {
            $table->id();
            $table->string('consumer_key', 128);
            $table->string('consumer_secret', 128);
            $table->integer('head_office')->nullable();
            $table->integer('store_number')->nullable();
            $table->integer('till_number')->nullable();
            $table->string('passkey', 128)->nullable();
            $table->string('g2_password', 255)->nullable();
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
        Schema::dropIfExists('mpesa_settings');
    }
}
