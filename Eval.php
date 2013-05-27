<?php
$title='Evalation Portal- Online examination system';
require('./template/header.php');
session_start();

if(!isset($_SESSION['T_id']))
{
	die('You are not logged in. Please <a href="./teacher.php">log in</a>.');
}


require_once('./includes/db_connect.php');
require('./includes/db_connectProc.php');
$db = db_connect();
$qr = $db->prepare("SELECT q_body FROM subjective_Q  WHERE q_id =?");

$qw=mysqli_query($conn,'SELECT ans1 FROM answers where 1') or die("".mysql_error());;
echo '<div class="questionsBody"><form name="RegForm" class="LoginForm" method="post" action="./thankyou.php">
<fieldset>';

//1
	
	echo '<input type="hidden" name="q' . '" value="1" />';
	$qno=1;
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q1)</span>' . $result['q_body'] . '</div>';
$i=1;
$row = mysqli_fetch_array($qw);
	
		echo '<div class="question"><span class="corr_ques_no">Ans'.$i.':</span>' .$row['ans1'] . '</div>';
	echo '<label>Marks allotted:</label><input type="text" class="answer" name="Marks1"  size="5"/>' ;

$row = mysqli_fetch_array($qw);
$i=2;
echo '<div class="question"><span class="corr_ques_no">Ans'.$i.':</span>' .$row['ans1'] . '</div>';
	echo '<label>Marks allotted:</label><input type="text" class="answer" name="Marks2"  size="5"/>' ;

$row = mysqli_fetch_array($qw);
$i=3;
echo '<div class="question"><span class="corr_ques_no">Ans'.$i.':</span>' .$row['ans1'] . '</div>';
	echo '<label>Marks allotted:</label><input type="text" class="answer" name="Marks3"  size="5"/>' ;
	
	$row = mysqli_fetch_array($qw);
$i=4;
echo '<div class="question"><span class="corr_ques_no">Ans'.$i.':</span>' .$row['ans1'] . '</div>';
	echo '<label>Marks allotted:</label><input type="text" class="answer" name="Marks4"  size="5"/>' ;
	
	$row = mysqli_fetch_array($qw);
$i=2;
echo '<div class="question"><span class="corr_ques_no">Ans'.$i.':</span>' .$row['ans1'] . '</div>';
	echo '<label>Marks allotted:</label><input type="text" class="answer" name="Marks5"  size="5"/>' ;

echo '<span class="LoginFormSubmit"></span><input type="submit" value="submit" name="submit" />
</fieldset>
</form>';



require('./template/footer.php');
?>

