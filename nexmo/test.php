<?php 

include'vendor/autoload.php';

try {
	
$basic  = new \Nexmo\Client\Credentials\Basic('2a53296e', 'NkiHNG0HpaV7wfUC');

$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => '51985270832',
    'from' => 'Nexmo',
    'text' => 'Hola Mundo'
]);

echo "Sent message to " . $message['to'] . ". Balance is now " . $message['remaining-balance'] . PHP_EOL;


	

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();


}







 ?>