<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Shop;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Mail;

class SendOTPController extends Controller
{
   public function sendOtp(Request $request){

        $otp = rand(1000,9999);
        /*Log::info("otp = ".$otp);*/

        $userDetails =  User::where('mobile','=',$request->mobile)->first();

        if(!$userDetails){
        	return response()->json([
            	'message' => 'Your current mobile does not match with the mobile provided. Please try again.',
            	'status' => 404
        	]);
        }

        if (!(Hash::check($request->password, $userDetails->password))) {
            // The passwords matches
            return response()->json([
            	'message' => 'Your current password does not match with the password provided. Please try again.',
            	'status' => 404
        	]);

        }
        
    	$user = User::where('mobile','=',$request->mobile)->update(['otp' => $otp]);
	    $userDetails= User::where('mobile','=',$request->mobile)->first();

	    $details = [
	            'title' => 'Hi '.$userDetails->name,
	            'body' => 'Welcome to the Twendeni Porini Na Canon Promotion, your OTP is '.$otp
	        ];

        Mail::to($userDetails->email)->send(new \App\Mail\canonMail($details));

	    if($user){
			$headers = [
			    "Accept: */*",
				"Accept-Encoding: gzip, deflate",
				"Cache-Control: no-cache",
				"Connection: keep-alive",
				"Content-Length: 0",
				"Host: 3.229.54.57:8080",
				"Postman-Token: 93db88fd-7432-4cf8-a96f-37dbba8f31b5,434f449e-69da-4341-a0ae-9c261a167ae4",
				"User-Agent: PostmanRuntime/7.19.0",
				"cache-control: no-cache",
				"id: ".$request->mobile,
				"message: Welcome to the Twendeni Porini Na Canon Promotion, your OTP is ".$otp,
				"network: 9",
				"originator: 700801",
				"serviceid: 6013872000123962"
			];

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_PORT, "8080");
			curl_setopt($ch, CURLOPT_URL, "http://3.229.54.57:8080/guinnessutcSMS/sendBulkSMS");
			curl_setopt($ch, CURLOPT_ENCODING, "");
			curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 8);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

			// execute!
			$response = curl_exec($ch);

			// close the connection, release resources used
			curl_close($ch);

			// do anything you want with your response

			
		}

		return response()->json([
			'message' => [$user],
			'status' =>200
		]);
        
    }
}



