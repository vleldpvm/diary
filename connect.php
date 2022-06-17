<?php
#Database connect
$server = "localhost";
$user = "root";
$passwd = "";
$dbname = "diary";
$conn = new mysqli($server, $user, $passwd, $dbname);
if($conn->connect_error){
	die("DB 접속 오류");
}
?>