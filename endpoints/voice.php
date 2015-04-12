<?php
	header('Content-type: text/xml');
	 
	// put a phone number you've verified with Twilio to use as a caller ID number
	$callerId = "+441143031601";

	$client = "None";
	
	if (isset($_REQUEST['Client'])) {
		$client = htmlspecialchars($_REQUEST['Client']);
	}

	
	if (isset($_REQUEST['OutgoingNumber'])) {
		$callerId = htmlspecialchars($_REQUEST['OutgoingNumber']);
	}
	
	// put your default Twilio Client name here, for when a phone number isn't given
	$number  = "Giblets";

	if (isset($_REQUEST['Agent'])) {
		$number = htmlspecialchars($_REQUEST['Agent']);
	}
	 
	// get the phone number from the page request parameters, if given
	if (isset($_REQUEST['PhoneNumber'])) {
	    $number = htmlspecialchars($_REQUEST['PhoneNumber']);
	}
	 
	// wrap the phone number or client name in the appropriate TwiML verb
	// by checking if the number given has only digits and format symbols
	if (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
	    $numberOrClient = "<Number>" . $number . "</Number>";
	} else {
	    $numberOrClient = "<Client>" . $number . "</Client>";
	}
	if ($number[0] != '0' || $number[1] != '0'){
		$number = "00".substr($number,1,100);
	}
?>
 
<Response>
    <Dial callerId="<?php echo $callerId ?>" record="true" action="/yakhub/agent/endpoints/storeCall.php?to=<?php echo $number?>">
          <?php echo $numberOrClient ?>
    </Dial>
</Response>