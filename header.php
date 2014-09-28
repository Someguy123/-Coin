<?php
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

	#ini_set("display_errors", false);

	require("config.php");
	require("jsonRPCClient.php");

	session_start();
	if (isset($_POST['currentWallet']) && !empty($_POST['currentWallet']))
		$_SESSION['currentWallet'] = $_POST['currentWallet'];

	if (isset($_SESSION['currentWallet']) && !empty($_SESSION['currentWallet']))
		$currentWallet = $_SESSION['currentWallet'];
	else
	{
		$keys = array_keys($wallets);
		$currentWallet = $keys[0];
		$_SESSION['currentWallet'] = $currentWallet;
	}

	$nmcu = $wallets[$currentWallet];

	$nmc = new jsonRPCClient("{$nmcu['protocol']}://{$nmcu['user']}:{$nmcu['pass']}@{$nmcu['host']}:{$nmcu['port']}", true);

	try {
		$nmcinfo = $nmc->getinfo();
	} catch(exception $e) {
		die("Failed to retrieve data from the daemon, please check your configuration, and ensure that your coin daemon is running:<br>  {$e}");
	}

	$wallet_encrypted = true;
	try {
	$nmc->walletlock();
	} catch(Exception $e) {
	// Wallet is not encrypted
	$wallet_encrypted = false;
	}

	// Begin bootstrap code
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bitcoin Web UI</title>
	<link href='css/bootstrap.min.css' rel='stylesheet'>
	<link href='css/main.css' rel='stylesheet'>
	<script src='js/jquery.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
		$(function(){
			$(document).on("click", ".open-SetPassPhrase", function () {    
					$('#SetPassPhrase').modal('show');
			});

			$(document).on("click", ".open-ChangePassPhrase", function () {
					$('#ChangePassPhrase').modal('show');
			});

			$('#selectwallet a').click(function(){
				window.location.href="./?currentWallet="+$(this).text();
				return false;
			});
		});
	</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">+Coin WebUI</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="btc.php">Transactions</a></li>
					<li><a href="address.php">My Addresses</a></li>
					<li><a href="addressbook.php">Addressbook</a></li>
				</ul>
				<div class="navbar-right">
					<p class="navbar-text">Select wallet server:</p>
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $currentWallet;?> <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu" id="selectwallet">
								<?php
									foreach ($wallets as $walletName => $walletData)
										echo '<li><a href="#">'.$walletName.'</a></li>';
								?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<div class="container">