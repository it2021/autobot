<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'yTdPdV7qXOJyl5duTlmuSGmSMy/MNqtzLmyewQXR4CbZW31lv3vKaVI+Labr7YbagSg11D5yGSxHSSp0ABVbVSEnfDYshKZ1Zw8ZWqsROchC24rZrizoMHLZx8cYvUYHudCZI74Dne4LoiIJzRNkwQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '13cae15b2142e66b213a661e30004dbc';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$events = json_decode($request, true);   // Decode JSON to Array


if(!is_null($events['events'])){

	foreach($events['events'] as $events){
		if($event['type'] == 'message'){
			switch ($event['message']['type']) {
				case 'text':
					// Get replyToken
					$replyToken = $event['replyToken'];

		// Reply message
		$text = 'Hello, your message is '.$event['message']['text'];


	    $data = ['replyToken' => $replytoken,'messages' => [['type' => 'text', 'text' => $text ]]];

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

				break;
			}
		}
	}
}


/*if ( sizeof($request_array['events']) > 0 ) {

    foreach ($request_array['events'] as $event) {

        $reply_message = '';
        $reply_token = $event['replyToken'];

        $text = $event['message']['text'];
        $data = [
            'replyToken' => $reply_token,
            'messages' => [['type' => 'text', 'text' => $text ]]
        ];
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
    }
} */



echo "OK ผ่านครับผม ^^";




function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

?>