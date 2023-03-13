<?php 
$connect = new mysqli("localhost" , "root" , "" , "lms_db");
if ($connect -> connect_erno){
    die("Could not connect: ". $connect -> connect_errnoss);
}

?>
<?php
// $sql1 = "SELECT * FROM book_tab where book_id ='cs123'";
// $result1 = $connect -> query($sql1);
// $row1 = $result1 -> fetch_assoc();

// echo $row1['book_id'] ;
// echo $row1['book_title'];
// echo $row1['price'];
// echo $row1['description'];

?>

<!-- <?php 
// $sql2 = "SELECT * FROM book_tab";
// $result2 = $connect -> query($sql2);

// while($row2 = $result2 -> fetch_assoc()){
//     echo $row2['book_id']."-";
//     echo $row2['book_title']."<br>";
// }
?>-->