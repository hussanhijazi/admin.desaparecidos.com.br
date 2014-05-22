<?php

// /computer/computer_manufacturer_brand/computer_models
// /common
// 
	include("../app/libraries/google-api-php/src/Google/Client.php");
	include("../app/libraries/google-api-php/src/Google/Service/Freebase.php");

	$client = new Google_Client();
	$client->setApplicationName("Client_Library_Examples");
	$client->setDeveloperKey("AIzaSyD83qlZYFDqXYWx9qKEBKMLvipW6a7sajw");
	$service = new Google_Service_Freebase($client);
	$res = $service->search(array('query' => $_GET['q'], 'format' => 'entity', 'lang' => 'pt', 'output' => '(description)'));
echo	$desc = $res['result'][0]['output']['description']['/common/topic/description'][0];


?>