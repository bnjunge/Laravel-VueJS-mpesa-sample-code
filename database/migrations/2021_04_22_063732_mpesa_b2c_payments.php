<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MpesaB2cPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_b2c_payments', function (Blueprint $table) {
            $table->id();
            $table->string('OriginatorConversationID');
            $table->string('ConversationID');
            $table->string('TransactionReceipt')->unique();
            $table->double('TransactionAmount', 6, 2);
            $table->double('B2CWorkingAccountAvailableFunds', 12, 2);
            $table->double('B2CUtilityAccountAvailableFunds', 12, 2);
            $table->string('TransactionCompletedDateTime');
            $table->string('ReceiverPartyPublicName');
            $table->double('B2CChargesPaidAccountAvailableFunds', 10, 2);
            $table->string('B2CRecipientIsRegisteredCustomer');
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
