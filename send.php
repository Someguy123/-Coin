<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */
include("header.php");
$sendaddr = $_GET['address'];
$sendamt = $_GET['amount'];
settype($sendamt, 'double');
echo "<div class='content'>";
if(isset($_GET['amount']) && isset($_GET['address'])) {
    try {
        $nmc->sendtoaddress($sendaddr, $sendamt);
        echo "<div class='alert alert-success'>Sending <b>{$sendamt}</b> to <b>{$sendaddr}</b></div>";
    } catch(Exception $e) {
        echo "<div class='alert alert-error'><b>Error:</b> Something went wrong... have you got enough to send that amount of money? Message returned from server: {$e}</div>";
    }
}

echo "</div>";

include("footer.php");

?>