<?php
require('connexion.php');
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT id, password FROM renter WHERE email = ?";

$stmt = $conn->prepare($query);
$stmt->execute([$email]);
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $token = bin2hex(random_bytes(32)); 
    $query = "UPDATE renter SET token = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$token, $user['id']]);

    setcookie('auth_token', $token, time() + (86400*30), '/', '', true, true); 

    header("Location:..\userinfo.php");
    exit();
} else {
    echo "Invalid email or password.";
}

