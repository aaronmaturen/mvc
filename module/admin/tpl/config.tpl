<?php if ($_SESSION['usertype']=='master'){ 
?>
<form method="post">
<label id="page">Page Name</label>
<br />
<input type="text" id="page_name" value="<?php echo($_GET['page']); ?>" />
<br />
<label id="content">Content</label>
<br />
<textarea id="content" name="content" rows="50" cols="100">
	<?php
		echo $GLOBALS['content'];
	?>
</textarea>
<br />

<input type="submit" id="submit" value="Update" />
</form>

<?php } else { ?>
Insufficient access for this area.
<?php } 
echo $header;
?>
