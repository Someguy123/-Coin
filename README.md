What is +Coin?
--------------
+Coin is a Web Interface built to run on any PHP web server, it works with any coin based on Bitcoin including Litecoin, Namecoin, and many others.

[Bitcointalk Thread](https://bitcointalk.org/index.php?topic=67274.0)

Preview
-------
![](http://i.imgur.com/WHDXDwV.jpg)

Licensing
---------
+Coin is released under UNLICENSE (Public Domain), this allows
you to use it, edit and claim it as your own, and even sell it
or use it commercially.
NOTE: Bootstrap is under the Apache v2 license, and the JSON-RPC
class used by +Coin is released under the GPL v3. So please be
aware of the restrictions if you do want to use +Coin in any
way that may break the GPL v3 or Apache v2 licensing.

Installing and configuring
-----------

Installation is done by downloading this repo, and placing it on a PHP web server.

**WARNING:** +Coin does not have its own authentication security
system, so I recommend that you secure it with an Apache
.htaccess or whatever web server specific security you can use.


You should be able to simply place your RPC Information for the
daemon you are using in **config.php**.

	$wallets['wallet 1'] = array(
		"user" => "bitcoinrpc",
		"pass" => "password",
		"host" => "hostname",
		"port" => 8332,
		"protocol" => "https"
	);

You can obtain the RPC Information from:

**Windows**

   - %appdata%\Bitcoin\bitcoin.conf
   - %appdata%\Litecoin\litecoin.conf
   - %appdata%\Namecoin\bitcoin.conf

**Linux**

   - ~/.bitcoin/bitcoin.conf
   - ~/.litecoin/litecoin.conf
   - ~/.namecoin/bitcoin.conf

**OSX**

   - ~/Library/Application Support/Bitcoin/bitcoin.conf
   - ~/Library/Application Support/Litecoin/litecoin.conf
   - ~/Library/Application Support/Namecoin/bitcoin.conf

Note: Start the RPC server: open Bitcoin-Qt.app --args -server


DONATIONS
---------

Donations for first developer **Someguy123** are accepted:

- BTC: 1SoMGuYknDgyYypJPVVKE2teHBN4HDAh3
- LTC: LSomguyTSwcw3hZKFts4P453sPfn4Y5Jzv