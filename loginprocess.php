<?php
    if (isset($_POST['login-btn'])){
    $Username = $_POST['Username'];
    $password = $_POST['password'];
    
    if (empty($Username)){
        echo "Username required";
    }
    if (empty($password)){
        echo "Password required";
    }
    if (empty($Username) and empty($password)){
        echo "Username and password required";
    }
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "acls";

    $conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error('. mysql_connect_error().')'. mysqli_connect_error());
    }
    $sql = "SELECT * FROM registrationform WHERE Username=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $result=$stmt->get_result();
    $user=$result->fetch_assoc();
    $password1=$user['password'];
    // echo "password:" . $password1."<br>";
    // echo "password:" . $password."<br>";
    if ($password==$password1) {
        $_SESSION['sid']=$user['sid'];
        $_SESSION['Username']=$user['Username'];
        $_SESSION['password']=$user['password'];
        echo "You are loged in!";
        header('location:UserDashboard.html');
        exit();
        
    }else {
        echo "Wrong credentials";
    }
}
else{
    echo "Please Login Correctly!!";
} 

?>