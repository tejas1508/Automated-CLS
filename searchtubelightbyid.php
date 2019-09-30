<?php
if(isset($_POST['search']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "acls";
    
    // get id to delete
    $Lid = $_POST['Lid'];
    
    // connect to mysql
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql delete query 
    $query = "SELECT Lid FROM `tubelightinfo` WHERE Lid = $Lid";
    
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        echo 'Tube Light ID Found';
    }else{
        echo 'Tube Light ID Not Found';
    }
    mysqli_close($connect);
}

?>