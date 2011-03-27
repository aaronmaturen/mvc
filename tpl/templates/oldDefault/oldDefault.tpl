<html>
<head>
<link rel="stylesheet" type="text/css" href="tpl/templates/oldDefault/oldDefault.css" />

<title>Zoe Babin</title>
</head>
<body>

<div id="left-shadow"></div>
<div id="right-shadow"></div>

<div id="container">
  <div id="navigation">
    <a href=""> About </a>
    <a href=""> Inbox </a>
    <a href=""> Search </a>
    <a href=""> Profile </a>
    {if $user->username > 0}
    <a href="index.php?module=user&class=logout"> Logout </a>
    {else}
    <a href="index.php?module=user&class=login"> Login </a>
    {/if}
    <a href="index.php"> Home </a>
  </div>
  <div id="content">
    <div id="content-right">
    	{include file=$tplPath}
    </div>
  
    <div id="content-left">
    	{if is_array($errors) && count($errors)}
    	<div id="errors">
    	<ul>
    	{foreach item=error from=$errors}
    	  <li> {$error} </li>
    	{/foreach}
    	</ul>
    	</div>
    	{/if}
  		{include file=$tplPathLeft}
    </div>
  </div>
</div>


</body>
</html>