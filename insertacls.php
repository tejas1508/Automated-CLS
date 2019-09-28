<?php
$name = $_POST['name'];
$Username = $_POST['Username'];
$password = $_POST['password'];
$post = $_POST['post'];
$joindate = $_POST['joindate'];
$mobno = $_POST['mobno'];
$email = $_POST['email'];
$address = $_POST['address'];
$gender = $_POST['gender'];

if (!empty($name) || !empty($Username) ||!empty($password) || !empty($post) ||!empty($joindate) || !empty($mobno) ||!empty($email) || !empty($address) ||!empty($gender)){
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
        
        $SELECT = "SELECT email From registrationform Where email = ? Limit 1";
        $INSERT = "INSERT Into registrationform (name,Username,password,post,joindate,mobno,email,address,gender) values(?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum =$stmt->num_rows;

        // $password=password_hash($password,PASSWORD_DEFAULT);
        // $token = bin2hex(random_bytes(50));

        if ($rnum==0) {
            $stmt->close();
            $stmt =$conn->prepare($INSERT);
            $stmt->bind_param("sssssisss",$name,$Username,$password,$post,$joindate,$mobno,$email,$address,$gender);
            $stmt->execute();
            echo "New Record Inserted Successfully";

        } else {
            echo " Someone Already register using this email";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "All fields Required";
    die();
}
?>