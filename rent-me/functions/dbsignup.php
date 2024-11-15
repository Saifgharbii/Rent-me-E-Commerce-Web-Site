<?php
require('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $birthday = $_POST['birthday'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $profilePicture = ''; 
    if (isset($_FILES['profile_picture'])) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; 

        if (in_array($_FILES['profile_picture']['type'], $allowedTypes)) {
            $profilePicture = addslashes(file_get_contents($_FILES['profile_picture']['tmp_name'])); 
        } else {
            $errors[] = "Invalid image file type. Allowed types: JPEG, PNG, GIF.";
        }
    }
    $query = "INSERT INTO renter (first_name, last_name, password, birthday, phone_number, email, location, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssb", $first_name, $last_name, $password, $birthday, $phone_number, $email, $location, $profilePicture);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location:..\login.php ");
    exit();
}