<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */
include("header.php");
$account = $_POST['account'];
$sendaddr = ($_POST['addressbook'] != "---") ? $_POST['addressbook'] : $_POST['address'];
$sendamt = $_POST['amount'];
settype($sendamt, 'double');
echo "<div class='content'>";
if(isset($_POST['amount']) && isset($_POST['address'])) {
    try {
    if ($wallet_encrypted)
         $nmc->walletpassphrase($_POST['walletpassphrase'], 1);
	     try {
	    	$nmc->sendfrom($account, $sendaddr, $sendamt);
	        echo "<div class='alert alert-success'>Sending <b>{$sendamt}</b> from <b>{$account}</b> to <b>{$sendaddr}</b></div>";
	    } catch(Exception $e) {
	        echo "<div class='alert alert-error'><b>Error:</b> Something went wrong... have you got enough to send that amount of money? Message returned from server: <br> {$e}</div>";
	    }   
    } catch(Exception $e){
    	echo "<div class='alert alert-error'><strong>Passphrase Error!</strong> You entered the wrong passphrase. Now go back and think harder this time.</div>";
    }

}

echo "</div>";

include("footer.php");

?>
