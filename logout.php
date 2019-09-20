<?php
if(isset($_POST['logout-btn'])){
    session_destroy();
    unset($_SESSION['sid']);
    unset($_SESSION['Username']);
    unset($_SESSION['password']);
    header('location: loginform.html');
    exit();
}
?>