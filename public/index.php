<?php
require_once 'AfricasTalkingGateway.php';


$username = "sandbox";
$apikey = "e213988d4ac0a2a16604c7c796b64d613ad5269a13c1c8074c9457060d9b0a94";
$recipient = "+2347031362606";

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
  echo "<h3> Message failed to send to  $recipient. See below message for error details or try again</h3><h5>Error:".  $e->getMessage()."</h5>";

  
}
