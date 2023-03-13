<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/myscript.js" ></script>
	<title>Lending Process</title>
</head>
<body>

    <?php 
        include('components/header.html')
    ?>
    <?php 
        include('components/banner.html')
    ?>
	<?php
	$bookid = $_POST['bookid'];
	$userid = $_POST['userid'];
	$datel = $_POST['datelending'];
	$dater = $_POST['datereturn'];
	$status = "LENT";
	$remarks = "";

	$lendingid = rand(1,10000);

	include("connection_db.php");

	// $sql = "INSERT INTO lending_tb (sid, lending_id, book_id, user_id, date_of_lending,date_of_return, status ,remarks) VALUES ( '','2', '2', '2', '2','2','2', '2' )";
	// $sql = "INSERT INTO lending_tb ( lending_id) VALUES ( '121' )";
	$sql = "INSERT INTO lending_tb ( lending_id, book_id, user_id, date_of_lending,date_of_return, status ,remarks) VALUES ( '$lendingid', '$bookid', '$userid', '$datel', '$dater', '$status', '$remarks'  )";
	// $sql = "SELECT * FROM book_tab";
	$result = $connect->query($sql);
	if ($result == FALSE){
		echo "Error: ".$connect->error;
	}else {
		echo "Successful insertion";
	}
	?>
</body>
</html>