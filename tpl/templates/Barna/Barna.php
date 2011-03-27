<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo SITE_NAME;?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">

  <link rel="stylesheet" href="tpl/templates/Barna/css/style.css?v=2">
  <script src="js/libs/modernizr-1.7.min.js"></script>

</head>

<body>

  <div id="container">
  <header>
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
	</header>

	<div id="main" role="main">
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

	<footer>
		©<?php echo date("Y") . " " . SITE_NAME . "." ;?>
	<footer>


	</div> <!-- eo #container -->


  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
  <script>window.jQuery || document.write("<script src='js/libs/jquery-1.5.1.min.js'>\x3C/script>")</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <!-- end scripts-->


  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg");</script>
  <![endif]-->



  <script>
    var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID 
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
    s.parentNode.insertBefore(g,s)}(document,"script"));
  </script>

</body>
</html>