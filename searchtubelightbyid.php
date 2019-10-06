<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "iottest";

    // get id to delete
    $Lid = $_POST['lid'];

    if(isset($_POST['button1']))
    {
      echo shell_exec('python manualOnOff.py ON '.$Lid);
    }
    else
    {
      echo shell_exec('python manualOnOff.py OFF '.$Lid);
    }
    header("Location: PowerController.html");
?>
