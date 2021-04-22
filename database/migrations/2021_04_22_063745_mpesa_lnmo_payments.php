<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MpesaLnmoPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_success_lnmo_payments', function (Blueprint $table) {
            $table->id();
            $table->string('MerchantRequestID');
            $table->string('CheckoutRequestID');
            $table->string('MpesaReceiptNumber')->unique();
            $table->string('TransactionDate');
            $table->double('Amount', 6, 2);
            $table->string('PhoneNumber');
            $table->double('Balance', 10, 2)->nullable();
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
