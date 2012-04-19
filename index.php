<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */
 ini_set("display_errors", false);
include ("header.php");
$trans = $nmc->listtransactions('*', 7);
$x = array_reverse($trans);
$bal = $nmc->getbalance("*", 6);
$bal3 = $nmc->getbalance("*", 0);
$bal2 = $bal - $bal3;
echo "
<div class='content'>
<div class='row'>
    <div class='span12'>
    <div class='row'>
    <div class='span5'>
        <h3>Current Balance: <font color='green'>{$bal}</font></h1>
        <h4>Unconfirmed Balance: <font color='red'>{$bal2}</font></h2>
        <h3>Send coins:</h3>
        <form action='send.php' method='GET'>
        <input type='text' placeholder='To address'name='address'>
        <input type='text' placeholder='Amount' name='amount'>
        <input class='btn btn-primary' type='submit' value='Send'>
        </form>
    </div>
    <div class='span6'>
    <table class='table-striped table-bordered table'>
    <thead><tr><th>Method</th><th>Account and Address</th><th>Amount</th><th>Confirms</th></tr></thead>";
foreach ($x as $x)
{
    if($x['amount'] > 0) { $coloramount = "green"; } else { $coloramount = "red"; }
    if($x['confirmations'] >= 6) { $colorconfirms = "green"; } else { $colorconfirms = "red"; }
    
	$date = date(DATE_RFC822, $x['time']);
	echo "<tr>";
    echo "<td>" . ucfirst($x['category']) . "</td>";
	if (isset($x['address']))
		echo "<td>{$x['address']} - {$x['account']}</td>";
	else
	   echo "<td style='text-align: center'>Generated</td>";
	echo "<td><font color='{$coloramount}'>{$x['amount']}</font></td><td><font color='{$colorconfirms}'>{$x['confirmations']}</font></td></tr>";
}
echo "</table>
<a href='btc.php'>More...</a>
    </div>
    </div>
    </div>
</div>";
include("footer.php");
?>