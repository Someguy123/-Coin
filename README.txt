=== DONATIONS ===
Donations are accepted:
BTC: 1SoMGuYknDgyYypJPVVKE2teHBN4HDAh3
LTC: LSomguyTSwcw3hZKFts4P453sPfn4Y5Jzv
LQC: vbh3c3nCdWCnBq7gDNrJeXSt8WMg9Y64x8
NMC: N5omEguYDarGmHt2R23DFvkXYU49yPAAKN

== LICENSING ==
+Coin is released under UNLICENSE (Public Domain), this allows
you to use it, edit and claim it as your own, and even sell it
or use it comercially.
NOTE: Bootstrap is under the Apache v2 license, and the JSON-RPC
class used by +Coin is released under the GPL v3. So please be
aware of the restrictions if you do want to use +Coin in any
way that may break the GPL v3 or Apache v2 licensing.

=== HELP ===
+Coin is a PHP script designed to run on any server that runs an
*coin daemon such as Bitcoin or Litecoin. To use it, you simply
drop all the files in a directory on your PHP Enabled webserver
and visit http://example.com/whereyouputpluscoin

WARNING: +Coin does not have its own authentication security
system, so I recommend that you secure it with an apache
.htaccess or whatever webserver specific security you can use.

=== Configuring ===
You should be able to simply place your RPC Information for the
daemon you are using in config.php (Please don't fill in the
MySQL Details, they aren't needed in this version).

You can obtain the RPC Information from:
Windows
   - %appdata%\Bitcoin\bitcoin.conf
   - %appdata%\Litecoin\litecoin.conf
   - %appdata%\Namecoin\bitcoin.conf

Linux
   - ~/.bitcoin/bitcoin.conf
   - ~/.litecoin/litecoin.conf
   - ~/.namecoin/bitcoin.conf
