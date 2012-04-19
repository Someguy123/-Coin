
<?php
include("header.php");
$geti = $nmc->getinfo();
echo "<div class='container'><div class='content'><table class='table table-bordered table-striped'>";
foreach($geti as $name=>$value) {
    echo "<tr><td><h4>$name</h4></td><td><strong>$value</strong></td></tr>";
}
echo "</table>"
?>