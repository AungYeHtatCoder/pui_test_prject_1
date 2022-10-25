<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;
use Libs\Databases\ClassTable;
use Libs\Databases\SubjectTable;
use Libs\Databases\ProgramTable;

$id = $_GET['id'];
$table = new TrInfoTable(new MySQL());
$teacher_edit = $table->GetTrInfoById($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Teacher Information Update Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Update Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed KG Teacher Information Update <span><a href="tr_info_index.php"
         class="btn btn-outline-primary">Back</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <form action="../_actions/kg_tr_update.php" method="POST">
        <div class="mb-3">
         <input type="hidden" name="id" value="<?= $id ?>">
         <label for="teacher name" class="form-label">Teacher Name</label>
         <input type="text" name="tr_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          value="<?= $teacher_edit->tr_name; ?>">
        </div>
        <div class="mb-3">
         <label for="phone" class="form-label">Phone</label>
         <input type="text" name="phone" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->phone; ?>">
        </div>
        <div class="mb-3">
         <label for="phone" class="form-label">Secondary Phone</label>
         <input type="text" name="secondary_phone" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->secondary_phone; ?>">
        </div>

        <div class="mb-3">
         <label for="adress" class="form-label">Adress</label>
         <input type="text" name="address" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->address; ?>">
        </div>
        <div class="mb-3">
         <label for="FixedAddress" class="form-label">FixedAddress</label>
         <input type="text" name="fix_address" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->fix_address; ?>">
        </div>
        <div class="mb-3">
         <label for="experience" class="form-label">Experience</label>
         <input type="text" name="experience" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->experience; ?>">
        </div>
        <div class="mb-3">
         <label for="Academic_Year" class="form-label">Acdeemic_Year</label>
         <input type="text" name="academic_year" class="form-control" id="exampleInputPassword1"
          value="<?= $teacher_edit->academic_year; ?>">
        </div>
        <select name="program_id" class="form-select mt-3" aria-label="Default select example">
         <option selected>Select Program</option>
         <?php
         $table = new ProgramTable(new MySQL());
         $program_data = $table->GetProgramAllData();
         foreach ($program_data as $program) {
          if ($program->id == $teacher_edit->program_id) {
           echo "<option value='$program->id' selected>$program->program_name</option>";
          } else {
           echo "<option value='$program->id'>$program->program_name</option>";
          }
         }
         ?>

        </select>

        <select name="class_id" class="form-select mt-3" aria-label="Default select example">
         <option selected>Select Class</option>
         <?php
         $table = new ClassTable(new MySQL());
         $class_data = $table->GetClassAllData();
         foreach ($class_data as $class) {
          if ($class->id == $teacher_edit->class_id) {
           echo "<option value='$class->id' selected>$class->class_name</option>";
          } else {
           echo "<option value='$class->id'>$class->class_name</option>";
          }
         }
         ?>
        </select>

        <select name="subject_id" class="form-select mt-3" aria-label="Default select example">
         <option selected>Select Subject</option>
         <?php
         $table = new SubjectTable(new MySQL());
         $subject_data = $table->GetSubjectAllData();
         foreach ($subject_data as $subject) {
          if ($subject->id == $teacher_edit->subject_id) {
           echo "<option value='$subject->id' selected>$subject->subject_name</option>";
          } else {
           echo "<option value='$subject->id'>$subject->subject_name</option>";
          }
         }
         ?>
        </select>
        <input type="hidden" name="user_id" value="<?= $auth->id; ?>">
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Update KG Tr INfo</button>
        </div>
       </form>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>