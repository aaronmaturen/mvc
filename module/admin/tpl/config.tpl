<?php if ($_SESSION['usertype']=='master'){ 
?>
<form method="post">

<label id="about">About</label> <br />
<textarea id="about" name="about" rows="50" cols="100">
<?php
echo $GLOBALS['about'];
?>
 </textarea><br />

<input type="submit" id="submit" value="Update" />
</form>

<?php } else { ?>
Insufficient access for this area.
<?php } 
echo $header;
?>