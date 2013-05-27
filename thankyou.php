<?php
$title='Mark Storage';
require('./template/header.php');

session_start();

if(!isset($_SESSION['T_id']))
{
	die('You are not logged in. Please <a href="./teacher.php">log in</a>.');
}


if(isset($_REQUEST["submit"]))
{
require('./includes/db_connectProc.php');
/*$db = db_connect();*/
$Answer1 = $_POST['Marks1'];
$Answer2 = $_POST['Marks2'];
$Answer3 = $_POST['Marks3'];
$Answer4 = $_POST['Marks4'];
$Answer5 = $_POST['Marks5'];

/*This insert command for username and password only, if you need any other column you can insert it here*/


$regis= "UPDATE `subjective_q` SET `marks1`=$Answer1,`marks2`=$Answer2,`marks3`=$Answer3,`marks4`=$Answer4,`marks5`=$Answer5 WHERE q_id=1";

$order1=mysqli_query($conn, $regis) or  die("".mysql_error());


//Here you can write conformation or success message or use any redirect
echo "Answers have been recorded successfully !";

}
else
{echo 'not working';}



echo '<h2 class="heading"><span id="green">Congratulations!</span> You have completed the Evaluation. You may logout by clicking on the button the the right</h2>';
require('./template/footer.php');	


?>
