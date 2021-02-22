<?php
include "aboutus.html";
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
	if(!$stmt) {
      echo "Virhe: ".mysqli_error($mysqli);
    }
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
    mysqli_stmt_execute($stmt);
    $last_id = mysqli_insert_id($mysqli);
    mysqli_stmt_close($stmt);
  
 
 $stmt=mysqli_prepare($mysqli, $sql); 

  }
  
  mysqli_close($mysqli); 
  
 
  exit;
  ?>
