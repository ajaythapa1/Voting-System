<?php
include("connect.php");

session_start();

$_SESSION['userdata'] = $userdata;
$_SESSION['candidatedata'] = $candidatedata;

?>

<style>
  button {
    background-color: green;
    color: white;
    font-size: 16px;
    font-weight: bold;
    padding: 30px;
    border-radius: 2em;
    cursor: pointer;
    transition: 0.1s ease;
    border-width: 0;
    box-shadow: 1px 5px 0 0 #0e285d;
  }

  button:hover {
    transform: translateY(-4px);
    box-shadow: 1px 9px 0 0 #0e285d;
  }

  button:active {
    transform: translateY(4px);
    box-shadow: 0px 0px 0 0 #0e285d;
  }

  #Group {
    max-width: 400px;
    margin: 0 auto;
    padding: 90px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    text-align: center;
    float: center;
    width: 90%;
  }

  .backbtn {
    padding: 5px;
    border-radius: 5px;
    margin: 15px;
    width: 100px;
    font-size: 15px;
    float: left;
  }

  .backbtn:hover {
    transform: scale(1.1);
  }

  #logoutbtn {
    padding: 5px;
    border-radius: 5px;
    background-color: rgb(51, 255, 0);
    width: 100px;
    font-size: 15px;
    float: right;
  }

  #logoutbtn:hover {
    transform: scale(1.1);
  }
</style>

<a href="../index.html"><button class="backbtn" type="button"><i class="fas fa-arrow-left"></i> Back</button></a><br><br>
<center> <h1>🗳️Result🗳️</h1> </center> <br>
<br>

<div id="Group">
  <?php
  if (isset($_SESSION['candidatedata'])) {
    echo '<center><b style="font-size:25px">Voting Candidate Result</b></center><br><br>';

    foreach ($candidatedata as $candidate) {
      ?>
      <div>
        <br>
        <center><img style="float: right" src="../uploads/<?php echo $candidate['photo'] ?>" height="99" width="99"></center>
        <b style="float: left">Candidate Name: <?php echo $candidate['name'] ?> </b> <br><br>
        <b style="float: left">Total Votes: <?php echo $candidate['votes'] ?></b><br>
      </div>
      <br>
      <hr>
  <?php
    }
  }
  ?>
</div>
