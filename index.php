<?php


$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'yTdPdV7qXOJyl5duTlmuSGmSMy/MNqtzLmyewQXR4CbZW31lv3vKaVI+Labr7YbagSg11D5yGSxHSSp0ABVbVSEnfDYshKZ1Zw8ZWqsROchC24rZrizoMHLZx8cYvUYHudCZI74Dne4LoiIJzRNkwQdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '13cae15b2142e66b213a661e30004dbc';


$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array


if ( sizeof($request_array['events']) > 0 ) {

    foreach ($request_array['events'] as $event) {

        $reply_message = '';
        $reply_token = $event['replyToken'];

        $texts = $event['message']['text'];

        $text = 'ผมไม่เข้าใจความหมาย?';

        if($texts == 'จดหมาย'){
        	$text = 'คุณต้องการดูจดหมายใช่ไหมครับ';
        }
        if($texts == 'หิว'){
            $text = 'ทำไมถึงหิวอ่ะ';   
        }
        if($texts == 'วันนี้'){
            $text = 'วันนี้อากาศดีนะ';   
        }
        if($texts == 'อกว'){
    	$file = "https://www.tmd.go.th/xml/weather_report.php?StationNumber=48400";
	$rss = simplexml_load_file($file);
	$title = $rss->channel->item->title;
	$link = $rss->channel->item->link;
	$cdescription = $rss->channel->item->description;
	$description = strip_tags($cdescription,"<br>");
	
	$string = explode('<br/>',$description);
	$string = explode(':',$description);
	$str1 = $string[1];
	$str_2 = explode(' ', $str1);   
        	$text = 'อุณหภูมิ : '.$str_2[1].' C';
        }

        

        $data = ['replyToken' => $reply_token,'messages' => [['type' => 'text', 'text' => $text ]]];

        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);

        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);

        echo "Result: ".$send_result."\r\n";
    }
}



echo "OK ผ่านครับผม 01 ^^";




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
