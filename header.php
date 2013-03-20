<?php
include("config.php");
include("jsonRPCClient.php");
/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */
 /**
 * This header verifies that the daemon is responding
 * It also creates the template header for bootstrap
 * which includes the nice navigation bar
 * and all the CSS.
 * 
 */
 $nmc = new jsonRPCClient("{$nmcu['protocol']}://{$nmcu['user']}:{$nmcu['pass']}@{$nmcu['host']}:{$nmcu['port']}", true);
 try {
    $nmcinfo = $nmc->getinfo();
 } catch(exception $e) {
    echo "Failed to retrieve data from the daemon, please check your configuration, and ensure that your coin daemon is running:<br>  {$e}";
 }
 
$wallet_encrypted = true;
 try {
 	$nmc->walletlock();
 } catch(Exception $e) {
 	// Wallet is not encrypted
 	$wallet_encrypted = false;
 }
 

 // Begin bootstrap code
 echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>Bitcoin Web UI</title>
    <meta name='description' content=''>
    <meta name='author' content=''>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
    <![endif]-->

    <!-- Le styles -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <style type='text/css'>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f0f0f0
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
     .page-header {
        background-color: #f7f7f7;
        padding: 20px 20px 10px;
        margin: 0px 0px 20px;
      }
      .content {
        margin: 0px 0px 20px;
        padding: 20px 20px 10px;
        minimum-height: 600px;
        background-color: #fff;
        -webkit-border-radius: 0 0 10px 10px;
           -moz-border-radius: 0 0 10px 10px;
                border-radius: 0 0 10px 10px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
                
        }
    </style>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='css/bootstrap-responsive.min.css' rel='stylesheet'>
  </head>

  <body>
    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <div class='navbar navbar-fixed-top'>
      <div class='navbar-inner'>
        <div class='container'>
          <a class='brand' href='#'>+Coin WebUI</a>
          <div class='nav-collapse'>
            <ul class='nav'>
              <li class='active'><a href='index.php'>Home</a></li>
              <li><a href='btc.php'>Transactions</a></li>
              <li><a href='address.php'>My Addresses</a></li>
              <li><a href='addressbook.php'>Addressbook</a></li>
            </ul>
          </div><!--/.nav-collapse -->
          
          <span style='color: #E4E4E4;'>Select wallet server: &nbsp;</span>
          <select id='currentWallet' onchange='window.location.href=\"index.php?currentWallet=\"+document.getElementById(\"currentWallet\").value;' style='margin-top: 5px;'>
          	";
 			foreach ($wallets as $walletName => $walletData)
 				echo "<option id=\"".$walletName."\" ".($currentWallet == $walletName ? "selected" : "").">".$walletName."</option>";
 		echo "
          </select>
          
        </div>
      </div>
    </div>
    <div class='container'>";
?>
