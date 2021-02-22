<?php
session_start();
require_once "config.php";

$name=$_POST["name"];
$address=$_POST["address"];
$total_price=$_POST["total_price"];
$quantity=$_POST["quantity"];
$product_name=$_POST["product_name"];


if (!$yhteys) {
	die("Yhteyden muodostaminen epĆ¤onnistui: " . mysqli_connect_error());
}

$tietokanta=mysqli_select_db($yhteys, "example3");

if (!$tietokanta) {
	die("Tietokannan valinta epĆ¤onnistui: " . mysqli_connect_error());
}

$sql="insert into orders(Name, Address, ProductID, Quantity, Value) values(?, ?, ?, ?, ?)";
$stmt=mysqli_prepare($mysqli, $sql);
	mysqli_stmt_bind_param($stmt, 'sssss', $name, $address, $product_name, $quantity, $total_price);
	mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
    echo '<script type="text/javascript">';
    echo ' alert("Your order has been completed!.")';
    echo '</script>';
        echo "<script> location.href='shoppingcart.php'; </script>";
        exit;


?>