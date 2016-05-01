<?php


require '../src/router.php';
require '../vendor/autoload.php';
use Pubnub\Pubnub;


Router::route('/^\/index$/', function() {
	require 'index.html';
});

Router::route('/^\/publish$/', function(){
	$message = $_REQUEST['message'];
	$pubnub = new Pubnub('pub-c-ad97200f-fadb-4ac7-b41e-382166985533', 'sub-c-359e78d4-0ddf-11e6-a6c8-0619f8945a4f'); 
	$publish_result = $pubnub->publish('group_chat',$message);
});

Router::route('/^\/show_data$/', function() {
	echo "there there";

	$pubnub = new Pubnub('demo', 'demo');
 
	//Subscribe to a channel, this is not async.
 
	// Use the publish command separately from the Subscribe code shown above. 
	// Subscribe is not async and will block the execution until complete.
	$publish_result = $pubnub->publish('group_message','Hello PubNub!');
	print_r($publish_result);


});





Router::execute($_SERVER['REQUEST_URI']);

?>
