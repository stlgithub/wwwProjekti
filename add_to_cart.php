<?php
// onko lähetetty napin kautta
if(isset($_POST["product"])) {
    $product = json_decode($_POST["product"]);
} else {
    echo "No product selected.";
    exit;
}

// kaikki tiedot saatu
if(!empty($product -> productId) && !empty($product -> productName) && !empty($product -> productPrice)) {
    // aloita sessio
    session_start();

    // lisää tuotteen tiedot arrayhin
    $product_array = array(
        'product_id' => $product -> productId,
        'product_name' => $product -> productName,
        'product_price' => $product -> productPrice,
        'quantity' => 1
    );

    // jos shopping_cart on jo olemassa
    if(isset($_SESSION["shopping_cart"])) {
        // ota kaikki shopping_cartin tuotteiden id:t talteen
        $product_id_array = array_column($_SESSION["shopping_cart"], "product_id");

        // katsotaan ettei lisättävä tuote ole jo ostoskorissa
        if(!in_array($product -> productId, $product_id_array)) {
            // lisää tuote shopping_carttiin
            array_push($_SESSION["shopping_cart"], $product_array);
            echo "Product added to cart!";
            header("Location: shoppingcart.php");
        } else {
            // tuote on jo shopping_cartissa
            echo "Product already in cart.";
        }
    } else {
        // sessiota ei ole
        // lisää tuote shopping_cartin ensimmäiseen alkioon
        $_SESSION["shopping_cart"][0] = $product_array;
        echo "Product added to cart!";
        header("Location: shoppingcart.php");
    }
} else {
    echo "Incomplete product data.";
    exit;
}

?>