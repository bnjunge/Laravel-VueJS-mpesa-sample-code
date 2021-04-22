<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MpesaConfirmations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_c2b_confirmed_payments', function (Blueprint $table) {
            $table->id();
            $table->string('TransactionType');
            $table->string('TransID')->unique();
            $table->string('TransTime');
            $table->double('TransAmount', 6, 2);
            $table->double('BusinessShortCode');
            $table->string('BillRefNumber');
            $table->double('OrgAccountBalance', 12, 2);
            $table->string('ThirdPartyTransID');
            $table->string('MSISDN');
            $table->string('FirstName');
            $table->string('MiddleName');
            $table->string('LastName');
            $table->string('src_ip_address')->nullable();
            $table->string('refferer_address')->nullable();
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
        //
    }
}
