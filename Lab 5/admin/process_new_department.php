<?php
    include("../connection_db.php");
    $sid = strval(rand(10000,99999) );
    $name = $_POST['name'];
    $chair = $_POST['chair'];
    $dean = $_POST['dean'];
    $budget = $_POST['budget'];

    $sql = "INSERT INTO 
                department_tab (dept_id, dept_name, dept_chair, dept_dean, budget  ) 
            VALUES 
                ('$sid', '$name', '$chair', '$dean', '$budget' )";
	$result = $connect->query($sql);
	if ($result == FALSE){
		echo "Error: ".$connect->error;
	}else {
        echo '<script>alert("Successful ")</script>';
        header("Location: admin.php");
	}
?>