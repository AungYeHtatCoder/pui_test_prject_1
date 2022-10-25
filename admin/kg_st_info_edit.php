<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\StudentTable;
use Libs\Databases\ProgramTable;
use Libs\Databases\ClassTable;
use Libs\Databases\SubjectTable;
$id = $_GET["id"];
$table = new StudentTable(new MySQL());

$st_info_data = $table->GetStudentById($id);

include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Student Update Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active"> KG Student Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed KG Student Update
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <form action="../_actions/kg_st_info_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
         <label for="TeacherName" class="form-label">Student Name</label>
         <input type="text" name="student_name" class="form-control" value="<?= $st_info_data->student_name ?>">
        </div>
        <div class="mb-3">
         <label for="Phone" class="form-label">Father Name</label>
         <input type="text" name="father_name" class="form-control" value="<?= $st_info_data->father_name ?>">
        </div>
        <div class="mb-3">
         <label for="Mother Name" class="form-label">Mother Name</label>
         <input type="text" name="mother_name" class="form-control" value="<?= $st_info_data->mother_name ?>">
        </div>
        <div class="mb-3">
         <label for="Father ID Card No" class="form-label">Father ID Card No</label>
         <input type="text" name="father_id_card_no" class="form-control"
          value="<?= $st_info_data->father_id_card_no ?>">
        </div>
        <div class="mb-3">
         <label for="Mother ID Card No" class="form-label">Mother ID Card No</label>
         <input type="text" name="mother_id_card_no" class="form-control"
          value="<?= $st_info_data->mother_id_card_no ?>">
        </div>
        <div class="mb-3">
         <label for="Phone" class="form-label">Phone</label>
         <input type="text" name="phone" class="form-control" value="<?= $st_info_data->phone ?>">
        </div>
        <div class="form-floating">
         <textarea name="address" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
          style="height: 100px"><?= $st_info_data->address ?></textarea>
         <label for="floatingTextarea2">Address</label>
        </div>
        <!-- academic year -->
        <div class="mb-3">
         <label for="Academic Year" class="form-label">Academic Year</label>
         <input type="text" name="academic_year" class="form-control" value="<?= $st_info_data->academic_year ?>">
        </div>

        <select name="class_id" class="form-select mt-3" aria-label="Default select example">
         <option selected>Select Class</option>
         <?php
         $table = new ClassTable(new MySQL());
         $class_data = $table->GetClassAllData();
         foreach ($class_data as $class) {
          if ($class->id == $st_info_data->class_id) {
           echo "<option value='$class->id' selected>$class->class_name</option>";
          } else {
           echo "<option value='$class->id'>$class->class_name</option>";
          }
         }
         ?>
        </select>

        <!-- old attach file   -->
        <div class="mb-3">
         <label for="Attach File" class="form-label">Attach File</label>
         <a href="../_actions/uploads/<?= $st_info_data->attach_file ?>" target="_blank">View File</a>

         <!-- selectd file -->
         <input type="file" name="attach_file" class="form-control"
          value="../_actions/uploads/<?= $st_info_data->attach_file ?>">

        </div>
        <!-- selected user id -->
        <input type="hidden" name="user_id" value="<?php if($st_info_data->user_id) {
          echo $st_info_data->user_id;
          } else {
          echo $auth->id;
          } ?>">
        <div class="modal-footer">
         <a href="kg_st_info_index.php" class="btn btn-outline-info">Back</a>
         <button type="submit" class="btn btn-primary">Update KG Student Info</button>
        </div>
       </form>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>