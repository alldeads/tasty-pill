<?php
	ini_set('memory_limit', '4095M');
	
	$token = "eTtlCMcFDVP8IOzSmywWMa92WBKTbsJsZ79SWhWGKL";
	
	$request = curl_init('https://upload.diawi.com/');

	curl_setopt($request, CURLOPT_POST, true);

	curl_setopt(
	    $request,
	    CURLOPT_POSTFIELDS,
	    array(
	      'file' => curl_file_create($_FILES["file"]["tmp_name"],$_FILES["file"]["type"],$_FILES["file"]["name"]),
	      'token' => $token
	    )
	);

	curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

	$return = curl_exec($request);

	// close the session
	curl_close($request);

	$response = json_decode($return, true);

	$job = isset($response['job']) ? $response['job'] : null;

	if ( $job != null ) {
		$request = curl_init("https://upload.diawi.com/status?token=$token&job=$job");

		curl_setopt($request, CURLOPT_RETURNTRANSFER, true);

		$finished = false;

		while (!$finished) {
			$result = curl_exec($request);	
			$data = json_decode($result, true);
			if($data["status"] == 2000 || $data["status"] == 4000){
				echo $result;
				$finished = true;
			}
			sleep(5);

		}

		curl_close($request);
	}
?>