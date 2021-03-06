<?php

session_start();
$out='';
if(!isset($_SESSION['user_id']) && isset($_REQUEST['user']))
{
	require_once('./includes/db_connect.php');
	$db = db_connect();
	$qr = $db->prepare("SELECT user_id, user_pass FROM users WHERE user_name = ?");
	$qr->execute(array($_REQUEST['user']));
	$salt='manas';
	$cryptpass=crypt($_REQUEST['pass'],$salt);
	switch($qr->rowCount())
	{
		case 0: $out .= "The user does not exist.";
		break;
		case 1: $result = $qr->fetch(PDO::FETCH_ASSOC);
				if(strcmp($cryptpass, $result['user_pass']) == 0)
				{
					$_SESSION['user_id'] = $result['user_id'];
					$_SESSION['user_name'] = $_REQUEST['user'];
					
					// Redirect to exam page if user authentication succeeds
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					header('Location: http://'.$_SERVER['HTTP_HOST'].$uri.'/choose.php');
					exit;
				}
				else
				{
					$out .= "Password does not match with our records.";
				}
				break;
		default:$out .= "An unexpected error has occured: More than one entry for same user. <br />Please contact admin with your details";
	}
}
  
$title='Login - Online examination system';
require('./template/headerl.php');

if(!isset($_SESSION['user_id']))
{
	if(!empty($out))
	{
		echo "<div class='error'>{$out}</div>";
	}
?>
<form name="loginForm" class="LoginForm" method="post" action="./index.php">
<fieldset>
<legend>Log In :</legend>
Username: <input type="text" name="user" id="user" /><br />
Password: <input type="password" name="pass" id="pass" /><br />
<span class="LoginFormSubmit"></span><input type="submit" value="Submit" name="submit" />
</fieldset>
</form>
<div class="center">
<a href="./regis.php" >Register yourself</a>
 &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;
<a href="./teacher.php" ><b>Teacher's Login</b></a>
</div>

<?php
}

else
{
	echo '<div class="info">You are already logged in. Please proceed to the <a href="./choose.php">exam page</a>.</div>';
}

require('./template/footer.php'); ?>
