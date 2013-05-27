<?php
$title='Registration - Online examination system';
require('./template/headerl.php');
require_once('./includes/membersite_config.php');


if(isset($_REQUEST['submit']))
{
require('./includes/db_connectProc.php');
/*$db = db_connect();*/
$username = $_POST['username'];
$salt='manas';
$password=crypt($_POST['userpass'],$salt);
$user_email=$_POST['user_email'];

/*This insert command for username and password only, if you need any other column you can insert it here*/
$regis= "INSERT INTO users(user_name, user_email, user_pass) VALUES ('$username','$user_email','$password')";
$order1=mysqli_query($conn, $regis) or  die("".mysql_error());
//Here you can write conformation or success message or use any redirect
echo "Register success";

}
else { echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspIf you are having Problems.Try entering a valid email/one that hasnt been used to Register Before .&nbsp&nbsp&nbsp&nbsp ';
	echo'&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspYou must recieve a Registration Success message before proceeding';
}
?>
<link rel="STYLESHEET" type="text/css" href="./pwdwidget.css" />
<link rel="STYLESHEET" type="text/css" href="./fg_membersite.css" />
<script type='text/javascript' src='./scripts/gen_validatorv31.js'></script>
<script src="scripts/pwdwidget.js" type="text/javascript"></script>
<form name="RegForm" class="LoginForm" method="post" action='<?php echo $fgmembersite->GetSelfScript(); ?>'>
<fieldset>
<legend>Register :</legend>
<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'>* required fields</div>
<input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />

<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

Enter a unique Username*: <input type="text" name="username" value='<?php echo $fgmembersite->SafeDisplay('username') ?>' id="user" /><br />
Enter your email-id*: <input type="text" name= "user_email" value='<?php echo $fgmembersite->SafeDisplay('user_email') ?>' id="email" /><br />


<div class='container' style='height:80px;'>
    <label for='password' >Password*:</label>
    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
    <noscript>
    <input type='password' name='userpass' id='pass' maxlength="50" />
    </noscript>    
    <div id='RegForm_password_errorloc' class='error' style='clear:both'></div>
</div>
<div id='RegForm_password_errorloc' class='error' style='clear:both'></div>



<span class="LoginFormSubmit"></span><input type="submit" value="submit" name="submit" />
</fieldset>
</form>

<script type='text/javascript'>
 
    var pwdwidget = new PasswordWidget('thepwddiv','userpass');
    pwdwidget.MakePWDWidget();
    
    var frmvalidator  = new Validator("RegForm");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

  

    frmvalidator.addValidation("user_email","req","Please provide your email address");

    frmvalidator.addValidation("user_email","email","Please provide a valid email address");

    frmvalidator.addValidation("username","req","Please provide a username");
    
    frmvalidator.addValidation("userpass","req","Please provide a password");
 
</script>


<?php

	echo '<div class="info">If you have already registered please move to the  <a href="./index.php">Login page</a>.</div>';


require('./template/footer.php'); ?>
