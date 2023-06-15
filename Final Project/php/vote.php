<?php
session_start();
include("connect.php");

$votes=$_POST['gvotes'];
$total_votes=$votes+1;

$gid=$_POST['gid'];
$uid= $_SESSION['userdata']['id'];

  if($_SESSION['userdata']['status']>=1){
    echo '
    <script>
    alert (" You have Already Voted!!");
    window.location= "../routes/Dashboard.php ";
    </script> ';
  }
  else
{
  
  $update_votes= mysqli_query($connect,"UPDATE user SET votes='$total_votes' where id='$gid'");
 $update_user_status = mysqli_query($connect,"UPDATE user SET status=1 where id='$uid' ");


  if($update_votes and $update_user_status){

  $candidate = mysqli_query($connect,"SELECT id,name,votes,photo from user where role=2");
  $candidatedata = mysqli_fetch_all($candidate, MYSQLI_ASSOC);

  $_SESSION['userdata']['status']=1;
  $_SESSION['candidatedata']=$candidatedata;

  
  echo '
  <script>
  window.location= "../routes/votedone.html ";
  </script> ';
}


else{
    echo '
        <script>
        alert ("Some Error occured!! Please try Again");
        window.location= "../routes/Dashboard.php ";
        </script> ';
    
}
}
?>