<?php
include 'includes/auth.php';
requireLogin();
include 'includes/auth_functions.php'; // Include the auth functions

// Get the user's ID
$userId = $_GET['id'];

if (hasPermission($userId, 'edit_post')) {
    // Allow the user to edit a post
    // Your edit post logic here
} else {
    // Display an error or deny access
    echo "You do not have permission to edit posts.";
}
include 'templates/dashboard.php';
?>
  