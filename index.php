<?php

class TwoWaySms
{
    public function sendSms($to)
    {
        error_log("hello, this is a test!");

        require_once 'AfricasTalkingGateway.php';
        $rawData = $this->retrieveJsonPostData();
        error_log(print_r($rawData,true));
        error_log("REQUEST" .print_r($_REQUEST,true)."");
        error_log("POST". print_r($_POST,true)."");

        $username = getenv('AT_USERNAME');
        $apikey = getenv('AT_APIKEY');

        $recipient = trim($to);

        $message = "I am a fisherman. I sleep all day and work all night!";

        $from = "6996";

        $gateway = new AfricasTalkingGateway($username, $apikey);

        try
        {

            $results = $gateway->sendMessage($recipient, $message, $from);
            foreach ($results as $result) {
                if ($result->status === "Success") {
                    echo "<h3> Message succesfully sent to $result->number</h3><h3>Cost: $result->cost</h3>";
                }

            }
        } catch (AfricasTalkingGatewayException $e) {
            echo "<h3> Message failed to send to  $recipient. See below message for error details or try again</h3><h5>Error:" . $e->getMessage() . "</h5>";

        }
    }
}

$request = $_SERVER['REQUEST_METHOD'];
error_log($request);

if ($request === 'GET') {
    print("<h3>This is a simple implementation of a two-way sms code challenge</h3>");
} else if ($request === 'POST') {
    $sms = new TwoWaySms();
    $from = $_POST['from'];
    $sms->sendSms($from);
}



