<?php
require("./common.php");
?>
<!-- importation of hot articles and categories -->
<?php
$nbr_de_pub = 3;
$conn = mysqli_connect("localhost", "root", "", "rentme");
if (!$conn) {
    die("no connection");
}
$query_articles = 'select * from articles ' . 'order by rating desc limit ' . $nbr_de_pub . ';';
$query_categories = 'select * from category ;';
$res1 = mysqli_query($conn, $query_articles);
$res2 = mysqli_query($conn, $query_categories);
$hot_articles = mysqli_fetch_all($res1, MYSQLI_ASSOC);
$categories = mysqli_fetch_all($res2, MYSQLI_ASSOC);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rent ME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/articles.css  ">
    <link rel="stylesheet" href="assets/css/common.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="myProjects/webProject/icofont/css/icofont.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />

</head>

<body>
    <header>
        <!-- <nav class="nav">a generic navbar and a logo will be here</nav> -->
        <?php Navbar() ?>
    </header>
    <main>

        <section class="hero-content jumbotron text-center homePage ">

            <div class="container">
                <div class="row align-items-center justify-content-center my-5">
                    <img src="./assets/images/logo.png" alt="rentMeLogo" class="column col-2 " style="border-radius: 100px;">
                    <h1 class="column col-12 col-sm-7    col-md-7 col-lg-4    text-center display-6 toColor ">Welcome to Rent Me</h1>
                </div>
            </div>
            <p class="lead toColor">Where you can find the perfect items for your short-term needs. Renting made easy!</p>



            <div class="container-fluid">
                <div class="input-group mb-3 center mx-auto" style="width:50vw">
                    <input id="main-search" type=" text" class="form-control orange-search-bar" placeholder="Search for items to rent" aria-label="Search" aria-describedby="basic-addon2">
                    <button type="button" class="btn btn-outline-warning " data-mdb-ripple-init onClick="redirect()">search</button>
                    <script>
                        function redirect() {
                            let value = document.getElementById("main-search").value;
                            window.location.href = "./articles.php?search=" + value
                        }
                    </script>

                </div>
            </div>





        </section>




        <!------------hot items now--------------->

        <section class="hot-items ">
            <h2 class="  text-center my-5 ">HOT ARTICLES </h2>
            <div class="section articles">
                <div class="container">
                    <div class="row articles-box">


                        <?php foreach ($hot_articles as $hot_article) { ?>
                            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 str">
                                <div class="item">
                                    <?php $link_article = "single-article.php?article_id=" . $hot_article["id"] ?>
                                    <a href=<?php echo $link_article ?>><img src=<?php echo $hot_article["article_image_path"] ?>></a>
                                    <?php $id_category = $hot_article["category_id"];
                                    $type_categorie = "";
                                    foreach ($categories as $categorie) {
                                        if ($categorie["id"] == $id_category) {
                                            $type_categorie = $categorie["type"];
                                        }
                                    }
                                    ?>

                                    <?php $link_article = "single-article.php?article_id=" . $hot_article["id"] ?>
                                    <span class="category"><a href="categorie.php"></a><?php echo $type_categorie ?></span>
                                    <h6><?php echo $hot_article["price"] ?> DT</h6>
                                    <div class="mt-3">
                                        <?php for ($i = 0; $i < $hot_article["rating"]; $i++) { ?>
                                            <i class="fa fa-star" style="color:#fda300;"></i>
                                        <?php } ?>
                                    </div>
                                    <h4><a href=<?php echo $link_article ?>><?php echo $hot_article["title"] ?></a></h4>
                                    <p class="mb-3 " style="font-size:17px;font-weight:500; color : #182833; opacity:1; "><?php echo $hot_article["location"] ?></p>
                                    <ul>
                                        <p class="mb-0 pb-0"> <?php echo $hot_article["description"] ?> </p>
                                    </ul>
                                    <div class="main-button">

                                        <a href=<?php echo $link_article ?>>Rent</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>



        </section>
    </main>
    <?php Footer(); ?>
    <script src='assets/js/common.js'></script>
    <script src="./assets/js/index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-V2mUqGXqcqD0M/zFfjtXHzNYZfHjfv8Lz+dl7D7qI5jqU2wE+r3Etq2rL9gxqnSk" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyZqJl0JlDAdQv6dh/E5c5Oh9F0F5f5UUC" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>

</html>