<?php
include 'includes/auth.php';
include 'db.php';


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql="INSERT INTO users";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Add your authentication logic here
    // Example: Query the database to check if the user exists and if the password is correct
    // Replace the following with actual database queries and checks
    if (userExists($username) && isPasswordCorrect($username, $password)) {
        // Authentication successful
        $_SESSION['username'] = $username;

        // Get the user's ID and role ID from the database
        $userId = getUserIdByUsername($username);
        $roleId = getRoleIdByUserId($userId);

        // Assign permissions to roles as needed
        assignPermissionToRole($roleId, $permissionId);

        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}

include 'templates/login_form.php';
?>
