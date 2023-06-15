<?php
session_start();
include("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connect, "SELECT * FROM admins WHERE username='$username' AND password='$password' AND role='$role'");

if(mysqli_num_rows($check) > 0) {
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect, "SELECT * FROM admins WHERE role=3");
    $groupesdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupesdata;

    echo '<script>
        window.location = "admin_dashboard.php";
    </script>';
} else {
    echo '<script>
        alert("admin not Found");
        window.location = "admin.html";
    </script>';
}
?>