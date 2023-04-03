
<?php 
    include('../connection_db.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin mode</title>
    <link rel="stylesheet" href="../css/headers.css">
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="../js/admin.js"></script>

</head>
<body>
  <div class="header sticky-top">
      <div><a href="" class="logo"> EMS </a></div>
  </div>

  <div class="card text-center">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs justify-content-center">
            <li class="nav-item cursorPointer">
              <a id="student_tab" class="nav-link active" onclick="change_tab1('s')">Student</a>
            </li>
            <li class="nav-item cursorPointer">
              <a id="faculty_tab" class="nav-link" onclick="change_tab1('f')">Faculty</a>
            </li>
            <li class="nav-item cursorPointer">
                <a id="add_student_tab" class="nav-link"  onclick="change_tab1('as')">Add Student</a>
            </li>
            <li class="nav-item cursorPointer">
                <a id="add_faculty_tab" class="nav-link" onclick="change_tab1('af')">Add Faculty</a>
            </li>
            <li class="nav-item cursorPointer">
                <a id="add_department_tab" class="nav-link" onclick="change_tab1('ad')">Add Deparment</a>
            </li>
        </ul>
    </div>
    <div class="card-body justify-content-center">
        <h5 id="subtitle" class="card-title">Students</h5>
        <br>
        <div style="display: flex; justify-content:center; align-items:center;" >
          <!-- Inside the grid container -->
          <div id="extraspace">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
          <div id="add_student" class="justify-content-left transitionAnim" hidden>
            <?php include('add_student.html');?>
          </div>

          <div id="add_faculty" class="justify-content-left transitionAnim" hidden>
                <?php include('add_faculty.php'); ?>
          </div>

          <div id="department" class="justify-content-left transitionAnim" hidden>
                <?php include('add_department.php'); ?>
          </div>

          <script type="text/javascript" >

    
          </script>
          <div id="students" class="grid-container justify-content-center transitionAnim" >
              <?php  
                $sql_s = "SELECT * FROM student_tab";
                $result_s = $connect -> query($sql_s);
            
                while($student_r = $result_s -> fetch_assoc()){
              ?>
              <div class="card transitionAnim" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $student_r['stu_name'] ?> </h5>
                    <p class="card-text"><?php echo $student_r['cgpa'] ?> GPA</p>
                    <p class="card-text"><?php echo $student_r['stu_major'] ?></p>
                    <p class="card-text opacity-down">Enrolled in <?php echo $student_r['year_of_enrollment'] ?></p>
                    <p class="card-text opacity-down">Graduate in <?php echo $student_r['year_of_graduation'] ?></p>
                  </div>
              </div>
              <?php 
                }
              ?>
          </div>
          <script type="text/javascript" src="../js/admin2.js"></script> 
        <?php include('faculty2.php') ?>
        </div>
    </div>
  </div>
    
</body>
</html>

