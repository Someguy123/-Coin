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
$nmcu = array("user" => "",             // RPC Username
            "pass" =>   "",               // RPC Password
            "host" =>   "localhost",      // RPC Hostname/IP
            "port" =>   8332);            // RPC Port for the daemon
/*
$sqlu = array("user" => "",     // SQL Username
            "pass" =>   "",     // SQL Password
            "host" =>   "",     // SQL Hostname/IP Address
            "db" =>     "");    // Database name
**/ // You do NOT need to fill in these SQL details... this is just a placeholder for a future release.
/** No need to change this... it's just to help you out... */
// Check namecoin configuration
/**
 * if(isset($nmcu['user']) && isset($nmcu['pass']) && isset($nmcu['host']) && isset($nmcu['port'])) NULL;
 * else die("You missed out a namecoin configuration option...");
 * // Check SQL configuration
 * if(isset($sqlu['user']) && isset($sqlu['pass']) && isset($sqlu['host']) && isset($sqlu['db'])) NULL;
 * else die("You missed out a MySQL configuration option");
 * /** 
 *  * NULL is just a placeholder incase you were wondering. 
 *  * Also if these sanity checks aren't working properly,
 *  * comment them out, but just remember they're for your
 *  * own good.
 *  *
 */
?>