<?php
include "login.html";
?>

<?php
// jos signup painiketta painettu
if (isset($_POST['signup'])){
  unset($error);
  $username = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Susername"])));
  $password = $mysqli -> real_escape_string(($_POST["Spassword"]));
  $email = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Semail"])));
  
  $sql = 'SELECT * FROM group4_accounts WHERE Name = "'.$username.'"';
  $result = $mysqli->query($sql);
  // jos käyttäjänimi on jo olemassa
  if ($result->num_rows > 0){
  $error = "This username is already taken!<br>";
  echo '<script type="text/javascript">';
  echo ' alert("This username is already taken!")';
  echo '</script>';
  }
  else{
  $sql = 'SELECT * FROM group4_accounts WHERE Email = "'.$email.'"';
  $result = $mysqli->query($sql);
  // jos sähköposti on jo olemassa
  if ($result->num_rows > 0){
  $error = "This email is being used by another account!<br>";
  echo '<script type="text/javascript">';
  echo ' alert("This email is being used by another account!")';
  echo '</script>';
  }
  else{
    $sql= "SELECT UserID FROM group4_accounts ORDER BY UserID DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $LastId = $row['UserID']+1;
    $sql = "INSERT INTO group4_accounts (UserID, Name, Password, Email) VALUES ('$LastId','$username','$password','$email')";
    echo '<script type="text/javascript">';
    echo ' alert("Account succesfully created!")';
    echo '</script>';
   if ($mysqli->query($sql)){
     $_SESSION["loggedIn"] = TRUE;
     $_SESSION["username"] = $username;
     $_SESSION["userID"] = $LastId;
     $_SESSION["email"] = $email;
   }
   // virhe havaittu käyttäjää tehdessä
   else{
     echo '<script type="text/javascript">';
     echo ' alert("Error creating account. Please try again later.")';
     echo '</script>';
   }
  }
}
}
// jos Login painiketta painettu
else if (isset($_POST["login"])){
  $username = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Lusername"])));
  $password = $mysqli -> real_escape_string($_POST["Lpassword"]);
  $sql = "SELECT * FROM group4_accounts WHERE Name = '$username'";
  $result = $mysqli->query($sql);
  if ($result->num_rows == 0){
    $error2 = "There is no account associated with this username!<br>";
    echo '<script type="text/javascript">';
    echo ' alert("There is no account associated with this username!")';
    echo '</script>';
  }
  // kun kirjautuminen onnistuu
  else{
    $sql = "SELECT * FROM group4_accounts WHERE Name = '".$username."'AND Password = '".$password."'";
    $result = $mysqli->query($sql);
    echo '<script type="text/javascript">';
    echo ' alert("Succesfully logged in.")';
    echo '</script>';
    if($result->num_rows == 1){
      $row = $result->fetch_row();
      $_SESSION["loggedIn"] = TRUE;
      $_SESSION["username"] = $row[1];
      $_SESSION["userID"] = $row[0];
      $_SESSION["email"] = $row[3];
    }
    // jos käyttäjä antaa väärän käyttäjänimen tai salasanan
    else{
      $error2 = "Invalid username or password!<br>";
      echo '<script type="text/javascript">';
      echo ' alert("Invalid username or password!")';
      echo '</script>'; 
    }
  }
}
?>
