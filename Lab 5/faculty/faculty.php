<?php 
    include('../connection_db.php');
    session_start();

    $sql = "SELECT * FROM faculty_tab WHERE fac_id = {$_SESSION['id']}";
    $result = $connect -> query($sql);
    $row = $result -> fetch_assoc();

    $sql = "SELECT * FROM department_tab WHERE dept_id = {$row['department']}";
    $result2 = $connect -> query($sql);
    $department_name = $result2 -> fetch_assoc();
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
    <title>Faculty Page</title>
    <link rel="stylesheet" href="../css/headers.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="header sticky-top">
        <div><a href="" class="logo"> EMS </a></div>
    </div>

    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs justify-content-center">
                <li class="nav-item cursorPointer">
                  <a id="course_tab" class="nav-link active cursorPointer" aria-current="true" onclick="javascript:change_tab('c')">Courses</a>
                </li>
                <li class="nav-item cursorPointer">
                  <a id="profile_tab" class="nav-link cursorPointer" aria-current="true" onclick="javascript:change_tab('p')">Profile</a>
                </li>
            </ul>
        </div>
        <div class="card-body justify-content-center">
            <h5 id="subtitle" class="card-title text-center">Courses</h5>
            <br>
            <div style="display: flex; justify-content:center; align-items:center;" >
                <!-- Inside the grid container -->
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div id="courses" class="grid-container justify-content-center transitionAnim" >
                  
                    <?php 
                        $sql_c = "SELECT * FROM courses_tab WHERE fac_id= {$_SESSION['id']}";
                        $result_c = $connect -> query($sql_c);
                    
                        while($course_r = $result_c -> fetch_assoc()){
                            
                    ?>
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                            <h5 class="card-title">#<?php echo $course_r['course_id']." ".$course_r['course_name']; ?></h5>
                            <p class="card-text"><?php echo $course_r['credits']; ?> credits</p>
                            <p class="card-text"><?php echo $course_r['offered_in']; ?> Semester</p>
                            </div>
                            
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="padding: 0px; float: left;">
                                <div class="card-header" >
                                    Students
                                </div>
                            </li>
                            <?php 
                                $sql_re = "SELECT * FROM registration_tab WHERE fac_id= {$_SESSION['id']} AND course_id= {$course_r['course_id']}";
                                $stu_re = $connect -> query($sql_re);
                            
                                while($re = $stu_re -> fetch_assoc()){
                                    $sql_stu = "SELECT * FROM student_tab WHERE sid={$re['stu_id']}";
                                    $stu_r = $connect -> query($sql_stu);
                                    $stu = $stu_r -> fetch_assoc();
                            ?>
                                <li class="list-group-item"> <?php echo $stu['stu_name']; ?> </li>
                            <?php 
                                }  
                            ?>

                            <li class="list-group-item" style="padding: 0px; float: left;">
                                <div class="card-header" >
                                </div>
                            </li>
                            </ul>
                        </div>
                    <?php 
                        }
                    ?>

                </div>

                <div id="profile" class="grid-container" hidden>
                  <div  class="card transitionAnim" style="width: 18rem;">
                    <img src="../img/faculty/<?php echo $row['image']; ?>" class="card-img-top" alt="faculty">
                    <div class="card-body justify-content-center">

                      <h5 class="card-title">
                        <?php echo $row['fac_name']; ?>
                      </h5>
                      <p>
                        <?php echo $row['qualification']; ?>
                      </p>
                      <p class="card-text">
                        <?php 
                        
                        echo $department_name['dept_name']; ?> Department</p>
                      <p class="card-text" style="opacity:50%">
                        Joined Date <?php echo $row['fac_doj']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                

            </div>
        </div>
    </div>

    <script>

      function change_tab(v){
        document.getElementById("course_tab").className = (v == "c")?"nav-link active":"nav-link";
        document.getElementById("profile_tab").className = (v == "p")?"nav-link active":"nav-link";

        document.getElementById('course_tab').addEventListener('click', function () {
          document.getElementById("profile").hidden = true;
          document.getElementById("courses").hidden = false;
          document.getElementById("subtitle").innerHTML = "Courses";
        });
        document.getElementById('profile_tab').addEventListener('click', function () {
          document.getElementById("profile").hidden = false;
          document.getElementById("courses").hidden = true;
          document.getElementById("subtitle").innerHTML = "Profile";
        });


      }

    </script>
</body>
</html>