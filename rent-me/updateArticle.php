<?php

require("./functions/connexion.php");

$query = "SELECT * from articles  where id=" . $_GET["article_id"];
$result = mysqli_query($conn, $query);
$article = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article</title>
    <link rel="stylesheet" href="assets/css/userinfo.css">
    <link rel="stylesheet" href="assets/css/createArticle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid white-bg p-3">
        <h1>Update Article</h1>
        <form action="" class="mt-5 mx-3" method="post">
            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="title" class="text-lg fw-bold form-label">Title :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="title" name="title" class="form-control" value="<?php echo htmlspecialchars($article['title']); ?>" placeholder="Title">
                </div>
            </div>
            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="description" class="text-lg fw-bold form-label">Description :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="description" name="description" class="form-control" value="<?php echo htmlspecialchars($article['description']); ?>" placeholder="Description">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="category" class="text-lg fw-bold form-label">Category :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <select name="category" id="category" class="form-control col-5">
                        <option value="1" <?php if ($article['category_id'] == 1) echo 'selected'; ?>>automobile</option>
                        <option value="2" <?php if ($article['category_id'] == 2) echo 'selected'; ?>>housing</option>
                        <option value="3" <?php if ($article['category_id'] == 3) echo 'selected'; ?>>multimedia</option>
                        <option value="4" <?php if ($article['category_id'] == 4) echo 'selected'; ?>>clothing</option>
                        <option value="5" <?php if ($article['category_id'] == 5) echo 'selected'; ?>>other</option>

                    </select>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="price" class="text-lg fw-bold form-label">Price :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="price" name="price" class="form-control" value="<?php echo htmlspecialchars($article['price']); ?>" placeholder="100 DT">
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12 col-md-4 col-lg-3">
                    <label for="address" class="text-lg fw-bold form-label">Address :</label>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($article['location']); ?>" placeholder="Address">
                </div>
            </div>

            <!-- Include file input for image selection here if needed -->

            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies CDN (Popper.js and jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>