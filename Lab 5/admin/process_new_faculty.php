<?php
    include("../connection_db.php");
    $sid = strval(rand(10000,99999) );
    $name = $_POST['faculty_name'];
    $qua = $_POST['qualification'];
    $dept = $_POST['department'];
    $joined = $_POST['joined'];
    $img = $_POST['img'];
    $img2 = $img.str_replace(" ","_",strtolower($name));

    $sql = "INSERT INTO 
                faculty_tab (fac_id, fac_name, fac_doj, qualification, department , image ) 
            VALUES 
                ('$sid', '$name', '$joined', '$qua', '$dept', '$img' )";
	$result = $connect->query($sql);
	if ($result == FALSE){
		echo "Error: ".$connect->error;
	}else {
        echo '<script>alert("Successful ")</script>';
        header("Location: admin.php");
	}
?>