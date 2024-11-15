<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./assets/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\login.css">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <div class="login">
            <h3 class="title">User Login</h3>
            <form id="Form" method="post" action="functions\dblogin.php">
                <div class="text-input">
                    <i class="ri-mail-line"></i>
                    <input name="email" required type="text" placeholder="Email">
                </div>
                <div class="text-input">
                    <i class="ri-lock-fill"></i>
                    <input name="password" required type="password" placeholder="Password">
                </div>
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
            <a href="#" class="forgot">Forgot Username/Password?</a>
            <div class="create">
                <a id="signup" href="signup.php">Create Your Account</a>
                <i class="ri-arrow-right-fill"></i>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>