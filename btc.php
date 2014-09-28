<?php
/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */

	include ("header.php");
	$trans = $nmc->listtransactions('*', 100);
	$x = array_reverse($trans);
	$bal = $nmc->getbalance("*", 6);
	$bal3 = $nmc->getbalance("*", 0);
	$bal2 = $bal - $bal3;
echo "<div class='content'>
<div class=\"row\">
	<div class='col-sm-6'>
		<h1>Current Balance: <font color='green'>{$bal}</font></h1>
		<h2>Unconfirmed Balance: <font color='red'>{$bal2}</font></h2>
	</div>
	<div class='col-sm-6'>";

	if(isset($_GET['orphan']))
		echo '<a class="btn btn-link" href="btc.php">Go back</a>';
	else
		echo '<a class="btn btn-link" href="?orphan=1">View Orphans</a>';

echo"</div>
</div>
<table class='table-striped table-bordered table'>
<thead><tr><th>Method</th><th>Address</th><th>Name</th><th>Account</th><th>Amount</th><th>Confirmations</th><th>Time</th></tr></thead>";

// Load address book
$addresses_arr = array();
$addressbook = file("addressbook.csv");
foreach ($addressbook as $line)
{
	$values = explode(";", $line);
	$address = $values[0];
	$name = str_replace("\n", "", $values[1]);
	$addresses_arr[$address] = $name;
}
// Load my addresses
$myaddresses = file("myaddresses.csv");
foreach ($myaddresses as $line)
{
	$values = explode(";", $line);
	$address = $values[0];
	$name = str_replace("\n", "", $values[1]);
	$addresses_arr[$address] = $name;
}

foreach ($x as $x)
{
    if($x['amount'] > 0) { $coloramount = "green"; } else { $coloramount = "red"; }
    if($x['confirmations'] >= 6) { $colorconfirms = "green"; } else { $colorconfirms = "red"; }
	if (!isset($_POST['orphan']))
	{
		$date = date(DATE_RFC822, $x['time']);
        
		echo "<tr>";
        echo "<tr>";
        echo "<td>" . ucfirst($x['category']) . "</td>";
    	if (isset($x['address']))
    		echo "<td>{$x['address']}</td><td>{$addresses_arr[$x['address']]}</td><td>{$x['account']}</td>";
    	else
            echo "<td style='text-align: center'>Generated</td><td>N/A</td><td>N/A</td>";
    	
    	
        echo "<td><font color='{$coloramount}'>{$x['amount']}</font></td><td><font color='{$colorconfirms}'>{$x['confirmations']}</font></td><td>{$date}</td></tr>";
	} else
	{
		$date = date(DATE_RFC822, $x['time']);
		if ($x['category'] == "orphan")
		{
			echo "<tr><td>{$x['account']}</td><td>{$x['amount']}</td><td>{$x['confirmations']}</td><td>{$x['category']}</td><td>{$date}</td></tr>";
		}
	}
}
echo "</table>";
//print_r($x);   
include("footer.php");
?>