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

  
  $yhteys = mysqli_connect("localhost", "trtkp20a3", "trtkp20a3passwd");
  
  // Check connection
  if (!$yhteys) {
    die("Yhteyden muodostaminen epäonnistui: " . mysqli_connect_error());
  }
  echo "Yhteys OK."; 
  
  $tietokanta=mysqli_select_db($yhteys, "trtkp20a3");
  if (!$tietokanta) {
    die("Tietokannan valinta epäonnistui: " . mysqli_connect_error());
  }
  echo "Tietokanta OK."; 
  


  if ($name && $email && $message){
    $sql="insert into marianne_yhteydenotot(Name, Email, Message) values(?,?,?)";
    $stmt=mysqli_prepare($yhteys, $sql);
	if(!$stmt) {
      echo "Virhe: ".mysqli_error($yhteys);
    }
    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $message);
    mysqli_stmt_execute($stmt);
    $last_id = mysqli_insert_id($yhteys);
    mysqli_stmt_close($stmt);
  
 
 $stmt=mysqli_prepare($yhteys, $sql); 

  }
  
  mysqli_close($yhteys); 
  
 
  exit;
  ?>