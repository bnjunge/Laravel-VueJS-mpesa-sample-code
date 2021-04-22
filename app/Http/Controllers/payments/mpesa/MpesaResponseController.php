<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Models\MPESAModel;
use Illuminate\Http\Request;
use App\Models\MPESAB2CModel;
use App\Models\MPESALNMOModel;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MpesaResponseController extends Controller
{
    //

    public function confirmation(Request $request){

          // debug 
          if(env('MPESA_DEBUG') == 1){
            Log::info("----- C2B Confirmation -----");
            Log::info($request->all());
        }


        $dpc = new MPESAModel;
        $dpc->TransactionType = $request->TransactionType;
        $dpc->TransID = $request->TransID;
        $dpc->TransTime = $request->TransTime;
        $dpc->TransAmount = $request->TransAmount;
        $dpc->BusinessShortCode = $request->BusinessShortCode;
        $dpc->BillRefNumber = $request->BillRefNumber;
        $dpc->OrgAccountBalance = $request->OrgAccountBalance;
        $dpc->ThirdPartyTransID = $request->ThirdPartyTransID;
        $dpc->MSISDN = $request->MSISDN;
        $dpc->MiddleName = $request->MiddleName;
        $dpc->FirstName = $request->FirstName;
        $dpc->LastName = $request->LastName;
        $dpc->src_ip_address = $request->ip();
        $dpc->refferer_address = $request->headers->get('referer');
        $dpc->save();

        return [
            'ResultCode' => 1,
            'ResultDesc' => 'Accept Service',
        ];
    }

    public function validation(){
        
        // debug 
        if(env('MPESA_DEBUG') == 1){
            Log::info("----- C2B Validation -----");
            Log::info($request->all());
        }

        return [
            'ResultCode' => 0,
            'ThirdPartyTransID' => 'SURVDPC' . rand(200, 6000),
            'ResultDesc' => 'Accepted'
        ];
    }

    public function lnmoCallback(Request $request){
        
        // debug 
        if(env('MPESA_DEBUG') == 1){ 
            Log::info("----- STK endpoint hit -----");
            Log::info($request->all());
        }

        $lnmo = new MPESALNMOModel;
        $lnmo->MerchantRequestID = $request->Body['stkCallback']['MerchantRequestID'];
        $lnmo->CheckoutRequestID = $request->Body['stkCallback']['CheckoutRequestID'];
        $lnmo->MpesaReceiptNumber = $request->Body['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
        $lnmo->TransactionDate = $request->Body['stkCallback']['CallbackMetadata']['Item'][2]['Value'];
        $lnmo->Amount = $request->Body['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
        $lnmo->PhoneNumber = $request->Body['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
        $lnmo->src_ip_address = $request->ip();
        $lnmo->save();

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted'
        ];
    }


    public function b2cCallback(Request $request){
        
        // debug 
        if(env('MPESA_DEBUG') == 1){
            Log::info("----- B2C endpoint hit -----");
            Log::info($request->all());
        }

        $b2c = new MPESAB2CModel;
        $b2c->OriginatorConversationID = $request->Result['OriginatorConversationID'];
        $b2c->ConversationID = $request->Result['ConversationID'];
        $b2c->TransactionReceipt = $request->Result['ResultParameters']['ResultParameter'][0]['Value'];
        $b2c->TransactionAmount = $request->Result['ResultParameters']['ResultParameter'][1]['Value'];
        $b2c->B2CWorkingAccountAvailableFunds = $request->Result['ResultParameters']['ResultParameter'][2]['Value'];
        $b2c->B2CUtilityAccountAvailableFunds = $request->Result['ResultParameters']['ResultParameter'][3]['Value'];
        $b2c->TransactionCompletedDateTime = $request->Result['ResultParameters']['ResultParameter'][4]['Value'];
        $b2c->ReceiverPartyPublicName = $request->Result['ResultParameters']['ResultParameter'][5]['Value'];
        $b2c->B2CChargesPaidAccountAvailableFunds = $request->Result['ResultParameters']['ResultParameter'][6]['Value'];
        $b2c->B2CRecipientIsRegisteredCustomer = $request->Result['ResultParameters']['ResultParameter'][7]['Value'];
        $b2c->src_ip_address = $request->ip();
        $b2c->save();

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted'
        ];
    }

    public function b2cTimeout(){
        // debug 
        if(env('MPESA_DEBUG') == 1){
            Log::info("----- B2C endpoint hit -----");
            Log::info($request->all());
        }

    }


}
