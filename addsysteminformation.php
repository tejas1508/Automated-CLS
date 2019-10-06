<?php
$Lid = $_POST['Lid'];
$L_type = $_POST['L_type'];
$L_brand= $_POST['L_brand'];
$L_watts = $_POST['L_watts'];
$L_lumens = $_POST['L_lumens'];
$L_Expirydate = $_POST['L_Expirydate'];
$L_lifespan = $_POST['L_lifespan'];
$L_warranty = $_POST['L_warranty'];

if (!empty($Lid) || !empty($L_type) ||!empty($L_brand) || !empty($L_watts) ||!empty($L_lumens) || !empty($L_Expirydate) ||!empty($L_lifespan) || !empty($L_warranty)){
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

        $SELECT = "SELECT Lid From tubelightinfo Where Lid = ? Limit 1";
        $INSERT = "INSERT Into tubelightinfo (Lid,L_type,L_brand,L_watts,L_lumens,L_Expirydate,L_lifespan,L_warranty) values(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('i',$Lid);
        $stmt->execute();
        $stmt->bind_result($Lid);
        $stmt->store_result();
        $rnum =$stmt->num_rows;
        if ($rnum==0) {
            $stmt->close();
            $stmt =$conn->prepare($INSERT);
            $stmt->bind_param("issiisii",$Lid,$L_type,$L_brand,$L_watts,$L_lumens,$L_Expirydate,$L_lifespan,$L_warranty);
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
