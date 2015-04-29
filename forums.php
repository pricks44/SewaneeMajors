<?php
    post();
    /**
     *Checks to make sure user is logged in.
     *Then takes info from a post form with input values com (comment) and dept (department).  Gets the appropriate ids from database, and then inserts the comment into the forum database.
     */
    function post()
    {
        require_once 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die($conn->connect_error);
        session_start();
        if(isset($_SESSION['usr'])){
            if(isset($_POST['com']) && isset($_POST['dept'])){
                $com=mysql_fix($conn,$_POST['com']);
                $dept=mysql_fix($conn,$_POST['dept']);
                $usr = $_SESSION['usr'];
                $pass = $_SESSION['pass'];
                $salt1     = "8709raa";
                $salt2     = "1234paul";
                $token     = hash('ripemd128',"$salt1$pass$salt2");
                $q = "select user_id from login where email = '$usr' and password = $token";
                $result = $conn->query($q);
                if(!$result) die($conn-error);
                if($result->num_rows==1){
                    $result->data_seek(0);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $id = $row['user_id'];
                    $q = "select department_id from department where department = '$dept'";
                    $result=$conn->query($q);
                    if(!result) die("Department Error");
                    $result->data_seek(0);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $did=$row['department_id'];
                    $q = "insert into forum(user_id, message,department_id) values($id,'$com',$did)";
                    $result=$conn->query($q);
                    if(!result) die("Message Error");
                }
                else die("User Error");
            }
            else die("Please Write Something");
        }
        else die("Please Login");
    }
    
    function mysql_fix($conn, $string)
    {
        $string = stripslashes($string);
        $string = strip_tags($string);
        return htmlentities($conn->real_escape_string($string));
    }
?>
