
<div class="alert alert-primary mr-3 mt-2 text-center " role="alert">
  <h2>Add Students</h2>
</div>

<div class="container">
<form action="" method="post"> 
<?php wp_nonce_field('digital-school-nonce-action', 'digital-school-nonce'); ?>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student Name</label>
    <input type="text" class="form-control" name="studentname" placeholder="Student Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Class Name</label>
    <input type="text" class="form-control" name="classname" placeholder="Class Name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput3">Shift Name</label>
    <input type="text" class="form-control" name="shift" placeholder="Shift Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput4">Roll number</label>
    <input type="number" class="form-control" name="roll" placeholder="Roll Number">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput5">Year</label>
    <input type="number" class="form-control" name="year" placeholder="Year">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

</form>

</div>



<div class="alert alert-primary mr-3 mt-2 text-center " role="alert">
  <h2>Student List</h2>
</div>


<div class="container">
  <div class="row">
     <div class="col-md-12">
     <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Shift</th>
      <th scope="col">Roll</th>
      <th scope="col">Year</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
<tbody>

<?php 
  
  foreach( $show_students as $show_student ){

  ?>


   <tr>
      <th scope="row"><?php echo $show_student->id; ?></th>
      <td><?php echo $show_student->studentname; ?></td>
      <td><?php echo $show_student->classname; ?></td>
      <td><?php echo $show_student->shift; ?></td>
      <td><?php echo $show_student->roll; ?></td>
      <td><?php echo $show_student->year; ?></td>
      <td>
      <a type="button" class="btn btn-primary">Edit</a>
      <!-- <a href="#" class="btn btn-primary">Delete</a> -->
      <a href="<?php echo admin_url('admin.php?page=digital-school&action=delete&id=' . $show_student->id ) ?>" onclick="return confirm('are you sure ?')" class="btn btn-danger">Delete</a>
      </td>
    </tr>

    <?php } ?>

</tbody>

</table>
     </div>
  </div>
</div>