<?php
require("./common.php");
$conn = mysqli_connect("localhost", "root", "", "rentme");
if (!$conn) {
    die("no connection");
}

if (isset($_GET["article_id"])) {
    $article_id = $_GET["article_id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = 1;
        $comment = $_POST["comment"];
        $rating = $_POST["rating"];

        $query = "INSERT INTO reviews( comment, rating, article_id, user_id )
        VALUES ('$comment','$rating','$article_id','$user_id' )";
        $result = $conn->query($query);
    }
    $query = "SELECT articles.*,renter.first_name,renter.last_name,renter.profile_picture,renter.phone_number,renter.email FROM articles INNER JOIN renter ON  renter.id = articles.renter_id WHERE articles.id = $article_id;";
    $result = mysqli_query($conn, $query);
    $article = mysqli_fetch_assoc($result);
    $article_id = $article["id"];
    $query = "SELECT reviews.*,renter.first_name,renter.last_name,renter.profile_picture FROM reviews INNER JOIN renter ON  renter.id = reviews.user_id  WHERE article_id = $article_id ;";
    $result = mysqli_query($conn, $query);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die("error");
}

// $conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Single Article</title>
    <link rel="stylesheet" href="assets/css/single-article.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="https://allyoucan.cloud/cdn/icofont/1.0.1/icofont.css" integrity="sha384-jbCTJB16Q17718YM9U22iJkhuGbS0Gd2LjaWb4YJEZToOPmnKDjySVa323U+W7Fv" crossorigin="anonymous">
</head>

