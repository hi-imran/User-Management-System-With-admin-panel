<?php
session_start();
if($_SESSION['login']!="Yes") {
	header("Location: index.php?msg=Please Login First");
}
include "../connection.php";

if(isset($_POST['title']))
{

	$sql = "SELECT MAX(sort_order) AS max_num FROM `cms_pages` WHERE 1";
	$res = $db->query($sql);
	$row = $res->fetch_array();
	$sort_order = $row['max_num']+1;

	$sql = "INSERT INTO `cms_pages` ( `title`, `contents`, `slug`, `sort_order`) VALUES ( '$_POST[title]', '$_POST[contents]', '$_POST[slug]', $sort_order)";
	$res = $db->query($sql);

	print "<H1>Page Successfully Added </H1>";
}

?>
<html>
<body>

	<form action = "add_pages.php" method = "post">
	
	<h2>Add a New Page</h2>
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" required></td>
		</tr>
		<tr>
			<td>Slug:</td>
			<td><input type="text" name="slug"></td>
		</tr>
		<tr>
			<td>Contents:</td>
			<td><textarea  id="editor" name="contents" rows = 4 cols = 40></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value = "Add This Page"></td>
		</tr>

	</table>

	</form>

	
<script src="ckeditor.js"></script>
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

	<?php include "links.php"; ?>

</body>
</html>