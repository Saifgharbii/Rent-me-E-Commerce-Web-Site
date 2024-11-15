<?php
require("./common.php");
?>
<?php
require("./functions/connexion.php");
require("./functions/auth.php");
$authToken = getUser($_COOKIE['auth_token']);

$query = "SELECT articles.* from articles  where articles.renter_id=" . $authToken['id'];
$result = mysqli_query($conn, $query);
$userArticles = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" href="./assets/logo.ico">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .dashboard {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 50px;
    }

    .article {
      width: 80%;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .article h2 {
      margin-top: 0;
    }

    .btn {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .btn.add {
      background-color: #28a745;
    }

    .btn.edit {
      background-color: #ffc107;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <link rel="stylesheet" href="assets/css/common.css">

</head>

<body>
  <header>
    <!-- <nav class="nav">a generic navbar and a logo will be here</nav> -->
    <?php Navbar() ?>
  </header>
  <div class="dashboard">
    <?php foreach ($userArticles as $userArticle) {
      $id = $userArticle["id"];
    ?>
      <div class="article">
        <h2><?php echo ($userArticle['title']) ?></h2>
        <p><?php echo ($userArticle['description']) ?></p>
        <a href="./updateArticle.php?article_id=<?php echo $id ?> "><button class="btn btn-success">Edit</button></a>
      </div>
    <?php } ?>
    <a href="createArticle.php"><button class="btn btn-success">Add New Article</button></a>
  </div>
  <?php Footer(); ?>

  <script src="./assets/js/index.js"></script>
</body>

</html>