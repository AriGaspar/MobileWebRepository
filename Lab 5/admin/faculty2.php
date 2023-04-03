<div id="faculty" class="grid-container justify-content-center transitionAnim" hidden>
    <?php  
      $sql_f = "SELECT * FROM faculty_tab";
      $result_f = $connect -> query($sql_f);
  
      while($faculty_r = $result_f -> fetch_assoc()){
    ?>

    <div class="card transitionAnim" style="width: 18rem;">
        <img src="../img/faculty/<?php echo $faculty_r['image']  ?>" class="card-img-top" alt="faculty">
        <div class="card-body">

          <h5 class="card-title">
            <?php echo $faculty_r['fac_name'];  ?>
          </h5>
          <p class="card-text">
            <?php 
              $sql_d = "SELECT * FROM department_tab WHERE dept_id = {$faculty_r['department']}";
              $result_d = $connect -> query($sql_d);
              $dept_r = $result_d -> fetch_assoc();

              echo $dept_r['dept_name'];  
            ?> Department
          </p>
          <p class="card-text" style="opacity:50%">
            Joined Date <?php echo $faculty_r['fac_doj'];  ?>
          </p>
        </div>
    </div>
    <?php 
      }
    ?>
</div>