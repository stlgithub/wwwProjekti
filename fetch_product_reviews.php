<?php
include "config.php";
$sql = "SELECT Name, `date`, rating, heading, content  FROM group4_reviews INNER JOIN group4_accounts ON group4_reviews.user_id = group4_accounts.userId ORDER BY `date` DESC";

$result = $mysqli -> query($sql);

if($result) {
    while($row = $result -> fetch_row()) {
        $username = $row[0];
        $date = date_format(date_create($row[1]), "d.m.Y");
        $rating = $row[2];
        $heading = $row[3];
        $content = $row[4];

        $full_stars = (int)$rating;
        $half_stars = ceil($rating) - $full_stars;
        $empty_stars = 5 - $full_stars - $half_stars;

        $html = str_repeat('<i class="bi bi-star-fill"></i>'."\n", $full_stars);
        $html .= str_repeat('<i class="bi bi-star-half"></i>'."\n", $half_stars);
        $html .= str_repeat('<i class="bi bi-star"></i>'."\n", $empty_stars);

        echo '<article class="mb-4">
        <div class="d-flex flex-row mb-1">
            <img src="img/user_placeholder_color.png" alt="Default user avatar" width="25" height="25"/>
            <small class="ms-2 align-self-center flex-grow-1">'.$username.'</small>
            <small class="align-self-center ms-auto">'.$date.'</small>
        </div>
        <div class="d-flex flex-row">
            <h5 class="flex-grow-1">'.$heading.'</h5>
            <div class="reviewStarRatings ms-auto">
                '.$html.'
            </div>
        </div>
        
        <p>
            '.$content.'
        </p>
        </article>';
    }
} else {
    echo "<h4>Reviews couldn't be fetched at this time.</h4>";
}

?>