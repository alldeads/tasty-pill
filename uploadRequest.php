<?php

	



	$token = "eTtlCMcFDVP8IOzSmywWMa92WBKTbsJsZ79SWhWGKL";
	

	// initialise the curl request
	$request = curl_init('https://upload.diawi.com/');

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
	echo curl_exec($request);

	// close the session
	curl_close($request);
	



?>