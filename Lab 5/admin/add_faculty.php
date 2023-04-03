<?php 
    include('./connection_db.php');
    session_start();
?>
<form action="./process_new_faculty.php" method="POST">
    
    <div class="mb-3">
      <label for="faculty_name" class="form-label" style="float: left;">Name</label>
      <input type="text" class="form-control" id="name" name="faculty_name" >
    </div>
    <div class="mb-3">
      <label for="qualification" class="form-label" style="float: left;">Qualification</label>
      <select class="form-select" name="qualification">
        <option selected>Select...</option>
        <option value="Assistant Professor">Assistant Professor</option>
        <option value="Associate Professor">Associate Professor</option>
        <option value="Formal Professor">Formal Professor</option>
      </select>
    </div>

    <div class="mb-3">
        <label for="department" class="form-label" style="float: left;">Department</label>
        <select class="form-select" name="department">
            <option selected>Select...</option>
            <?php  
              $sql_d = "SELECT * FROM department_tab";
              $result_d = $connect -> query($sql_d);
          
              while($dept_r = $result_d -> fetch_assoc()){
            ?>
              <option value="<?php echo $dept_r['dept_id']; ?>" ><?php echo $dept_r['dept_name'];?></option>
            <?php 
              }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="joined" class="form-label" style="float: left;">Joined date</label>
        <input type="date" class="form-control" id="joined" name="joined">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label" style="float: left;">Picture extension (.png,.jpg,etc)</label>
        <input type="text" class="form-control" id="img" name="img" placeholder=".png, .jpg, etc">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>