<?php

class TwoWaySms
{
    public function sendSms()
    {
        require_once 'AfricasTalkingGateway.php';
        $rawData = $this->retrieveJsonPostData();

        $username = getenv('AT_USERNAME');
        $apikey = getenv('AT_APIKEY');

        $recipient = trim($rawData->to);
        
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

    /**
     * Returns the JSON encoded POST data, if any, as an object.
     *
     * @return Object|null
     */
    private function retrieveJsonPostData()
    {
        // get the raw POST data
        $rawData = file_get_contents("php://input");

        // this returns null if not valid json
        return json_decode($rawData);
    }
}

$request = $_SERVER['REQUEST_METHOD'];
if ($request === 'GET') {
    print("<h3>This is a simple implementation of a two-way sms code challenge</h3>");
} else if ($request === 'POST') {
    $sms = new TwoWaySms();

    $sms->sendSms();
}
