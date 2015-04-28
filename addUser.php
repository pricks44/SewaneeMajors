<?php
    //Connect to mysql
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error) die("THIS DIDNT WORK");

  //Checks if the columns have information in them

  if (isset($_POST['email'])    &&
      isset($_POST['password'])    &&
      isset($_POST['fname'])      &&
      isset($_POST['lname']))

{

    //Sends the query to add information into the columns
    $salt1     = "8709raa";
    $salt2     = "1234paul";
    $email     = get_post($conn, 'fname');
    $password  = get_post($conn, 'password');
    $fname     = get_post($conn, 'fname');
    $lname     = get_post($conn, 'lname');
    $token     = hash('ripemd128',"$salt1$password$salt2");
    $query     = "INSERT INTO login(email,password,fname,lname) VALUES('$email','$token','$fname','$lname')";
    $result    = $conn->query($query);
    if(!$result) echo "INSERT failed: $query<br>".$conn->error."<br><br>";

}

   $result1->close();
   $conn->close();

   function get_post($conn, $var)

{

   return $conn->real_escape_string($_POST[$var]);

}

?>
