<?php

session_start();
include("connect.php");

$mobile=$_POST['mobile'];
$password=$_POST['password'];
$role=$_POST['Role'];

$check = mysqli_query($connect,"Select * from user where mobile='$mobile' AND password='$password' AND role='$role'");

if($check){
   $userdata = mysqli_fetch_array($check);
   $candidate= mysqli_query($connect,"Select * from user where role=2");
   $candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

   $_SESSION['userdata']=$userdata;
   $_SESSION['candidatedata']=$candidatedata;

   echo '
    <script>
    window.location="../routes/dashboard.php";
    </script>
    ';
}
else{
    echo '
    <script>
    alter "Invalid user!!";
    window.location="../login.html";
    </script>
    ';
}

?>