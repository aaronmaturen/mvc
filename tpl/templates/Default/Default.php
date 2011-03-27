<html>
<head>
<link rel="stylesheet" type="text/css" href="tpl/templates/Default/Default.css" />

<title><?php echo SITE_NAME;?></title>
</head>

<body>

<div id="ZBHeader">
	<!-- Site Navigation -->
	<a class="navigation" href="index.php"> Home </a>
  	<a class="navigation" href="index.php?module=home&class=about"> About </a>
  	<?php if($_SESSION['usertype'] == 'master'){?>
  		<a class="navigation" href="index.php?module=admin&class=config"> Site Config </a>
  	<?php } ?>
  	
  	<!-- User Navigation-->
  	<?php if($_SESSION['username']!==NULL){?>
  		<a class="user" href="index.php?module=user&class=logout"> Logout </a>
  		<a class="user" href="index.php?module=user&class=profile"> <?php echo $_SESSION['username']; ?></a>
  	<?php } else { ?>
  		<a class="user" href="index.php?module=user&class=login"> Login </a>
  	<?php } ?>
</div>

<div id="content">
<?php 

//echo is_array($_SESSION['errors'])?"yes":"no";

if (is_array($_SESSION['errors']) && count($_SESSION['errors'])){ ?>
	<div id="error">
		<ul>
		<?php foreach ($_SESSION['errors'] as $error) { ?>
  			<li> <?php echo $error; ?> </li>
		<?php } ?>
		</ul>
	</div>
<?php }

if (is_array($_SESSION['alerts']) && count($_SESSION['alerts'])){ ?>
	<div id="alert">
		<ul>
		<?php foreach ($_SESSION['alerts'] as $alert) { ?>
  			<li> <?php echo $alert; ?> </li>
		<?php } ?>
		</ul>
	</div>
<?php } ?>
    
	<!--<div id="content-left">-->
		<!--{include file=$tplPathLeft}-->
	<!--</div>-->

	<div id="content-right">
		<?php if(file_exists($tplPath)){	
			include($tplPath);
		}?>
	</div>

</div>

<div id="footer">
	©<?php echo date("Y") . " " . SITE_NAME . "." ;?>
</div>

</body>
</html>