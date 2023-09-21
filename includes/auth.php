<?php
session_start();

function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

function requireLogin() {
    if (!isUserLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}
