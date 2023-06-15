<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../login.html");
}

$userdata=$_SESSION['userdata'];
$candidatedata=$_SESSION['candidatedata'];

if($_SESSION['userdata']['status']==0){
    $status='<b style = "color : red"> Not Voted</b>';
}
else{
    $status = ' <b style = "color : green">Voted</b>';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div id="mainSection">
        <center>
        <div id="HeaderSection">
        <a href="logout.php"> <button id="loginbtn">Log out</button></a>
         <h1 style="font-size:40px;">Online Voting System</h1>
        </center>
     </div>
     <hr>
     <div id="pannel">
      <div id="Profile">
        <center><img src="../uploads/<?php echo $userdata['photo']  ?>" width="100px" height="100px"> </center><br><br>
        <b>Name : </b><?php echo $userdata['name']  ?><br><br>
        <b>Mobile : </b><?php echo $userdata['mobile']  ?><br><br>
        <b>Email : </b><?php echo $userdata['email']  ?><br><br>
        <b>Address : </b><?php echo $userdata['address']  ?><br><br>
        <b>Status : </b><?php echo $status  ?><br><br>
    </div>
    <div id="Candidate">
        <?php
        if($_SESSION['candidatedata']){
          for($i=0; $i<count($candidatedata); $i++){
            ?>
            <div>
                <img style="float:right;" src="../uploads/<?php echo $candidatedata[$i]['photo'] ?>" width="150" height="150"><br><br>
               <b>Candidate Name : </b> <?php echo $candidatedata[$i]['name'] ?><br><br>
               <b> Vote : </b> <?php echo $candidatedata[$i]['votes'] ?><br>

               <form action="../php/vote.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="gvotes" value="<?php echo $candidatedata[$i]['votes']?>">
                <input type="hidden" name="gid" value="<?php echo $candidatedata[$i]['id']?>">
                <input type="submit" name="votebtn" value="Vote" id="votebtn">
               </form>
            </div>
            <hr>
            <?php
          }
        }
        else{

        }
        ?>
    </div>
    </div>
</div>
  
</body>
</html>