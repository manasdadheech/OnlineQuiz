<?php
$title='Completion';
require('./template/header.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in. Please <a href="./">log in</a>.');
}


if(isset($_REQUEST["submit"]))
{
require('./includes/db_connectProc.php');
/*$db = db_connect();*/
$Answer1 = $_POST['Answer1'];
$Answer2 = $_POST['Answer2'];
$Answer3 = $_POST['Answer3'];
$Answer4 = $_POST['Answer4'];
$Answer5 = $_POST['Answer5'];
$user_id= $_SESSION['user_id'];
/*This insert command for username and password only, if you need any other column you can insert it here*/


$regis= "INSERT INTO answers(user_id,ans1,ans2,ans3,ans4,ans5) VALUES ('$user_id','$Answer1','$Answer2','$Answer3','$Answer4','$Answer5') ";
$order1=mysqli_query($conn, $regis) or  die("".mysql_error());


//Here you can write conformation or success message or use any redirect
echo "Answers have been recorded successfully !";

}
else
{echo 'not working';}



echo '<h2 class="heading"><span id="green">Congratulations!</span> You have completed the test. You may logout by clicking on the button the the right</h2>';
require('./template/footer.php');	


?>
