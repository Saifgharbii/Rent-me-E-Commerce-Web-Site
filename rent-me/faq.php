<?php
require("./common.php");
require('functions/connexion.php');
require_once('functions/auth.php');
$user = getUser($_COOKIE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/logo.ico">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/common.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>
        <nav class='navbar navbar-expand-lg navbar-light '>
            <div class='container-fluid'>
                <a class='navbar-brand navbar-logo' href='./index.php'>RentMe.</a>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                        <li class='nav-item'>
                            <a class='nav-link ' aria-current='page' href='./index.php'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link ' href='./articles.php' tabindex='-1'>Articles</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./contact.php'>Contact</a>
                        </li>


                    </ul>
                </div>
                <div class='d-flex'>
                    <?php if (!isset($user)) {
                        echo "<button class='btn btn-outline-success navbar-button' type='submit'>
                        <a class='nav-link' href='./login.php'>Login</a>
                    </button>";
                    } else {
                        echo "<button class='btn btn-outline-success navbar-button' type='submit'>
                            <a class='nav-link' href='./userinfo.php'>My profile </a>
                        </button>";
                    }

                    echo " <div style='margin-left: 5px;'></div>
                      <span onclick='toggleNav()'><button class='btn btn-outline-success navbar-button' type='submit'>Menu</button></span>
                  </div>
                  <div id='mySidenav' class='sidenav'>
                      <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
                      <a href='./index.php'>Home</a>
                      <a href='./articles.php'>Articles</a>
                      <a href='./contact.php'>Contact</a>
                  </div>
               
          </div>
      </nav>"; ?>
    </header>

    <div class="" id="basicAccordion" style="width:90vw !important;">
        <div class="w-100 my-5 mx-5">
            <section>
                <h3 class="text-center mb-4 pb-2 text-success fw-bold">FAQ</h3>
                <p class="text-center mb-5">
                    Find the answers for the most frequently asked questions below
                </p>

                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="far fa-paper-plane text-success pe-2"></i> How do I post an article for rent?</h6>
                        <p>
                            To post an article for rent, you need to first create an account on RentMe. Once logged in, navigate to the "Post an Article" page and fill out the required details such as title, description, category, price, and upload relevant images. Finally, submit the form to post your article for rent.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="fas fa-pen-alt text-success pe-2"></i> Can I edit or update my posted articles?</h6>

                        <p>
                            Yes, you can edit or update your posted articles at any time. Simply log in to your RentMe account, go to the "My Articles" section, find the article you wish to edit, and click on the "Edit" button. Make the necessary changes and save them to update your article.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="fas fa-user text-success pe-2"></i> How does the renting process work on RentMe?</h6>
                        <p>
                            Renting an item on RentMe is simple. Once you find an item you're interested in, you can contact the owner directly through the platform to discuss rental terms, availability, and any other details. Once both parties agree, you can proceed with the rental transaction.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="fas fa-rocket text-success pe-2"></i> What happens if there's an issue with the rented item?</h6>
                        <p>
                            RentMe encourages users to communicate openly and resolve any issues amicably. If there's an issue with the rented item, we recommend contacting the owner first to discuss possible solutions. If the issue cannot be resolved, you can reach out to RentMe support for assistance.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="fas fa-home text-success pe-2"></i> Is my personal information secure on RentMe?</h6>
                        <p>
                            Yes, RentMe takes the privacy and security of user information seriously. We employ industry-standard security measures to protect your personal information and ensure that it remains confidential.
                        </p>
                    </div>

                    <div class="col-md-6 col-lg-4 mb-4">
                        <h6 class="mb-3 text-success"><i class="fas fa-book-open text-success pe-2"></i> How do I delete my RentMe account?</h6>
                        <p>
                            If you no longer wish to use RentMe and want to delete your account, you can do so by logging in, navigating to your account settings, and selecting the option to delete your account. Please note that deleting your account will permanently remove all your data from RentMe, including your posted articles and rental history.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <?php Footer(); ?>
    <script src='assets/js/common.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>