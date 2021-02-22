<?php
include "aboutus.html";
?>

<?php
session_start();
require_once "config.php";
?>

<?php

if (isset($_POST["name"])){
    $name=$_POST["name"];
}
else{
    $name="";
}

if (isset($_POST["email"])){
    $email=$_POST["email"];
}
else{
    $email="";
}

if (isset($_POST["message"])){
    $message=$_POST["message"];
}
else{
    $message="";
}

   


  if ($name && $email && $message){
    $sql="insert into marianne_yhteydenotot(Name, Email, Message) values(?,?,?)";
    $stmt=mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
	mysqli_close($mysqli);
	echo '<script type="text/javascript">';
	echo 'alert("Message sent successfully!")';
	echo '</script>';
	exit;  
}
else{
	echo '<script type="text/javascript">';
	echo 'alert("Fill in all fields")';
	echo '</script>';

  exit;
}

  ?>
