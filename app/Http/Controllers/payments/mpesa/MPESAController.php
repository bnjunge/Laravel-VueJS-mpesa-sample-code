<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MpesaSettings;
use Ixudra\Curl\Facades\Curl;


class MPESAController extends Controller
{
    public $confirmation, $validation, $baseurl;

    public function mounted(){
        $this->headers = ['Content-Type:application/json; charset=utf8'];
        $this->confirmation = url('/') . '/confirmation';
        $this->validation = url('/') . '/validation';
        $this->baseurl = "https://1c35d2f8ee99.ngrok.io/api";
    }

    public function setHeaders(){
        return array('Content-Type:application/json', 'Authorization:Bearer ' . $this->getAccessToken());
    }

    public function settings(){
        return 'Settings Page';
    }

    public function registerUrls(){
        $curl_post_data = array(
            'ShortCode' => env('MPESA_SHORTCODE', '603021'),
            'ResponseType' => 'completed',
            'ConfirmationURL' => env('MPESA_LOCALDEV_URL') ."confirmation",
            'ValidationURL' =>  env('MPESA_LOCALDEV_URL') ."validation",
          );

          $url = env('MPESA_ENV') == 0  ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl' : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
          $response = $this->makeHttp($url, $curl_post_data);
          return $response;
    }

    public function initiateSTK(Request $request){
        $time = date('YmdHis');
        $password = base64_encode(env('MPESA_LNMO_SHORTCODE').env('MPESA_PASSKEY').$time);
        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_LNMO_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $time,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'PartyA' => $request->phone,
            'PartyB' => env('MPESA_LNMO_SHORTCODE'),
            'PhoneNumber' => $request->phone,
            'CallBackURL' => env('MPESA_LOCALDEV_URL') ."lnmocallback",
            'AccountReference' => $request->account,
            'TransactionDesc' => $request->account
          );

        //   return $curl_post_data;

          $url = env('MPESA_ENV') == 0  ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest' : 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
          $data = $this->makeHttp($url, $curl_post_data);
          
          return $data;
    }

    public function verifySTKPayment(Request $request){
        $time = date('YmdHis');
        $password = base64_encode(env('MPESA_LNMO_SHORTCODE').env('MPESA_PASSKEY').$time);
        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_LNMO_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $time,
            'CheckoutRequestID' => $request->id
        );

        $url = env('MPESA_ENV') == 0  ? 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query' : 'https://api.safaricom.co.ke/mpesa/stkpushquery/v1/query';

        $data = $this->makeHttp($url, $curl_post_data);

        return $data;
    }


    public function simulateTransaction(Request $request){
        $curl_post_data = array(
            //Fill in the request parameters with valid values
           'ShortCode' => env('MPESA_SHORTCODE', '603021'),
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => $request->amount,
           'Msisdn' => env('MPESA_TEST_MSISDN'),
           'BillRefNumber' => $request->account
        );

        $url = env('MPESA_ENV') == 0  ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate' : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $response = $this->makeHttp($url, $curl_post_data);

        return $response;
    }


    public function getAccessToken(){
        $url = env('MPESA_ENV') == 0  ? "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials" : "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $curl = curl_init($url);
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_HTTPHEADER => ['Content-Type:application/json; charset=utf8'],
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HEADER => false,
				CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
			)
		);

		$result = json_decode(curl_exec($curl));
		curl_close($curl);

        return $result->access_token;
    }



    public function makeHttp($url, $data){
        $curl = curl_init();
		curl_setopt_array(
			$curl,
			array(
				CURLOPT_URL => $url,
				CURLOPT_HTTPHEADER => $this->setHeaders(),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => json_encode($data)
			)
		);
		$curl_response = curl_exec($curl);
		return $curl_response;
    }
}