<body>
    <header>
        <!-- <nav class="nav">a generic navbar and a logo will be here</nav> -->
        <?php Navbar() ?>
    </header>
    <div class="container-fluid py-4 my-4 mx-auto d-flex flex-column main">
        <div class="header">
            <div class="row mx-5">
                <div class="col-md-9 title-container">
                    <h1><?php echo ($article["title"]) ?></h1>
                </div>
                <div class="col-md-3 text-right rating-container">
                    <div class="d-flex justify-content-end">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex justify-content-end">
                <div class="disponibility-button">disponible</div>
            </div> -->
        </div>
        <div class="container-body mt-4">
            <div class="row mb-5">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="<?php echo ($article["article_image_path"]) ?>" style="max-height:450px;max-width:40vw;" />
                </div>
                <div class="col-md-6 user-column">
                    <div class="user-card">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo ($article["profile_picture"]) ?>" width="100" />
                        </div>

                        <div class="text-center">
                            <h1 class="user-name"><?php echo ($article["first_name"] . " " . $article["last_name"]) ?></h1>
                            <div class="px-5" style="font-size: 0.875rem; line-height: 1.25rem">
                                <p>
                                    <?php echo ($article["description"]) ?>
                                </p>
                            </div>
                            <div class="user-stats " style="color: #fda300">
                                <!-- <div class="d-flex flex-column">
                                    <span class="user-stats-number">97</span>
                                    <span class="user-stats-title">Followers</span>
                                </div> -->

                                <!-- <div class="d-flex flex-column">
                                    <span class="user-stats-number">197</span>
                                    <span class="user-stats-title">Articles</span>
                                </div> -->

                                <div class="d-flex flex-column mx-auto">
                                    <span class="user-stats-number"><?php echo $article["price"] ?> TND</span>
                                    <span class="user-stats-title">per Day</span>
                                </div>

                            </div>

                            <div class="d-flex px-4 mt-4">
                                <button class="user-button">RENT NOW </button>
                                <!-- <button class="user-button"></button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- <div class="footer d-flex flex-column mt-5">
            <div class="row">
                <div class="col-md-2 underline-text">
                    <a href="file:///C:/Users/saif/OneDrive%20-%20SUPCOM/SupCom1/Club/SJE(junior)/1st%20project/models/1st%20model.html#">Description</a>
                </div>
                <div class="col-md-2">
                    <a href="file:///C:/Users/saif/OneDrive%20-%20SUPCOM/SupCom1/Club/SJE(junior)/1st%20project/models/1st%20model.html#">Review</a>
                </div>
                <div class="col-md-2 mio offset-md-4">
                    <a href="file:///C:/Users/saif/OneDrive%20-%20SUPCOM/SupCom1/Club/SJE(junior)/1st%20project/models/1st%20model.html#">ADD TO CART</a>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-warning">
                        <a href="file:///C:/Users/saif/OneDrive%20-%20SUPCOM/SupCom1/Club/SJE(junior)/1st%20project/models/1st%20model.html#">RENT NOW</a>
                    </button>
                </div>
            </div>
        </div> -->

        <div class="container">
            <div class="col-md-12">
                <div class="offer-dedicated-body-left">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                            <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                                <h5 class="mb-1">All Ratings and Reviews</h5>
                                <?php foreach ($reviews as $review) { ?>
                                    <div class="reviews-members pt-4 pb-4">
                                        <div class="media">
                                            <img alt="Generic placeholder image" src="<?php echo ($review["profile_picture"]) ?>" class="mr-3 rounded-pill">
                                            <div class="media-body">
                                                <div class="reviews-members-header">
                                                    <div class="d-flex justify-content-end">
                                                        <?php for ($i = 0; $i < $review["rating"]; $i++) { ?>

                                                            <i class="fa fa-star"></i>
                                                        <?php } ?>


                                                    </div>
                                                    <h6 class="mb-1"><?php echo ($review["first_name"] . " " . $review["last_name"]) ?></h6>
                                                    <p class="text-gray"><?php
                                                                            $date = date_create($review["date"]);
                                                                            echo date_format($date, "Y/m/d H:i");
                                                                            ?></p>
                                                </div>
                                                <div class="reviews-members-body">
                                                    <p><?php echo ($review["comment"])     ?></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                <?php } ?>

                            </div>
                            <div class="bg-white rounded shadow-sm p-4 mb-5 rating-review-select-page">
                                <h5 class="mb-4">Leave Comment</h5>
                                <p class="mb-2">Rate the Place</p>
                                <!-- <div class="mb-4">
                                    <span class="star-rating">
                                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                                        <a href="#"><i class="icofont-ui-rating icofont-2x"></i></a>
                                    </span>
                                </div> -->
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Your Rating</label>
                                        <div id="star-input-container" class="d-flex justify-content-end">
                                            <i id="1" class="fa fa-star star-input" style="color: gray;"></i>
                                            <i id="2" class="fa fa-star star-input" style="color: gray;"></i>
                                            <i id="3" class="fa fa-star star-input" style="color: gray;"></i>
                                            <i id="4" class="fa fa-star star-input" style="color: gray;"></i>
                                            <i id="5" class="fa fa-star star-input" style="color: gray;"></i>
                                        </div>
                                        <input type="number" id="star-input" value="0" hidden name="rating" />
                                    </div>
                                    <div class="form-group">
                                        <label>Your Comment</label>
                                        <input type="text" class="form-control m-1" name="comment">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm" type="submit"> Submit Comment </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php Footer(); ?>
    <script>
        let stars = document.querySelectorAll(".star-input");
        let star_input = document.getElementById("star-input")
        for (let i = 0; i < 5; i++) {
            stars[i].addEventListener("click", function() {
                for (let j = 0; j < 5; j++) {
                    if (j <= i) {
                        stars[j].style.color = "yellow"
                    } else {
                        stars[j].style.color = "grey"
                    }

                }
                star_input.value = i + 1

            })
        }
    </script>
    <script src="./assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-V2mUqGXqcqD0M/zFfjtXHzNYZfHjfv8Lz+dl7D7qI5jqU2wE+r3Etq2rL9gxqnSk" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZqJl0JlDAdQv6dh/E5c5Oh9F0F5f5UUC" crossorigin="anonymous"></script>
    <script src='assets/js/common.js'></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>