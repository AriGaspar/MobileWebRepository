<?php
include("connection_db.php");
$username = $_POST['username'];
$password = $_POST['password'];
echo $username.'<br>';
echo $password.'<br>';

$sql = "SELECT * FROM users_tab";
$result = $connect -> query($sql);

while($row = $result -> fetch_assoc()){
    if ($row['userid'] == $username && $row['password'] == $password){
        session_start();
        $_SESSION['id'] = $row['person_id'];
        switch ($row['role']) {
            case 'S':
                header("Location: student/student.php");
                break;
            case 'F':
                header("Location: faculty/faculty.php");
                break;
            case 'A':
                header("Location: admin/admin.php");
                break;
            default:
                break;
        }

        // header("Location: student.php");
        return;
    }
    header("Location: login.php");
}
?>