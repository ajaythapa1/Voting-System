<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$email = $_POST['email'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['Role'];

// Check if email or mobile already exist in the database
$checkQuery = mysqli_query($connect, "SELECT * FROM user WHERE email='$email' OR mobile='$mobile'");
if (mysqli_num_rows($checkQuery) > 0) {
    echo '<script>
    alert("Email or mobile number already exists");
    window.location = "../routes/signup.html";
    </script>';
    exit;
}

if ($password == $cpassword) {
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, email, address, photo, role, status, votes) VALUES ('$name', '$mobile', '$password', '$email', '$address', '$image', '$role', '0', '0')");
    if ($insert) {
        echo '<script>
        alert("Registration Successful");
        window.location = "../login.html";
        </script>';
    } else {
        echo '<script>
        alert("Cannot connect to the database");
        window.location = "../routes/signup.html";
        </script>';
    }
} else {
    echo '<script>
    alert("Password and Confirm password do not match");
    window.location = "../routes/signup.html";
    </script>';
}
?>
