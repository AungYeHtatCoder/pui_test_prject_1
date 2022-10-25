edit pag<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ProgramTable;
use Libs\Databases\StudentTable;
use Libs\Databases\ClassTable;
use Libs\Databases\ExamintionTable;
use Libs\Databases\TrInfoTable;
use Libs\Databases\ExamResultTable;

$program_data = new ProgramTable(new MySQL());
$programs = $program_data->GetProgramAllData();

$student_data = new StudentTable(new MySQL());
$students = $student_data->GetAllStudentData();

$class_data = new ClassTable(new MySQL());
$classes = $class_data->GetClassAllData();
$examination_data = new ExamintionTable(new MySQL());
$exam_names = $examination_data->GetExamination();

$trinfos_data = new TrInfoTable(new MySQL());
$tr_infos_data = $trinfos_data->GetTrInfoAllData();

$id = $_GET['id'];
$exam_result_data = new ExamResultTable(new MySQL());
$exam_result_edit = $exam_result_data->GetExamResultByStudentId($id);


include("includes/head.php"); 

include("includes/extra_head.php"); 

?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Exam Result Update Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Exam Result Update Dashboard</li>
     </ol>

     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Exam Result <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        Exam Result</span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <form action="../_actions/exam_result_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="mb-3">
         <select name="program_id" class="selectpicker col-12" data-size="7" data-style="btn btn-primary btn-round"
          title="Single Select">
          <option disabled selected>Program Name</option>
          <?php
           foreach($programs as $program) :
            
           ?>
          <option value="<?= $program->id; ?>" selected><?= $program->program_name; ?></option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class=" mb-3">
         <select name="student_id" class="selectpicker col-12" data-size="7" data-style="btn btn-primary btn-round"
          title="Single Select">
          <option disabled selected>Student Name</option>
          <?php
           foreach($students as $student) :
            if($student->class_code == 001) :
           ?>
          <option value="<?= $student->id ?>" selected><?= $student->student_name; ?></option>
          <?php endif; endforeach; ?>
         </select>
        </div>

        <div class="mb-3">
         <select name="class_id" class="selectpicker col-12" data-size="7" data-style="btn btn-primary btn-round"
          title="Single Select">
          <option disabled selected>Class Name</option>

          <?php 
           foreach($classes as $class) :
            
           ?>
          <option value="<?= $class->id ?>" selected><?= $class->class_name; ?></option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class="form-group">
         <label for="exampleEmail" class="bmd-label-floating">Myanmar Mark</label>
         <input type="number" name="sub_myanmar" class="form-control" id="exampleEmail"
          value="<?= $exam_result_edit->sub_myanmar ?>">
        </div>
        <div class="form-group">
         <label for="examplePass" class="bmd-label-floating">English Mark</label>
         <input type="number" name="sub_eng" class="form-control" id="examplePass"
          value="<?= $exam_result_edit->sub_eng ?>">
        </div>
        <div class="form-group">
         <label for="exampleEmail" class="bmd-label-floating">Math Mark</label>
         <input type="number" name="sub_math" class="form-control" id="exampleEmail"
          value="<?= $exam_result_edit->sub_math ?>">
        </div>
        <div class="form-group">
         <label for="examplePass" class="bmd-label-floating">Scient Mark</label>
         <input type="number" name="sub_scient" class="form-control" id="examplePass"
          value="<?= $exam_result_edit->sub_scient ?>">
        </div>
        <div class="form-group">
         <label for="exampleEmail" class="bmd-label-floating">Geo Mark</label>
         <input type="number" name="sub_geo" class="form-control" id="exampleEmail"
          value="<?= $exam_result_edit->sub_geo ?>">
        </div>
        <div class="form-group">
         <label for="examplePass" class="bmd-label-floating">History Mark</label>
         <input type="number" name="sub_history" class="form-control" id="examplePass"
          value="<?= $exam_result_edit->sub_history ?>">
        </div>

        <div class="mb-3">
         <select name="examination_id" class="selectpicker col-12" data-size="7" data-style="btn btn-primary btn-round"
          title="Single Select">
          <option disabled selected>Examination Name</option>
          <?php foreach($exam_names as $exam) : ?>
          <option value="<?= $exam->id ?>" selected><?= $exam->exam_name; ?></option>
          <?php endforeach; ?>
         </select>
        </div>
        <div class="mb-3">
         <div class="card ">
          <div class="card-header card-header-rose card-header-text">
           <div class="card-icon">
            <i class="material-icons">library_books</i>
           </div>
           <h4 class="card-title">Exam Date</h4>
          </div>
          <div class="card-body ">
           <div class="form-group">
            <input name="exam_date" type="text" class="form-control" id="actualDate" value="<?php 
             // if(isset($exam_result_edit->exam_date)) {
             //  echo $exam_result_edit->exam_date;
             // } else {
             //  echo date('Y-m-d');
             // }
             echo $exam_result_edit->exam_date;
             
             ?>">
           </div>
          </div>
         </div>
         <div class="mb-3">
          <div class="card ">
           <div class="card-header card-header-rose card-header-text">
            <div class="card-icon">
             <i class="material-icons">av_timer</i>
            </div>
            <h4 class="card-title">Exam Time </h4>
           </div>
           <div class="card-body ">
            <div class="form-group">
             <input name="exam_time" type="text" class="form-control timepicker"
              value="<?= $exam_result_edit->exam_time ?>">
            </div>
           </div>
          </div>
          <div class="mb-3">
           <label for="examplePass" class="bmd-label-floating">Academic Year</label>
           <input name="academic_year" type="text" class="form-control" id="examplePass"
            value="<?= $exam_result_edit->academic_year ?>">
          </div>
          <div class="mb-3">
           <select name="tr_infos_id" class="selectpicker col-12" data-size="7" data-style="btn btn-primary btn-round"
            title="Single Select">
            <option disabled selected>Teacher ID</option>
            <?php 
             foreach($tr_infos_data as $teacher) :
              if($teacher->class_code == 001) :
             ?>
            <option value="<?= $teacher->id ?>" selected><?= $teacher->tr_name; ?></option>
            <?php endif; endforeach; ?>
           </select>
          </div>
         </div>
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <input type="submit" class="btn btn-primary" value="Create New Role">
        </div>
       </form>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>
   <?php include("includes/extra_js.php"); ?>