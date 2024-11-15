<?php

function getUser($token){
    global $conn; 
    if (!isset($_COOKIE['auth_token'])) {
        return null;
    } else {
        $query = "SELECT * FROM renter WHERE token = ? ";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $_COOKIE['auth_token']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        return $user;
    }
}