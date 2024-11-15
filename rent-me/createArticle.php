<?php

$conn = mysqli_connect("localhost", "root", "", "rentme");
if (!$conn) {
    die("no connection");
}
$query = "SELECT * FROM category ";
$result = $conn->query($query);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $location = $_POST["adress"];
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = './assets/images/articles/' . $file_name;

    // Move uploaded file to destination folder
    if (move_uploaded_file($tempname, $folder)) {
        echo "";
    } else {
        echo "Error uploading file.";
    }

    // Construct your query with proper values
    $query = "INSERT INTO articles (title, description, price, article_image_path, renter_id, category_id, location, creation_date) 
    VALUES ('$title', '$description', '$price', '$folder', '1', '$category', '$location', NOW())";

    $result = $conn->query($query);
    if ($result) {
        echo "";
    } else {
        echo "Error creating article.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="assets\css\userinfo.css">
    <link rel="stylesheet" href="assets\css\createArticle.css">


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid  white-bg p-3  ">



        <h1>Post an article :</h1>

        <form action="createArticle.php" class="mt-5 mx-3" method="POST" enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="title" class="text-lg fw-bold form-label">Title :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="description" class="text-lg fw-bold form-label">Description :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="description" name="description" class="form-control" placeholder="Description">
                </div>
            </div>



            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="category" class="text-lg fw-bold form-label">category :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <select name="category" id="category" class="form-control col-5">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo ($category["id"]) ?>"><?php echo ($category["type"]) ?></option>

                        <?php } ?>
                        <!-- <option value="automobile">automobile</option>
                        <option value="housing">housing</option>
                        <option value="multimedia">multimedia</option>
                        <option value="multimedia">multimedia</option>
                        <option value="clothing">clothing</option>
                        <option value="other">other</option> -->
                    </select>
                </div>
            </div>


            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="price" class="text-lg fw-bold form-label">Price :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="price" name="price" class="form-control" placeholder="100 DT">
                </div>
            </div>





            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="adress" class="text-lg fw-bold form-label">Adress :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="adress" name="adress" class="form-control" placeholder="adress">
                </div>
            </div>



            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="image" class="text-lg fw-bold form-label">Select image(s):</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="file" class="form-control-file col-5" id="image" name="image">
                </div>
            </div>



            <input type="submit" value="Submit" class="mx-auto btn btn-primary mt-5  ">



        </form>


    </div>




    <!-- Bootstrap JS and dependencies CDN (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>