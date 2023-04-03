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
    <title>Student Page</title>
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
                <li class="nav-item">
                  <a id="course_tab" class="nav-link active" aria-current="true" href="#" onclick="javascript:change_tab('c')">Courses</a>
                </li>
                <li class="nav-item ">
                  <a id="faculty_tab" class="nav-link" aria-current="true" href="#" onclick="javascript:change_tab('f')">Faculty</a>
                </li>
                <li class="nav-item">
                  <a id="profile_tab" class="nav-link" aria-current="true" href="#" onclick="javascript:change_tab('p')">Profile</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <h5 id="subtitle" class="card-title">Courses</h5>
            <br>
            <div style="display: flex; justify-content:center; align-items:center;" >
                <!-- Inside the grid container -->
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div id="courses" class="grid-container justify-content-center transitionAnim" >
                  <?php 
                    $sql = "SELECT * FROM registration_tab WHERE stu_id={$_SESSION['id']}";
                    $result = $connect -> query($sql);
                    while($r = $result -> fetch_assoc()){
                      $sql2 = "SELECT * FROM courses_tab WHERE course_id= {$r['course_id']} ";
                      $result2 = $connect -> query($sql2);
                      $course_r = $result2 -> fetch_assoc();
                  ?>
                    <div class="card" style="width: 18rem;">
                      <div class="card-body">
                        <h5 class="card-title">#<?php echo $course_r['course_id']; ?> <?php echo $course_r['course_name']; ?></h5>
                        <p class="card-text"><?php echo $course_r['credits']; ?> credits | <?php echo $course_r['type']; ?></p>
                        <p class="card-text"><?php echo $course_r['offered_in']; ?> Semester</p>
                      </div>
                      
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="padding: 0px; float: left;">
                          <div class="card-header" >
                          </div>
                        </li>
                        
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

                  <?php 
                    $sql = "SELECT * FROM student_tab WHERE sid={$_SESSION['id']}";
                    $result = $connect -> query($sql);
                    $r = $result -> fetch_assoc();
                  ?>
                  <div  class="card transitionAnim" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $r['stu_name']; ?></h5>
                      <p class="card-text"><?php echo $r['cgpa']; ?> GPA</p>
                      <p class="card-text"><?php echo $r['stu_major']; ?></p>
                      <p class="card-text">Enrolled in <?php echo $r['year_of_enrollment']; ?></p>
                      <p class="card-text">Graduate in <?php echo $r['year_of_graduation']; ?></p>
    
                    </div>
                  </div>
                </div>
                
                <div id="faculty" class="grid-container justify-content-center transitionAnim" hidden>
                  <?php 
                    $sql = "SELECT * FROM registration_tab WHERE stu_id={$_SESSION['id']}";
                    $result2 = $connect -> query($sql);
                    while($rf = $result2 -> fetch_assoc()){
                      $sql2 = "SELECT * FROM faculty_tab WHERE fac_id= {$rf['fac_id']} ";
                      $result2 = $connect -> query($sql2);
                      $fac_r = $result2 -> fetch_assoc();

                  ?>
                
                  <div class="card" style="width: 18rem;">
                      <img src="../img/faculty/<?php echo $fac_r['image']; ?>" class="card-img-top" alt="<?php echo $fac_r['image']; ?>">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $fac_r['fac_name']; ?></h5>
                        <p class="card-text" style="margin-top: 1px !important;margin-bottom: 1px !important;">
                        <?php
                          $sql3 = "SELECT * FROM department_tab WHERE dept_id= {$fac_r['department']} ";
                          $r2s = $connect -> query($sql3);
                          $dep_r = $r2s -> fetch_assoc();

                          echo $dep_r['dept_name']; 
                        ?>
                        </p>
                          <div style="opacity: 50%; margin-top: 1px;">
                              Joined in <?php echo $fac_r['fac_doj']; ?>
                          </div>
                      </div>
                  </div>
                  <?php 
                    }
                  ?>
                </div>
                
            </div>
        </div>
    </div>

    <script>

      function change_tab(v){
        document.getElementById("course_tab").className = (v == "c")?"nav-link active":"nav-link";
        document.getElementById("faculty_tab").className = (v == "f")?"nav-link active":"nav-link";
        document.getElementById("profile_tab").className = (v == "p")?"nav-link active":"nav-link";

        document.getElementById('course_tab').addEventListener('click', function () {
          document.getElementById("profile").hidden = true;
          document.getElementById("faculty").hidden = true;
          document.getElementById("courses").hidden = false;
          document.getElementById("subtitle").innerHTML = "Courses";
        });
        document.getElementById('faculty_tab').addEventListener('click', function () {
          document.getElementById("profile").hidden = true;
          document.getElementById("faculty").hidden = false;
          document.getElementById("courses").hidden = true;
          document.getElementById("subtitle").innerHTML = "Faculty Department";
          
        });
        document.getElementById('profile_tab').addEventListener('click', function () {
          document.getElementById("profile").hidden = false;
          document.getElementById("faculty").hidden = true;
          document.getElementById("courses").hidden = true;
          document.getElementById("subtitle").innerHTML = "Profile";
        });


      }

    </script>
</body>
</html>