<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(Request $request)
    {
    	return view('index');
    }

    public function upload(Request $request)
    {
    	$token = "eTtlCMcFDVP8IOzSmywWMa92WBKTbsJsZ79SWhWGKL";
	
		// initialise the curl request
		$request = curl_init('https://upload.diawi.com/');

		curl_setopt($request, CURLOPT_HTTPHEADER, array(
		    'Accept: application/json'
		));

		// send a file
		curl_setopt($request, CURLOPT_POST, true);


		curl_setopt(
		    $request,
		    CURLOPT_POSTFIELDS,
		    array(
		      'file' => curl_file_create($_FILES["file"]["tmp_name"],$_FILES["file"]["type"],$_FILES["file"]["name"]),
		      'token' => $token
		    ));

		// output the response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

		$return = curl_exec($request);

		// close the session
		curl_close($request);

		$response = json_decode($return, true);

		$job = isset($response['job']) ? $response['job'] : null;

		if ( $job ) {
			$request = curl_init("https://upload.diawi.com/status?token=$token&job=$job");
			curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

			$finished = false;

			while (!$finished) {
				$result = curl_exec($request);	
				$data = json_decode($result, true);
				if($data["status"] == 2000 || $data["status"] == 4000){
					$finished = true;
				}
				sleep(3);
			}

			curl_close($request);

			return response()->json([
				'status' => 200,
				'data'   => $result
			],200);
		}

		return response()->json([
				'status' => 402,
				'data' => []
			],402);
    }
}
