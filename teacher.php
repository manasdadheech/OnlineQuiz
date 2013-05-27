<?php

session_start();
$out='';
if(!isset($_SESSION['T_id']) && isset($_REQUEST['teacher']))
{
	require_once('./includes/db_connect.php');
	$db = db_connect();
	$qr = $db->prepare("SELECT T_id, T_pass FROM teacher WHERE T_name = ?");
	$qr->execute(array($_REQUEST['teacher']));
	$salt='manas';
	$cryptpass=crypt($_REQUEST['pass'],$salt);
	switch($qr->rowCount())
	{
		case 0: $out .= "This teacher record does not exist.";
		break;
		case 1: $result = $qr->fetch(PDO::FETCH_ASSOC);
				if(strcmp($cryptpass, $result['T_pass']) == 0)
				{
					$_SESSION['T_id'] = $result['T_id'];
					$_SESSION['T_name'] = $_REQUEST['user'];
					
					// Redirect to exam page if user authentication succeeds
					$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
					header('Location: http://'.$_SERVER['HTTP_HOST'].$uri.'./Eval.php');
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

if(!isset($_SESSION['T_id']))
{
	if(!empty($out))
	{
		echo "<div class='error'>{$out}</div>";
	}
	echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b> Teacher\'s only Login</b>';
?>
<form name="loginForm" class="LoginForm" method="post" action="./teacher.php">
<fieldset>
<legend>Log In :</legend>
Username: <input type="text" name="teacher" id="teacher" /><br />
Password: <input type="password" name="pass" id="pass" /><br />
<span class="LoginFormSubmit"></span><input type="submit" value="Submit" name="submit" />
</fieldset>
</form>


<?php
}

else
{
	echo '<div class="info">You are already logged in. Please proceed to the <a href="./choose.php">exam page</a>.</div>';
}

require('./template/footer.php'); ?>
