<?php

	if (isset($_REQUEST['action']))
	{
		$action = $_REQUEST['action'];
		
		if ($action == "delete")
		{
			$address = $_REQUEST['address'];
			
			$addressbook = file("addressbook.csv");
			$f = fopen("addressbook.csv", "w");
			
			foreach ($addressbook as $line)
			{
				if (strpos($line, $address) !== 0)
					fputs($f, $line);
			}
			
			fclose($f);
		}
		
		if ($action == "add")
		{
			$line = $_REQUEST['address'].";".$_REQUEST['name']."\n";
			
			$f = fopen("addressbook.csv", "a");
			fputs($f, $line);
			fclose($f);
		}
	}

include ("header.php");
echo "<div class='content'>
	<h2>Addressbook</h2>";
	
	$addressbook = file("addressbook.csv");
	?>
	<form method="post">
		<input type="hidden" name="action" value="add" />
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="name" /></td>
				<td><input type="text" name="address" /></td>
				<td><input type="submit" value="Add new address" /></td>
			</tr>
		<?php 
		
			foreach ($addressbook as $line)
			{
				$values = explode(";", $line);
				$address = $values[0];
				$name = str_replace("\n", "", $values[1]);
				echo "<tr>";
				echo "<td>".$name."</td>";
				echo "<td>".$address."</td>";
				echo "<td><a href=\"addressbook.php?action=delete&address=".$address."\">Delete</a></td>";
				echo "</tr>";
			}
		?>
		</tbody>
	</table>
	</form>
<?php 
echo "</div>";
include ("footer.php");
?>