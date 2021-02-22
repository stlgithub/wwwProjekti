<?php
// onko lähetetty napin kautta
if(isset($_POST["review"])) {
    $review = json_decode($_POST["review"]);
} else {
    echo "Not from form!";
    exit;
}

// kaikki tiedot saatu
if(!empty($review -> productId) && !empty($review -> userId) && !empty($review -> rating) && !empty($review -> heading) && !empty($review -> content) && !empty($review -> date)) {
    include("database.php");

    $user = 1;

    $sql = "INSERT INTO projekti_reviews(user_id, product_id, heading, content, rating, date) VALUES(?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param('iissis', $review->userId, $review->productId, $review->heading, $review->content, $review->rating, $review->date);
    $result = $stmt -> execute();

    if(!$result) {
        echo "Tallennus epäonnistui.";
        $mysqli -> close();
        exit;
    }

    echo "Tallennus onnistui!";
    $mysqli -> close();
    exit;

} else {
    echo "Didn't get all info!";
    exit;
}
?>