<?php
    function reviews($dept){
        require 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die($conn->connect_error);
	$q = "select * from department, class, review,professor where department.department_id=class.department_id and department.department_id=review.department_id and department.department_id=professor.department_id and class.class_id=review.class_id and professor.professor_id=class.professor_id and professor.professor_id=review.professor_id and department.department='".$dept."'";
        $result = $conn->query($q);
	if(!$result) echo "failed";
        for($i=0;$i<$result->num_rows;++$i){
            $result->data_seek($i);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            echo "<article><h2>".$dept." ".$row['classNumber']."<br>".$row['className']." taught by Professor ".$row['lname']."</h2><br><p>".$row['review']."</p></article>";
        }
    }
    
    function forum(){
        require 'login.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if($conn->connect_error) die($conn->connect_error);
        $result = $conn->query("select * from department, login, forum ".
		"where department.department_id=forum.department_id ".
		"and login.user_id=forum.user_id");
	if(!$result) echo "failed";
        for($i=0;$i<$result->num_rows;++$i){
            $result->data_seek($i);
            $row=$result->fetch_array(MYSQLI_ASSOC);
            echo "<p><b>".$row['fname']." on ".$row['department']." at ".$row['T'].":</b><br>".$row['message']."</p>";
        }
    }
?>
