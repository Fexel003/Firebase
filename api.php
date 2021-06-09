<?php

if(isset($_GET['send_notification'])){
	send_notification();
}

function send_notification(){
	echo'Hola!';
	define ('API_ACCESS_KEY','AAAAoijriBg:APA91bF8Ds76ulOeC71HC0nW_tdZiOunGIMyOQgXWZaZM8YCzwOmLSV4A0Jojr13aw32aAGIYoBjcFKXoc-XK4XNBU98kO_gw_u2Bn9H2ZfhP_Sn4kQcwGsZZC5CnVN4O7Qxlz_a_LBm');
	$msg = array(
		'body' => 'Esperando que llegue',
		'title' => 'Noty PHP',
	);
	$fields = array(
		'to' => $_REQUEST['token'],
		'notification' => $msg		
	);
	$headers = array(
		'Authorization: key=' . API_ACCESS_KEY,
		'Content-Type: application/json'		
	);
#Send Response To Firebase Server
	$ch = curl_init();
	curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
	curl_setopt( $ch,CURLOPT_POST, true);
	curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($fields) );
	$result = curl_exec($ch);
	echo $result;
	curl_close( $ch );

}
?>