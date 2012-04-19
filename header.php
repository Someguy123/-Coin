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
 $nmc = new jsonRPCClient("http://{$nmcu['user']}:{$nmcu['pass']}@{$nmcu['host']}:{$nmcu['port']}");
 try {
    $nmcinfo = $nmc->getinfo();
 } catch(exception $e) {
    echo "Failed to retrieve data from the daemon, please check your configuration, and ensure that your coin daemon is running:  {$e}";
 }
 // Begin bootstrap code
 echo "<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <title>Namecoin Web UI</title>
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
    <link href='css/bootstrap-responsive.min.css' rel='stylesheet'>

    <!-- Le fav and touch icons -->
    <link rel='shortcut icon' href='images/favicon.ico'>
    <link rel='apple-touch-icon' href='images/apple-touch-icon.png'>

    <link rel='apple-touch-icon' sizes='72x72' href='images/apple-touch-icon-72x72.png'>
    <link rel='apple-touch-icon' sizes='114x114' href='images/apple-touch-icon-114x114.png'>
  </head>

  <body>

    <div class='navbar navbar-fixed-top'>
      <div class='navbar-inner'>
        <div class='container'>
          <a class='brand' href='#'>+Coin WebUI</a>
          <div class='nav-collapse'>
            <ul class='nav'>
              <li class='active'><a href='index.php'>Home</a></li>
              <li><a href='btc.php'>Transactions</a></li>
              <li><a href='address.php'>My Addresses</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class='container'>";
?>