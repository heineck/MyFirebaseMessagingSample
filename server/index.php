<?php

//3459
	//$body = $_REQUEST['body'];
	
// $postData = array('to' => '/topics/global',
//                   'notification' => array(
//                       'message' => $body,
//                       'title' => 'Test message'));
                     
                //fbMqOGwgLtw:APA91bFC6sLsfyZfdcErbrSA5t-hDfYgKl0P1sJijAzHaNTwkiPhmRbTbIFm4rutKTrxXLRZBdrjDOqHNkkmovFnHgYAnIDRj3a-9iUDfmriPpgI1zMvz1i_zF4lFtOACfaScTkKMmqn
                     //iPad 2 
                     //kSZGBeIJqPQ:APA91bEmxalhWvvA9YRYtlu5oqKZJZEd68FJn7NcDMKay5_ZvkzvljErto0_N3tGeYq_nWtSx-rn0z2kzhmg-KX91BiI2bNkHAYLfYhGgQxVg03ekPUnnYrROnBsdXZkTLZBMjaAJQry

	//$dest = "ejG_1_WndVk:APA91bGPJzXOXYYaHgT-m78mmXtl91Z2fAdKY3XHELZEplcL-gDWjSoVVFKvxDwHWT73L0nvE5yf8Ku4kIW_pEaTxgLqhnlTOPxSP1PbVtT7pjQmKrq5fawzZGqojV7EsN8NXMn_vVtv";

	//$dest = "cYtiwL-UYVI:APA91bEjEH1rybpKMw7qI_VgNa5RsLaZ3igzFhFBI4ZMvhxRaAYV1x3YD8g9otjn5OOtHk_0_oYDtvXuZZcgqeTmDr137rMn7JHeKMSyousjDqtmdQlhVi9lILkwMePtgNL6gvLG37yW";

	$dest = '/topics/global';
	$firebaseKey = 'AIzaSyDcMw88lQDJAPI6tn3OOJJolosLjXWeVQM';
	$firebaseHost = 'https://fcm.googleapis.com/fcm/send';
	$appName = "MyFirebaseMessagingSample";
	$message = "[" . time() . "] - Teste de PUSH";

	//iOS
    /*$postData = array('to' => $dest,
                  'notification' => array(
                  	"sound" => "default",
                  	"body" => "Teste de PUSH!!!",
   					"title" => "kwiz",
   					"badge" => "0",
   					"icon"=>'a'),
                  "priority" => "high"
				);
	*/			     
	
	//ANDROID    
	$postData = array('to' => $dest,
				  'notification' => array(
				  	"body" => $message,
   					"title" => $appName,
   					"badge" => "0",
   					"icon"=>'a'
				  	),
                  'data' => array(
                  	"category_code" => $code,
                  	"sound" => "default",
                  	"body" => $message,
   					"title" => $appName,
   					"badge" => "0",
   					"icon"=>'a'),
                  	"priority" => "high"
				);

    echo "aqui: ";                 
	echo json_encode($postData) . "</br>";

$curl = curl_init($firebaseHost);

//AppGospel KEY: AIzaSyBNA4ht-neGvhP6ylKNmelDyDbxD-cDgAA
//MyNotificationsSample KEY: AIzaSyB4MYcwYd6dR4CQuPWLQ0DjWTuJkbdiG8U

//MyGCMSwiftSample AIzaSyBeOBvfxaJfNcr1X8WimQu11so0CbzIEAY
//TIMVideos2 AIzaSyCsOf6k3y-Y2x3t1GatiBRmVNE4DQ0tzQo

curl_setopt_array($curl, array(CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => array(
    "Authorization:key=$firebaseKey",
    'Content-Type:application/json'
),
CURLOPT_POSTFIELDS => json_encode($postData)));
//CURLOPT_POSTFIELDS => '{"aps":{"alert":"Hello, world!","sound":"default"}}'));
$response = curl_exec($curl);

if($response === false){
    die(curl_error($curl));
}

$responseData = json_decode($response, true);

// Print the date from the response
print_r($responseData);

if ($responseData['success'] === 1) {
	die('die here');
} else {
	$description = $responseData['results'][0]['error'];
	echo "<br/><br/>description: $description";
}

?>

