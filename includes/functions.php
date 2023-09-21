<?php
include 'db.php';

function createRole($name) {
    global $conn;
    $sql = "INSERT INTO roles (name) VALUES ('$name')";
    return mysqli_query($conn, $sql);
}

function createPermission($name) {
    global $conn;
    $sql = "INSERT INTO permissions (name) VALUES ('$name')";
    return mysqli_query($conn, $sql);
}

function assignPermissionToRole($roleId, $permissionId) {
    global $conn;
    $sql = "INSERT INTO role_permissions (role_id, permission_id) VALUES ('$roleId', '$permissionId')";
    return mysqli_query($conn, $sql);
}

function getUserRole($userId) {
    global $conn;
    $sql = "SELECT role_id FROM users WHERE id = '$userId'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['role_id'];
}

function hasPermission($userId, $permissionName) {
    $userRole = getUserRole($userId);
    
    global $conn;
    $sql = "SELECT * FROM role_permissions rp
            JOIN permissions p ON rp.permission_id = p.id
            WHERE rp.role_id = '$userRole' AND p.name = '$permissionName'";
    
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result) > 0;
}
?>
