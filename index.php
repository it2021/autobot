<?php
require_once('./vendor/autoload.php');

//Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token = 'yTdPdV7qXOJyl5duTlmuSGmSMy/MNqtzLmyewQXR4CbZW31lv3vKaVI+Labr7YbagSg11D5yGSxHSSp0ABVbVSEnfDYshKZ1Zw8ZWqsROchC24rZrizoMHLZx8cYvUYHudCZI74Dne4LoiIJzRNkwQdB04t89/1O/w1cDnyilFU=';
$channel_secret = '13cae15b2142e66b213a661e30004dbc';

//Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content,true);


if(!is_null($events['events'])){

	foreach($events['events'] as $events){
		if($event['type'] == 'message'){
			switch ($event['message']['type']) {
				case 'text':
					// Get replyToken
					$replyToken = $event['replyToken'];

					// Reply message
					$respMessage = 'Hello, your message is '.$event['message']['text'];

					$httpClinet = new CurlHTTPClient($channel_token);
					$bot = new LINEBot($httpClinet,array('channelSecret' => $channel_secret));
					$TextMessageBuilder = new TextMessageBuilder($respMessage);
					$response = $bot->replyMessage($replyToken,$TextMessageBuilder);
					break;
			}
		}
	}
}

echo "OK BOT";
error_log(message);
?>
