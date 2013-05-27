<?php
$title='Questions - Online examination system';
require('./template/header.php');
session_start();

if(!isset($_SESSION['user_id']))
{
	die('You are not logged in. Please <a href="./">log in</a>.');
}


require_once('./includes/db_connect.php');

$db = db_connect();
$qr = $db->prepare("SELECT q_body FROM subjective_Q  WHERE q_id =?");
$qs = array();

echo '<div class="questionsBody"><form name="RegForm" class="LoginForm" method="post" action="./resultS.php">
<fieldset>';

//1
	
	echo '<input type="hidden" name="q' . '" value="1" />';
	$qno=1;
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q1)</span>' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	
		echo '<input type="text" class="answer" name="Answer1"  size="80"/>' ;
	
	echo '</div>';
	
//2
$qno=2;
	echo '<input type="hidden" name="q' . '" value="2" />';
	
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q2)</span>' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	
		echo '<input type="text" class="answer" name="Answer2"  size="80"/>' ;
	
	echo '</div>';
	
//3
$qno=3;//Push the number into the array
	echo '<input type="hidden" name="q' . '" value="3" />';
	
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q3)</span>' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	
		echo '<input type="text" class="answer" name="Answer3"  size="80"/>' ;
	
	echo '</div>';

//4
$qno=4;//Push the number into the array
	echo '<input type="hidden" name="q' . '" value="4" />';
	
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q4)</span>' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	
		echo '<input type="text" class="answer" name="Answer4"  size="80"/>' ;
	
	echo '</div>';
//5
$qno=5; //Push the number into the array
	echo '<input type="hidden" name="q' . '" value="5" />';
	
	$qr->execute(array($qno));
	$result = $qr->fetch(PDO::FETCH_ASSOC);
	echo '<div class="question"><span class="corr_ques_no">Q5)</span>' . $result['q_body'] . '</div>';
	echo '<div class="answer">';
	
		echo '<input type="text" class="answer" name="Answer5" size="80" />' ;
	
	echo '</div>';


echo '<span class="LoginFormSubmit"></span><input type="submit" value="submit" name="submit" />
</fieldset>
</form>';



require('./template/footer.php');
?>
