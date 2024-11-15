<?php
require("./common.php");
?>
<?php
require("./functions/connexion.php");
if (isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}
$articles_per_page = 6;


$url = $_SERVER['REQUEST_URI'];
// var_dump($url);

$query = "SELECT articles.*, category.type 
FROM articles 
INNER JOIN category 
ON articles.category_id = category.id ";

if (isset($_GET["search"])) {
  $search = strtolower($_GET["search"]);
} else {
  $search = "";
}

$query_constraints = " WHERE ( LOWER( title ) like '%$search%'  OR LOWER( description ) like '%$search%' ) ";

$c = 0;
foreach ($_GET as $key => $value) {
  if (strpos($key, "category_") !== false) {
    if ($c == 0) {
      $query_constraints .= " AND ( ";
    } else {
      $query_constraints .= " OR ";
    }
    $category_id = substr($key, 9);
    // var_dump($category_id);
    $query_constraints .= " category_id = $category_id ";
    $c += 1;
  }
}
if (!$c == 0) {
  $query_constraints .= " ) ";
}

$query .= $query_constraints;


if (isset($_GET["sort"])) {
  $sort = $_GET["sort"];
  $query .= " ORDER BY $sort ";
}





$offset = $articles_per_page * ($page - 1);
$query .= " LIMIT $articles_per_page OFFSET $offset ;";


$result = mysqli_query($conn, $query);
$articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result = mysqli_query($conn, "SELECT * FROM category ");
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($categories);

$query = "SELECT count(*) as count FROM articles " . $query_constraints;
$result = mysqli_query($conn, $query);
$number_of_articles = mysqli_fetch_assoc($result)["count"];
$number_of_pages = ceil($number_of_articles / $articles_per_page);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="./assets/logo.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Articles</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/articles.css" />
  <link rel="stylesheet" href="assets/css/common.css" />
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
    <?php Navbar() ?>
  </header>
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Articles</span>
          <h3>Articles</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="section articles">

    <div class="container">
      <form method="GET">
        <ul class="articles-filter">
          <?php foreach ($categories as $category) { ?>
            <li>
              <span href="" class="filter category_button <?php echo (isset($_GET["category_" . $category['id']]) ? " blur " : " ") ?>" id="category_<?php echo ($category['id']) ?>"><?php echo ($category['type']) ?>
                <input type="checkbox" name="category_<?php echo ($category['id']) ?>" id="input_category_<?php echo ($category['id']) ?>" <?php echo (isset($_GET["category_" . $category['id']]) ? " checked " : " ") ?> hidden />
              </span>
            </li>
          <?php } ?>

        </ul>
        <div class="sel">
          <div class="pre-search-input-box d-sm-b flx-dir-lg-c flx-ai-lg-fe d-lg-flx flx-gro-sm-1 flx-gro-lg-0 d-flex justify-content-center" type="search">
            <button class="pre-search-btn ripple" data-var="vsButton" aria-label="Ouvrir la recherche modale" data-search-closed-label="Rechercher" data-search-open-label="Ouvrir la recherche modale">
              <svg aria-hidden="true" class="pre-nav-design-icon" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
                <path stroke="currentColor" stroke-width="1.5" d="M13.962 16.296a6.716 6.716 0 01-3.462.954 6.728 6.728 0 01-4.773-1.977A6.728 6.728 0 013.75 10.5c0-1.864.755-3.551 1.977-4.773A6.728 6.728 0 0110.5 3.75c1.864 0 3.551.755 4.773 1.977A6.728 6.728 0 0117.25 10.5a6.726 6.726 0 01-.921 3.407c-.517.882-.434 1.988.289 2.711l3.853 3.853"></path>
              </svg>
            </button>
            <input value="<?php echo (isset($_GET["search"]) ? $_GET["search"] : '') ?>" type="text" id="VisualSearchInput" class="pre-search-input headline-5" name="search" autocomplete="off" data-var="vsInput" tabindex="0" placeholder="Rechercher" aria-label="Rechercher des produits" role="combobox" aria-controls="VisualSearchSuggestionsList" aria-owns="VisualSearchSuggestionsList" aria-expanded="false">
          </div>
          <div class="toolbar-sorter sorter">
            <div>
              <label class="sorter-label" for="sorter">Sort By:</label>
              <select id="sorter" data-role="sorter" class="sorter-options" name="sort">
                <option value="price" <?php echo ((isset($_GET["sort"]) && $_GET["sort"] == "price") ? 'selected' : '') ?>>Price</option>
                <option value="title" <?php echo ((isset($_GET["sort"]) && $_GET["sort"] == "title") ? 'selected' : '') ?>>Alphabetical order</option>
              </select>
              <button class="mx-5 btn btn-warning" type="submit">Filter</button>
            </div>
          </div>
        </div>
      </form>
      <div class="row articles-box">
        <?php foreach ($articles as $article) { ?>
          <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 str">
            <div class="item">
              <?php $link_article = "single-article.php?article_id=" . $article["id"] ?>
              <a href=<?php echo $link_article ?>><img src=<?php echo $article["article_image_path"] ?>></a>
              <span class="category"><?php echo ($article['type']) ?></span>
              <h6><?php echo ($article['price']) ?> Dt</h6>
              <div class="mt-3">
                <?php for ($i = 0; $i < $article["rating"]; $i++) { ?>
                  <i class="fa fa-star" style="color:#fda300;"></i>
                <?php } ?>
              </div>
              <h4><a href=<?php echo $link_article ?>><?php echo $article["title"] ?></a></h4>
              <p class="mb-3 " style="font-size:17px;font-weight:500; color : #182833; opacity:1; "><?php echo $article["location"] ?></p>
              <ul>
                <p class="mb-0 pb-0"> <?php echo $article["description"] ?> </p>
              </ul>
              <div class="main-button">
                <a href=<?php echo $link_article ?>>Rent</a>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    </div>
    <nav aria-label="Page navigation ">
      <ul class="pagination mb-2 d-flex justify-content-center">
        <li class="page-item">
          <a class="page-link" href="<?php echo ($url . (strpos($url, "?") !== false ? "&" : "?") . 'page=' . ($page <= 1 ? '1' : $page - 1)) ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
          <li class="page-item<?php echo $i == $page ? '-active' : '' ?>">
            <a class="page-link" href="<?php echo ($url . (strpos($url, "?") !== false ? "&" : "?") . 'page=' . $i) ?>" <?php echo ($i) ?>> <?php echo ($i) ?></a>
          </li>
        <?php } ?>
        <li class="page-item">
          <a class="page-link" href="<?php echo ($url . (strpos($url, "?") !== false ? "&" : "?") . 'page=' . ($page == $number_of_pages ? $number_of_pages : $page + 1)) ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <?php Footer(); ?>
  <script src="assets/js/common.js"></script>
  <script>
    let category_buttons = document.querySelectorAll(".category_button");
    for (let i = 0; i < category_buttons.length; i++) {
      category_buttons[i].addEventListener("click", function() {
        let input = document.getElementById("input_category_" + (i + 1));
        input.checked ? input.checked = false : input.checked = true;
        category_buttons[i].classList.toggle("blur")
      })
    }
  </script>
</body>

</html>