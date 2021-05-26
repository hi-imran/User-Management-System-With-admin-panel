<?php
session_start();
if($_SESSION['login']!="Yes") {
	header("Location: index.php?msg=Please Login First");
}
include "../connection.php";
?>
<html>
<body>

<?php
if(isset($_GET['del_id']))
{
	$sql = "DELETE FROM `cms_pages` WHERE `id` = '$_GET[del_id]' ";
	$res = $db->query($sql);
	print "<H1>Delete Successful</H1>";
}

if(isset($_GET['move_up_id'])) {

	//Find My Sort Order
	$sql = "SELECT * FROM `cms_pages` WHERE `id` = '$_GET[move_up_id]' ";
	$res = $db->query($sql);
	$row = $res->fetch_array();
	$my_sort_order = $row['sort_order'];
	$my_id = $row['id'];

	//Find Up Neighbor Sort Order	
	$sql = "SELECT * FROM `cms_pages` WHERE `sort_order` < '$my_sort_order' ORDER BY `sort_order` DESC LIMIT 0,1";
	$res = $db->query($sql);
	$row = $res->fetch_array();
	$other_sort_order = $row['sort_order'];
	$other_id = $row['id'];

	//Swap
	if($other_id>0) {
		$sql = "UPDATE `cms_pages` SET `sort_order` = '$other_sort_order' WHERE `id` = '$my_id' ";
		$db->query($sql);

		$sql = "UPDATE `cms_pages` SET `sort_order` = '$my_sort_order' WHERE `id` = '$other_id' ";
		$db->query($sql);
	}

}


if(isset($_GET['move_down_id'])) {

	//Find My Sort Order
	$sql = "SELECT * FROM `cms_pages` WHERE `id` = '$_GET[move_down_id]' ";
	$res = $db->query($sql);
	$row = $res->fetch_array();
	$my_sort_order = $row['sort_order'];
	$my_id = $row['id'];

	//Find Up Neighbor Sort Order	
	$sql = "SELECT * FROM `cms_pages` WHERE `sort_order` > '$my_sort_order' ORDER BY `sort_order` ASC LIMIT 0,1";
	$res = $db->query($sql);
	$row = $res->fetch_array();
	$other_sort_order = $row['sort_order'];
	$other_id = $row['id'];

	//Swap
	if($other_id>0) {
		$sql = "UPDATE `cms_pages` SET `sort_order` = '$other_sort_order' WHERE `id` = '$my_id' ";
		$db->query($sql);

		$sql = "UPDATE `cms_pages` SET `sort_order` = '$my_sort_order' WHERE `id` = '$other_id' ";
		$db->query($sql);
	}

}
?>

	<h2>Manage Pages</h2>
	<table cellpadding="10" bgcolor="#777">
		<tr>
			<td>Id</td>
			<td>Name</td>
			<td>Slug</td>
			<td>Edit</td>
			<td>Delete</td>
			<td>&#9650;</td>
			<td>&#9660;</td>
		</tr>
	<?php

	$sql = "SELECT * FROM `cms_pages` WHERE 1 ORDER BY `sort_order` ASC ";
	$res = $db->query($sql);
	while($row = $res->fetch_array()) {
		print "
		<tr bgcolor = white>
			<td>$row[id].</td>
			<td>$row[title]</td>
			<td>$row[slug]</td>
			<td><a href = Edit_page.php?id=$row[id]>Edit</a></td>
			<td><a href = manage_pages.php?del_id=$row[id] onclick = \"return confirm('Are you sure?');\">Delete</a></td>
			
			<td><a href = manage_pages.php?move_up_id=$row[id] style = \"text-decoration: none;\">&#9650;</a></td>
			<td><a href = manage_pages.php?move_down_id=$row[id] style = \"text-decoration: none;\">&#9660;</a></td>

		</tr>
		";
	}

	?>
	</table>

	</form>


	<?php include "links.php"; ?>

</body>
</html>