<?php
  session_start();
  if(isset($_POST['AUTO_ON'])){
    echo shell_exec('python automated.py OFF');
    header("Location: floorMap.php");
  }
  else{
    if(isset($_POST['button1on'])){
      $Lid = 1;
      echo shell_exec('python manualOnOff.py ON '.$Lid);
    }
    else if(isset($_POST['button1off'])){
      $Lid = 1;
      echo shell_exec('python manualOnOff.py OFF '.$Lid);
    }
    else if(isset($_POST['button2on'])){
      $Lid = 2;
      echo shell_exec('python manualOnOff.py ON '.$Lid);
    }
    else if(isset($_POST['button2off'])){
      $Lid = 2;
      echo shell_exec('python manualOnOff.py OFF '.$Lid);
    }
    header("Location: floorMap.php");
  }

  $myfile = fopen("status.txt", "r") or die("Unable to open file!");
  $val = fgets($myfile);
  echo $val;
  if($val == '1_HIGH'){
    $_SESSION['status1'] = "green";
  }
  else if($val == '1_LOW'){
    $_SESSION['status1'] = "red";
  }

  if($val == '2_HIGH'){
    $_SESSION['status2'] = "green";
  }
  else if($val == '2_LOW'){
    $_SESSION['status2'] = "red";
  }
?>
