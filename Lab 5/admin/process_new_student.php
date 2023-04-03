<?php
    include("../connection_db.php");
    $sid = rand(10000,99999);
    $gpa = floatval($_POST['gpa']);
    $name = $_POST['student_name'];
    $major = $_POST['major'];
    $enroll = $_POST['enrollment'];
    $grad = $_POST['graduation'];
    echo $sid."<br>";
    echo $gpa."<br>";
    echo $name."<br>";
    echo $major."<br>";
    echo $enroll."<br>";
    echo $grad."<br>";


    $sql = "INSERT INTO 
                student_tab (sid, stu_name, year_of_enrollment, stu_major, cgpa , year_of_graduation ) 
            VALUES 
                ('$sid', '$name', '$enroll', '$major', '$gpa', '$grad' )";
	$result = $connect->query($sql);
	if ($result == FALSE){
		echo "Error: ".$connect->error;
	}else {
        echo '<script>alert("Successful ")</script>';
        header("Location: admin.php");
	}
?>