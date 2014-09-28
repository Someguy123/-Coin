<?php

/**
 * @author Chris S - AKA Someguy123
 * @version 0.01 (ALPHA!)
 * @license PUBLIC DOMAIN http://unlicense.org
 * @package +Coin - Bitcoin & forks Web Interface
 */

include ("header.php");
?>

<!-- Java Script -->
<script type='text/javascript'>

$(document).on("click", ".open-EditAddrDialog", function () {
     var myAddrId = $(this).data('id');
     $("#myAddress").html(myAddrId);
     $(".modal-body #myAddress").val( myAddrId );

     var myAddrName = $(this).data('name');
     $(".modal-body #AddrName").val( myAddrName );

    $('#EditAddrDialog').modal('show');
});

</script>

<?php
if (isset($_POST['addaddr']) && isset($_POST['account']))
{
  $nmc->getnewaddress($_POST['account']);
}

if (isset($_POST['addacc']) && isset($_POST['account']))
{
  $nmc->getaccountaddress($_POST['account']);
}


$myaddresses = file("myaddresses.csv");
$myaddress_arr = array();
foreach ($myaddresses as $line)
{
    $values = explode(";", $line);
    $address = $values[0];
    $name = str_replace("\n", "", $values[1]);
    $myaddress_arr[$address] = $name;
}

if (isset($_POST['AddrName']) && isset($_POST['myAddress']))
{
	$myaddress_arr[$_POST['myAddress']] = $_POST['AddrName'];

	$f = fopen("myaddresses.csv", "w");

	foreach ($myaddress_arr as $address => $name)
	{
			$line = $address.";".$name."\n";
			fputs($f, $line);
	}
	fclose($f);
}


$addr = $nmc->listaccounts();
// $addrkeys = array_keys($addr);
echo "<div class='content'>
<h2>Select an account to get a list of an addresses</h2>";
echo "<form action='address.php' method='POST'>
<div class=\"row\">
	<div class=\"col-sm-10\">
		<input type=\"text\" name='account' class=\"form-control\">
	</div>
	<div class=\"col-sm-2\">
		<input class='btn btn-default form-control' name='addacc' type='submit' value='Add Account' />
	</div>
</div>
</form><br>";

echo "<form action='address.php' method='POST'>
<div class=\"row\">
<div class=\"col-sm-8\">
<select class=\"form-control\" name='account'>";
foreach ($addr as $account => $balance)
{
        $selected = "";
        if (isset($_POST['account']))
        {
           settype($account, "string");
       if ($_POST['account'] == $account)
          $selected = "selected";
        }
    echo "<option value='{$account}' $selected>{$account} ({$balance})</option>";
}
echo "</select>
</div>
<div class=\"col-sm-2\">
	<input class='btn btn-default form-control' type='submit' value='View addresses' />
</div>
<div class=\"col-sm-2\">
	<input class='btn btn-default form-control' name='addaddr' type='submit' value='Add address' />
</div>
</div>
</form><br>";

	$account = isset($_POST['account'])?$_POST['account']:'';

	if(!empty($account)){
		echo "<table class='table-striped table-bordered table-condensed table'>
		<thead><tr><th >Addresses for Account '".$account."'</th><th>Label</th></tr></thead>";
		foreach ($nmc->getaddressesbyaccount($account) as $address)
		{
			$address_label = $myaddress_arr[$address];
			echo "<tr><td>" . $address . "</td>
						<td>" . $address_label . "</td>
						<td><a data-id='".$address."' data-name='".$address_label."' data-toggle='modal' href='#EditAddrDialog' class='open-EditAddrDialog btn btn-mini'>Edit</a></td></tr>";
		}
		echo "</table>";
	}
?>

<form action='address.php' method='POST'>
<!-- Modal --->
<div id="EditAddrDialog" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">Change Address Name</h3>
	</div>
	<div class="modal-body">
	<table><tr>
		<td><div id="myAddress">Address to change</div></td>
		<td><input class="form-control" type="text" name="AddrName" id="AddrName" value="Name"/></td>
		</tr></table>
		<input type="hidden" name="myAddress" id="myAddress" value="Nothing"/>
		<input type="hidden" name="account" id="account" value="<?php echo $account ?>"/>
		</div>
		<div class="modal-footer">
			<button class="btn btn-default" data-dismiss="modal">Close</button>
			<button class="btn btn-primary">Save Changes</button>
		</div>
</div>
</form>
<?php
echo"</div>";

echo "</div>";
include ("footer.php");
?>
