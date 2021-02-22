<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not So Good Laptop</title>
    <meta name="author" content="Group 4">
    <meta name="description" content="Product page of the laptop. Group 4 web development project.">
    <meta name="link" content="https://stlgithub.github.io/wwwProjekti/product.html">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png"/>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <!-- Custom styling, same for all team members -->
    <link href= "css/style.css" rel="stylesheet" type="text/css">
    
    <!-- Own styling for this page only -->
    <style>
        body {
            color: white;
        }

        .contentArea {
            background-color: #0F292F;
        }

        h4, h5 {
            color: #14A098;
        }

        p {
            color: #cccccc;
        }

        a {
            color: #14A098;
        }

        .btn {
            color: #cccccc;
            background-color: #14A098;
            border-color: #0F292F;
        }

        .btn:hover {
            background-color: #12817c;
            border-color: #CB2D6F;
        }

        .btn:active, .btn:focus {
            box-shadow: 0 0 0 3px rgba(203, 45, 111, 0.6) !important;
        }

        a:hover {
            color: #cccccc;
        }

        #collapseMain, .collapseContent {
            margin-top: 10px;
        }

        .collapseButton {
            color: #cccccc;
            background-color: #14A098;
            border-color: #0F292F;
            border-top: none; 
            border-left: none;
            border-right: 1px solid #0F292F;
            border-bottom-width: 2px;
            cursor: pointer;
        }

        ol.carousel-indicators > li {
            background-color: #14A098;
            width: 15px;
            height: 15px;
            border-radius: 50%;
        }

        .collapseButton:hover {
            background-color: #12817c;
            color:#cccccc;
        }

        .collapseButtonLast {
            border-left: 1px solid #0F292F;
            border-right: none;
        }

        table > thead > tr > th {
            color: #14A098;
        }

        table, table > thead > tr > th, table > tbody > tr > td {
            border-bottom-color: #CB2D6F !important;
        }

        /* Collapse buttons (Details, Reviews) styles when toggled on/off */
        .collapseButton[aria-expanded="true"] {
            border-bottom-color: #CB2D6F;
            background-color: #12817c;
            color: #cccccc;
        }

        .collapseButton[aria-expanded="false"] {
            border-bottom-color: transparent;
        }
    </style>
</head>
<body>
    <?php
        session_start();

        /* Tällä voi testata formia
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = 1; */
    ?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
        
            <a class="navbar-brand" href="index.html"><img src="img/logo_transparent_bg.png" alt="Company logo" width="80" height="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li>
                        <a class="nav-link active" href="product.html">Laptop</a>
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

    <!-- Content -->
    <div class="container-fluid">
        <div class="row">

            <!-- Product images -->
            <div class="col-md-6 contentArea">
                <div class="carousel slide" data-bs-ride="carousel" id="productSlides">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#productSlides" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#productSlides" data-bs-slide-to="1"></li>
                        <li data-bs-target="#productSlides" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="img/product_1/first_scaled.jpg" alt="Picture showcasing the laptop product"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="img/product_1/second.jpg" alt="Picture showcasing the laptop product"/>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="img/product_1/third_scaled.jpg" alt="Picture showcasing the laptop product"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product details -->
            <div class="col-md-6 contentArea">
                <div class="d-flex flex-row flex-wrap">
                    <h1 class="flex-grow-1" id="productName">Not so good laptop</h1>
                    <div class="totalStarRatings flex-shrink-1">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        <i class="bi bi-star"></i>
                        
                        <small>
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">See reviews</a>
                        </small>
                    </div>
                </div>
               
                <h2 id="productPrice">200€</h2>
                <p>
                    With this laptop you can surf the web at below average speeds and play minesweeper all you want.<br>
                    Although not cutting edge technology it's still better than nothing (this statement is arguable).
                </p>
                
                <a class="btn btn-outline-primary w-100" role="button" onclick="addToCart()">Add to cart</a>
                <p id="message"></p>
                

                <!-- Details, Technical and Reviews -->
                <div id="collapseMain">
                    <ul class="list-group list-group-horizontal">
                        <li class="collapseButton list-group-item list-group-item-action text-center" data-bs-toggle="collapse" data-bs-target="#collapseDetails" aria-expanded="false" aria-controls="collapseDetails">Details</li>
                        <li class="collapseButton list-group-item list-group-item-action text-center" data-bs-toggle="collapse" data-bs-target="#collapseTechnical" aria-expanded="false" aria-controls="collapseTechnical">Technical</li>
                        <li class="collapseButton collapseButtonLast list-group-item list-group-item-action text-center" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">Reviews</li>
                    </ul>
                    <div class="collapseContent">
                        <!-- Details -->
                        <div class="collapse" data-bs-parent="#collapseMain" id="collapseDetails">
                            <h3>Product details</h3>
                            <p>
                                Turning the laptop on for the first time you are greeted by the <strong>50 step installation of unnecessary programs<sup>TM</sup></strong>.<br>
                                You will also be prompted to register for our <strong>We will not sell your information forward<sup>TM</sup></strong> subscription.<br>
                                This is mandatory as you will not be able to use the device without it.
                            </p>
                        </div>

                        <!-- Technical -->
                        <div class="collapse" data-bs-parent="#collapseMain" id="collapseTechnical">
                            <h3>Product technical information</h3>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th colspan="2">Electronics</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Manufacturer</td>
                                        <td>Unknown<sup>TM</sup></td>
                                    </tr>
                                    <tr>
                                        <td>Processor</td>
                                        <td>Very_good.21</td>
                                    </tr>
                                    <tr>
                                        <td>Cores</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>Speed (GHz)</td>
                                        <td>1,10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Reviews tab -->
                        <div class="collapse" data-bs-parent="#collapseMain" id="collapseReviews">
                            <div class="d-flex flex-row mb-2">
                                <h3>Product reviews</h3>
                                <button class="btn ms-auto">Write a review <i class="bi bi-star-fill"></i></button>
                            </div>

                            <?php
                                if(isset($_SESSION['loggedIn']) && isset($_SESSION['userID']) && $_SESSION['loggedIn'] != false) {
                                    include("review_form.html");
                                } else {
                                    echo "Please login first!";
                                }
                            ?>
                            
                            <!-- Reviews -->
                            <?php
                                include "fetch_product_reviews.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="text-center p-3">
            <h6>
                Copyright © 2021 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. - <a class="link" href="aboutus.html">About Us</a>
            </h6>
        </div>
    </footer>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // tuotteen lähetys php-tiedostolle
        function addToCart() {
            var productInfo = {
                productId: 1, 
                productName: $("#productName").text(),
                productPrice: $("#productPrice").text()
            };

            var productJson = JSON.stringify(productInfo);

            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        $("#message").text(this.responseText);
                    }
                };
                xhttp.open("POST", "add_to_cart.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("product=" + productJson);
        }

        // review
        function sendReview() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;
            
            var reviewInfo = {
                productId: 1,
                rating: $("input[name=rate]:checked").val(), 
                heading: $("#reviewHeading").val(),
                content: $("#reviewContent").val(),
                date: today
            };



            var reviewJson = JSON.stringify(reviewInfo);

            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if(this.readyState == 4 && this.status == 200) {
                        $("#reviewMessage").text(this.responseText);
                    }
                };
                xhttp.open("POST", "add_review.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("review=" + reviewJson);

        }
    </script>
</body>
</html>