<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
  <meta name="author" content="Group 4">
  <meta name="description" content="The Shopping Cart page of the store. Group 4 web development project.">
  <meta name="link" content="https://stlgithub.github.io/wwwProjekti/shoppingcart.html">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href= "css/style.css" rel="stylesheet" type="text/css">
    <style>

      .col-sm-8 {
        background-color: #0F292F;
      }

      a {
        color: #14A098;
      }

      .nav-link {
        color:#CB2D6F;
      }

      nav a.active {
        font-weight: bold;
      }
      


    </style>

</head>
<body>
<?php
session_start();
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      unset($_SESSION["shopping_cart"][$key]);
      $total_price = 0;
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
?>
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
                      <a class="nav-link" href="index.html">Home</a>
                  </li>
                  <li>
                      <a class="nav-link" href="product.html">Laptop</a>
                  </li>
                  <li>
                      <a class="nav-link" href="product2.html">Smartphone</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="aboutus.html">About us</a>
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


      <!-- Content left side -->

      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div style="margin: 2%;">
            <h1 style="font-size: xx-large; margin-left: 3%; ">Shopping Cart</h1>
          </div>
          <div style="margin: 2%; border-top: 2px solid #14A098;">
            <div class="container" style="margin-top: 1%; margin-left: 2%; color: white; font-size: large;">
                <div class="row">
                  <div class="col-5">
                    PRODUCT DETAILS
                    <p style="margin-top: 2%;"></p>
                  </div>
                  <div class="col-sm">
                    PRICE
                    <p style="margin-top: 2%;"></p>
                  </div>
                  <div class="col-sm">
                    QUANTITY
                    <p style="margin-top: 2%;"></p>
                  </div>
                  <div class="col-sm">
                    TOTAL
                    <p style="margin-top: 2%;"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="container" style="margin-top: 1%; margin-left: 2%; color: white; font-size: large;">
                <div class="row" style="min-height: 350px;">
                  <div class="col-5">
                    <p style="margin-top: 2%;">    
                    <?php
                        if(isset($_SESSION["shopping_cart"])){
                            $total_price = 0;
                        ?>
                        <?php  
                              foreach ($_SESSION["shopping_cart"] as $product){
                        ?>                           
                          <?php echo $product["product_name"]; ?><br />
                          <form method='post' action=''>
                          <input type='hidden' name='action' value="remove" />
                          <button type='submit' class='remove'>Remove Item</button>
                          </form>

                          </p>
                  </div>
                  <div class="col-sm">
                    <p style="margin-top: 2%;">
                     <?php echo $product["product_price"]; ?>
              </p>

                  </div> 
                  <div class="col-sm">
                    <p style="margin-top: 2%;">
                    <form method='post' action=''>
                    <input type='hidden' name='action' value="change" />
                    <select name='quantity' class='quantity' onChange="this.form.submit()">
                    <option <?php if($product["quantity"]==1) echo "selected";?>
                    value="1">1</option>
                    <option <?php if($product["quantity"]==2) echo "selected";?>
                    value="2">2</option>
                    <option <?php if($product["quantity"]==3) echo "selected";?>
                    value="3">3</option>
                    <option <?php if($product["quantity"]==4) echo "selected";?>
                    value="4">4</option>
                    <option <?php if($product["quantity"]==5) echo "selected";?>
                    value="5">5</option>
                    </select>
                    </form>

                  </div>
                  <div class="col-sm">
                    <p style="margin-top: 2%;">
                      
                  <?php $total_price +=  ((int)$product["product_price"]*$product["quantity"]); ?>
                  <?php echo $total_price."€"; ?>
                   <?php
                    }
                    ?>
                    <?php
                    }
                    ?>                                  
                  </p>
                  </div>
              </div>
</div> 
          </div>

          <!-- Content right side -->
          <div class="col-sm-4"><div style="background-color: #0F292F; min-height: 500px;">
            <div style="margin: 2%;">
                <h1 style="font-size: x-large; text-align: center; margin-top: 10%;">Place Order</h1>
                        <br>
                          <form action='orders.php' method='post' name=scart-from>
                          <p style="text-align: center;">Name: </p><div style="text-align:center;"><input type='text' name='name' value='' style="text-align: center;"></div><br>
                          <p style="text-align: center;">Address: </p><div style="text-align:center;"><input type='text' name='address' value='' style="text-align: center;"></div><br>
                          
                          <p style="text-align: center;">SHIPPING OPTIONS</p>
                        <div class="dropdown" style="text-align: center;" >
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #14A098;">
                              Delivery options
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Free Delivery - 0.00€</a>
                              <a class="dropdown-item" href="#">Standard Delivery - 5.00€</a>
                              <a class="dropdown-item" href="#">Express Delivery - 15.00€</a>
                            </div>  <br>
                            <p style="text-align: center;">SHIPPING 0.00€</p> <br>
                          </div>
                          <p style="text-align: center;">TOTAL PRICE: </p>
                          <div style="color:white; text-align:center;">  <?php echo $total_price."€"; ?> </div> <br>
                          <p hidden style="text-align: center;">Items: </p><div hidden><input type='text' name='product_name' value=<?php echo $product["product_name"]; ?> style="text-align: center;"></div>
                          <p hidden style="text-align: center;">Quantity: </p><div hidden style="text-align:center;"><input type='text' name='quantity' value=<?php echo $product["quantity"]; ?> style="text-align: center;"></div>
                          <p hidden style="text-align: center;">Total Price: </p><div hidden style="text-align:center;"><input type='text' name='total_price' value=<?php echo $total_price."€"; ?> style="text-align: center;"></div>
                          <div style="text-align:center;"><input type='submit' name='ok' value='Confirm Order' class="btn btn-secondary" style="text-align: center; background-color: #14A098;"></div><br>
                        </form>
                        
                          <br>




                  
            </div>
        </div></div>
          
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                    

  </body>
</html>