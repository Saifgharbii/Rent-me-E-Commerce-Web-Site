<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\login.css">
</head>

<body>
    <div class="container">
        <div class="section1">
            <div class="design">
                <div class="pill-1 rotate-45"></div>
                <div class="pill-2 rotate-45"></div>
                <div class="pill-3 rotate-45"></div>
                <div class="pill-4 rotate-45"></div>
            </div>
        </div>
        <div class="signup">
            <h3 class="title">Sign Up</h3>

            <form id="Form" method="post" action="functions\dbsignup.php" onsubmit="validateForm(event)" enctype="multipart/form-data">
                <div class="section2">
                    <div class="text-input">
                        <i class="ri-user-line"></i>
                        <input id="first_name" name="first_name" required type="text" placeholder="First Name">
                    </div>
                    <div class="text-input">
                        <i class="ri-user-line"></i>
                        <input id="last_name" name="last_name" required type="text" placeholder="Last Name">
                    </div>
                    <div class="text-input">
                        <i class="ri-lock-fill"></i>
                        <input id="password" name="password" required type="password" placeholder="Password">
                    </div>
                    <div class="text-input">
                        <i class="ri-lock-fill"></i>
                        <input id="confirmPassword" required type="password" placeholder="Password Verification">
                    </div>
                    <div class="text-input">
                        <i class="ri-calendar-event-line"></i>
                        <input id="birthday" name="birthday" required type="date">
                    </div>
                    <div class="text-input">
                        <i class="ri-phone-line"></i>
                        <input id="phone_number" name="phone_number" required type="tel" placeholder="Format: 98000111">
                    </div>
                    <div class="text-input">
                        <i class="ri-mail-line"></i>
                        <input id="email" name="email" required type="email" placeholder="rentme@domain.com">
                    </div>
                    <div class="text-input">
                        <i class="ri-map-pin-2-line"></i>
                        <input id="location" name="location" required type="text" placeholder="Location">
                    </div>
                    <div class="picture-input">
                        <i class="ri-image-line"></i>
                        <input id="profile_picture" name="profile_picture" required type="file" accept="image/*" </div>
                    </div>
                    <button type='submit' class="signup-btn">SIGN UP</button>
            </form>
            <div class="create">
                <a id='login' href="login.php">Login To Your Account</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        function validateForm(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                event.preventDefault();
                alert('Passwords do not match!');
            }
        }
    </script>
</body>

</html>