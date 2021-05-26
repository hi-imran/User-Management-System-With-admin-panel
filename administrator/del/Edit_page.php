<?php
session_start();
if($_SESSION['login']!="Yes") {
	header("Location: index.php?msg=Please Login First");
}
include "../connection.php";


$sql = "SELECT * FROM `cms_pages` WHERE `id` = '$_GET[id]' ";
$res = $db->query($sql);
$row = $res->fetch_array();

?>
<html>
<body>

	<form action = "Edit_page_response.php" method = "post">
	<input type="hidden" name="id" value = "<?php print $row['id'];?>">
	<h2>Edit <?php print $row['title'];?></h2>
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value = "<?php print $row['title'];?>"></td>
		</tr>
		<tr>
			<td>Slug:</td>
			<td><input type="text" name="slug" value = "<?php print $row['slug'];?>"></td>
		</tr>
		<tr>
			<td>Contents:</td>
			<td><textarea  id="editor" name="contents" rows = 10 cols = 40><?php print $row['contents'];?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value = "Edit This Page"></td>
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