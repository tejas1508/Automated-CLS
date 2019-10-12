<?php
$C_id = $_POST['C_id'];
$starttime = $_POST['starttime'];
$stoptime= $_POST['stoptime'];


if (!empty($C_id) || !empty($starttime) ||!empty($stoptime)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "iottest";

    $conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('. mysql_connect_error().')'. mysqli_connect_error());
    }else {

        // $password=password_hash($password,PASSWORD_DEFAULT);
        // $token = bin2hex(random_bytes(50));

        $SELECT = "SELECT C_id From control_info Where C_id = ? Limit 1";
        $INSERT = "INSERT Into control_info (C_id,starttime,stoptime) values(?,?,?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('i',$C_id);
        $stmt->execute();
        $stmt->bind_result($C_id);
        $stmt->store_result();
        $rnum =$stmt->num_rows;
        if ($rnum==0) {
            $stmt->close();
            $stmt =$conn->prepare($INSERT);
            $stmt->bind_param("iss",$C_id,$starttime,$stoptime);
            $stmt->execute();
            echo "New Record Inserted Successfully";
            header('location:PowerController.html');
            exit();
        } else {
            echo "Record already Exists";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields Required";
    die();
}

if(isset($_POST['Submit'])){
  echo shell_exec('python automated.py OFF');
}

header("Location: PowerController.html");

?>
