<?php


require '../src/router.php';
require '../vendor/autoload.php';
use Pubnub\Pubnub;


Router::route('/^\/index$/', function() {
	require 'index.html';
});

Router::route('/^\/show_data$/', function() {
	echo "there there";

	$pubnub = new Pubnub('demo', 'demo');
 
	//Subscribe to a channel, this is not async.
	$pubnub->subscribe('hello_world', function ($envelope) {
             print_r($envelope['message']);
       	});
 
	// Use the publish command separately from the Subscribe code shown above. 
	// Subscribe is not async and will block the execution until complete.
	$publish_result = $pubnub->publish('hello_world','Hello PubNub!');
	print_r($publish_result);


});





Router::execute($_SERVER['REQUEST_URI']);

?>
