<?php
// import at the beginning of the page 
// <link rel='stylesheet' href='assets/css/common.css'>
// import at the end of the page   
// <script src='assets/js/common.js'></script>
// import bootstrap

function Navbar()
{
    require('functions/connexion.php');
    require_once('functions/auth.php');
    $user = getUser($_COOKIE);
    echo "<nav class='navbar navbar-expand-lg navbar-light '>
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
                <div class='d-flex'>";



    if (!isset($user)) {
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
      </nav>";
}

function footer()
{
    echo " <footer class='footer'>
  <div class='container' style='background-color: #182833 !important;'>
      <div class='row align-items-center justify-content-center'>
          <div style='width:90%;'class='col-md-6'>
              <ul class='footer-nav nav justify-content-center border-bottom pb-3 mb-3'>
                  <li class='nav-item'><a href='index.php' class='nav-link px-2'>Home</a></li>
                  <li class='nav-item'><a href='articles.php' class='nav-link px-2'>Articles</a></li>
                  <li class='nav-item'><a href='./faq.php' class='nav-link px-2'>FAQs</a></li>
                  <li class='nav-item'><a href='./contact.php' class='nav-link px-2'>Contact</a></li>
              </ul>
              <div  style='width:90%;'class='contsmall'>
                <div style='width:50%;float:left;' class='contleft1'>
                   <span style='color : #ffc619 !important;' class='text-muted d-block'>&copy; 2022 Company, Inc</span>
                </div>   
                <div style='width:50%;float:right;' class='col-md-6 text-md-end'>
                    <p style='color : #ffc619;'class='mb-0 me-3'>Contact Us</p>
                    <div class='social-icons'>
                          <a target='_blank' href='https://www.facebook.com/mohamedali.ragoubi.5'><i class='bx bxl-facebook bx-md'></i></a>
                          <a href='#'><i class='bx bxl-instagram bx-md'></i></a>
                          <a href='#'><i class='bx bxl-twitter bx-md'></i></a>
                    </div>
                </div>
               </div>
          </div>
      </div>
    </div>

   
  </footer>";
}
