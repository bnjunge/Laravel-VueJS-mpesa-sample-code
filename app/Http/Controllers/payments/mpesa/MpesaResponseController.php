<?php

namespace App\Http\Controllers\payments\mpesa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class MpesaResponseController extends Controller
{
    //

    public function confirmation(Request $request){
        Log::info("confirmation endpoint hit");

        Log::info($request->all());

        return [
            'ResultCode' => 1,
            'ResultDesc' => 'Accept Service',
        ];
    }

    public function validation(){
        Log::info("validation endpoint hit");

        return [
            'ResultCode' => 0,
            'ThirdPartyTransID' => 'SURVDPC' . rand(200, 6000),
            'ResultDesc' => 'Accepted'
        ];
    }

    public function lnmoCallback(Request $request){
        Log::info("STK endpoint hit");
        Log::info($request->all());

        return [
            'ResultCode' => 0,
            'ThirdPartyTransID' => 'SURVDPC' . rand(200, 6000),
            'ResultDesc' => 'Accepted'
        ];
    }


}
