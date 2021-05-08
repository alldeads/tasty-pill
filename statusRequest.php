<?php
	



	$token = "eTtlCMcFDVP8IOzSmywWMa92WBKTbsJsZ79SWhWGKL";
	$job = $_POST["job"];

	// initialise the curl request
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
	

	// close the session
	curl_close($request);
	
	

	




?>