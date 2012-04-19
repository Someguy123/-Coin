<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */

//ini_set("display_errors", false);

include ("header.php");
$addr = $nmc->listaccounts();
// $addrkeys = array_keys($addr);
echo "<div class='content'>
<h2>Select an account to get a list of an addresses</h2>
<form action='address.php' method='GET'>
<select name='account'>";
foreach ($addr as $account => $balance)
{
	echo "<option value='{$account}'>{$account} ({$balance})</option>";
}
echo "</select>
<input class='btn' type='submit' value='View addresses' />
</form>";
if (isset($_GET['account']))
{
	echo "<table class='table-striped table-bordered table-condensed table'>
<thead><tr><th>Addresses</th></tr></thead>";
	$addressi = "";
	foreach ($nmc->getaddressesbyaccount($_GET['account']) as $address)
	{
		echo "<tr><td>" . $address . "</td></tr>";
	}
	echo "</table></div>";
	//print_r($x);
}
echo "</div>";
include ("footer.php");
?>