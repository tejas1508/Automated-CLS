<?php
$Lid = $_POST['Lid'];
$Tubetype = $_POST['Tubetype'];
$brand= $_POST['brand'];
$watts = $_POST['watts'];
$lumens = $_POST['lumens'];
$Expirydate = $_POST['Expirydate'];
$lifespan = $_POST['lifespan'];
$warranty = $_POST['warranty'];

if (!empty($Lid) || !empty($Tubetype) ||!empty($brand) || !empty($watts) ||!empty($lumens) || !empty($Expirydate) ||!empty($lifespan) || !empty($warranty)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "acls";

    $conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('. mysql_connect_error().')'. mysqli_connect_error());
    }else {

        // $password=password_hash($password,PASSWORD_DEFAULT);
        // $token = bin2hex(random_bytes(50));
        
        $SELECT = "SELECT Lid From tubelightinfo Where Lid = ? Limit 1";
        $INSERT = "INSERT Into tubelightinfo (Lid,Tubetype,brand,watts,Lumens,Expirydate,lifespan,warranty) values(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('i',$L_id);
        $stmt->execute();
        $stmt->bind_result($L_id);
        $stmt->store_result();
        $rnum =$stmt->num_rows;
        if ($rnum==0) {
            $stmt->close();
            $stmt =$conn->prepare($INSERT);
            $stmt->bind_param("issiisii",$Lid,$Tubetype,$brand,$watts,$lumens,$Expirydate,$lifespan,$warranty);
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
?>