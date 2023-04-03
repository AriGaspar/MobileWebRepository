<form action="./process_new_department.php" method="POST">
    <div class="mb-3">
      <label for="name" class="form-label" style="float: left;">Department Name</label>
      <input type="text" class="form-control" id="name" name="name" >
    </div>

    <div class="mb-3">
        <label for="chair" class="form-label" style="float: left;">Department Chair</label>
        <input type="text" class="form-control" id="chair" name="chair" >
    </div>


    <div class="mb-3">
        <label for="dean" class="form-label" style="float: left;">Department dean</label>
        <input type="text" class="form-control" id="dean" name="dean">
    </div>
    <div class="mb-3">
        <label for="budget" class="form-label" style="float: left;">Budget</label>
        <input type="number" class="form-control" id="budget" name="budget">
    </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
</form>