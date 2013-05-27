<?php


$username=$_POST['user'];
$pass=$_POST['pass'];
$user_email=$_POST['user_email'];

if($username&&$pass&&$user_email){
mysql_connect("localhost","root","")or die("cannot connect"); 
mysql_select_db("oes")or die("cannot select DB");
$regis= "INSERT INTO 'users'( `user_name`, `user_email`, `user_pass`) VALUES ('$username','$pass','$user_email')";
$order= mysql_query($regis);
}
?>
