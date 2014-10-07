<?php

	include("header.php");

	echo "<div class='container'><div class='content'><table class='table table-bordered table-striped'>";

	$geti = $nmc->getinfo();
	foreach($geti as $name=>$value) {
		echo "<tr><td><h4>$name</h4></td><td><strong>$value</strong></td></tr>";
	}

	echo "</table>"

	include("footer.php");
?>