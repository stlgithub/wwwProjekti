<!DOCTYPE html>

<?php
session_start();
require_once "config.php";

if (isset($_POST['signup'])){
  unset($error);
  $username = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Susername"])));
  $password = $mysqli -> real_escape_string(($_POST["Spassword"]));
  $email = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Semail"])));
  
  $sql = 'SELECT * FROM Accounts WHERE Name = "'.$username.'"';
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0){
  $error = "This username is already taken!<br>";
  }
  else{
  $sql = 'SELECT * FROM Accounts WHERE Email = "'.$email.'"';
  $result = $mysqli->query($sql);
  if ($result->num_rows > 0){
  $error = "This email is being used by another account!<br>";
  }
  else{
    $sql= "SELECT UserID FROM Accounts ORDER BY UserID DESC LIMIT 1";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
    $LastId = $row['UserID']+1;
    $sql = "INSERT INTO Accounts (UserID, Name, Password, Email) VALUES ('$LastId','$username','$password','$email')";
   if ($mysqli->query($sql)){
     $_SESSION["loggedIn"] = TRUE;
     $_SESSION["username"] = $username;
     $_SESSION["userID"] = $LastId;
     $_SESSION["email"] = $email;
   }
   else{
     echo("Error creating account. Please try again later.");
   }
  }
}
}
else if (isset($_POST["login"])){
  $username = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["Lusername"])));
  $password = $mysqli -> real_escape_string($_POST["Lpassword"]);
  $sql = "SELECT * FROM Accounts WHERE Name = '$username'";
  $result = $mysqli->query($sql);
  if ($result->num_rows == 0){
    $error2 = "There is no account associated with this username!<br>";
  }
  else{
    $sql = "SELECT * FROM Accounts WHERE Name = '".$username."'AND Password = '".$password."'";
    $result = $mysqli->query($sql);
    if($result->num_rows == 1){
      $row = $result->fetch_row();
      $_SESSION["loggedIn"] = TRUE;
      $_SESSION["username"] = $row[1];
      $_SESSION["userID"] = $row[0];
      $_SESSION["email"] = $row[3];
    }
    else{
      $error2 = "Invalid username or password!<br>";
    }
  }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="author" content="Group 4">
    <meta name="description" content="The login and registeration page. Group 4 web development project.">
    <meta name="link" content="https://stlgithub.github.io/wwwProjekti/login.php">
    <link rel="icon" type="image/png" href="favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href= "css/style.css" rel="stylesheet" type="text/css">

    <style>

   .col-sm-4 {
        background-color: #0F292F; margin-top: 3%;
    }

    a {
       color:white;
    }

    address{
        color: #CB2D6F;
    }
    
    label{
        color: #CB2D6F;
    }

    label {
    font-weight: bold;
    }

    .btn {
            color: #cccccc;
            background-color: #14A098;
            border-color: #0F292F;
        }

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
        
            <a class="navbar-brand" href="index.html"><img src="img/logo_transparent_bg.png" alt="Company logo" width="80" height="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.html">Home</a>
                    </li>
                    <li>
                        <a class="nav-link " href="product.html">Laptop</a>
                    </li>
                    <li>
                        <a class="nav-link " href="product2.html">Smartphone</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="aboutus.html">About us</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                  <li>
                      <a class="nav-link" href="shoppingcart.html"><img src="img/cart_nav_color.png" alt="Shopping cart" width="50" height="50"/></a>
                  </li>
              </ul>
            </div>
        </div>
    </nav>


      <!-- Content -->
      <div class="container">
    <div class="row">

      <div class="col-sm-4" style="padding: 100px;">
        <h2 style="text-align: center;"><b>Login</b></h2><br><br>
        <form id = "lForm" method = "POST" style="text-align: center;">
        <label>Username: </label><br><input name = "Lusername" type = "text" placeholder = "Username" required><br><br>
        <label>Password: </label><br><input name = "Lpassword" type = "password" placeholder = "Password" pattern = ".{5,}" required><br><br>
        <button type = "submit" class = "btn btn-primary" name = "login">Login</button>
        </form>
      </div>

      <div class="col-sm-4" style="padding: 100px;">
        <h2 style="text-align: center;"><b></b></h2><br>
      </div>

      <div class="col-sm-4" style=" padding: 100px;">
        <h2 style="text-align: center; "><b>Register</b></h2><br><br>
        <form id = "sForm" method = "POST" style="text-align: center;">
        <label>Username: </label><br><input name = "Susername" type = "text" placeholder = "Username" required><br><br>
        <label>Email: </label><br><input name = "Semail" type = "email" placeholder = "Email Address" required><br><br>
        <label>Password: </label><br><input name = "Spassword" type = "password" placeholder = "Password" pattern = ".{5,}" required><br><br>
        <button type = "submit" class = "btn btn-primary" name = "signup">Sign Up</button>
      </form>
      </div> 
   
</div>

  </div>

  <!-- Footer -->
  <footer>
    <div class="text-center p-3">
        <h6>
            Copyright © 2021 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. - <a class="link" href="aboutus.html">About Us</a>
        </h6>
    </div>
</footer>




  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>
</html>