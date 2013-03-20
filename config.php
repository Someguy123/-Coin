<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 * This is the config file for +Coin
 * You MUST add your daemon host information to this
 * file, or it won't work.
 * 
 */

session_start();
$wallets = array();

$wallets['wallet 1'] = array("user" => "bitcoinrpc",  
            "pass" =>   "password",      
            "host" =>   "hostname",     
            "port" =>   8332,
	    "protocol" => "https");            
/*
$wallets['wallet 2'] = array("user" => "username",  
            "pass" =>   "password",      
            "host" =>   "localhost",     
            "port" =>   5000,
	    "protocol" => "https");            
*/

if (isset($_POST['currentWallet']))
	$_SESSION['currentWallet'] = $_POST['currentWallet'];

if (isset($_SESSION['currentWallet']))
	$currentWallet = $_SESSION['currentWallet'];
else
{
	$keys = array_keys($wallets);
	$currentWallet = $keys[0];
	$_SESSION['currentWallet'] = $currentWallet;
}

$nmcu = $wallets[$currentWallet];

?>
