<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['email']) && isset($_POST['password'])){
    $usr=mysql_fix($conn,$_POST['usr']);
    $pass=mysql_fix($conn,$_POST['pass']);
    $salt1     = "8709raa";
    $salt2     = "1234paul";
    $token     = hash('ripemd128',"$salt1$pass$salt2");
    $q="select * from login where email='$usr' and password='$token'";
    $result = $conn->query($q);
    if($result) die($conn->error);
    if($result->num_rows==1){
        session_start();
        ini_set('session.gc_maxlifetime',60*24);
        $_SESSION['email']=$usr;
        $_SESSION['password']=$pass;
        echo "<p>Hello $usr</p>;
        die("<p><a href=index.php>Click here to continue</a></p>");
    }
}
die(" Username/Password failure");
?>
