<?php
 $connect = mysqli_connect("localhost","root","","voting") or
 die("connection Failed");

 if($connect){
    echo "Connected Successfully!!";
 }
 else
  echo "Not connected. Please try again";
?>