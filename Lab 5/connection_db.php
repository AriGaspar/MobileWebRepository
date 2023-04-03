<?php 
$connect = new mysqli("localhost" , "root" , "" , "ems_db");
if ($connect -> connect_erno){
    die("Could not connect: ". $connect -> connect_errnoss);
}
?>