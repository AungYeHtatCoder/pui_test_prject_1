<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ExamResultTable;

$table = new ExamResultTable(new MySQL());
$id = $_GET['id'];
$results = $table->GetExamResultByStudentId($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Exam Result Deatil Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Exam Result Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Exam Result Details <span><a href="exam_result_index.php" class="btn btn-outline-info">Back</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table class="table">
        <tr>
         <th>ID</th>
         <td><?= $results->id ?></td>
        </tr>
        <tr>
         <th>Program Name</th>
         <td><?= $results->program_name ?></td>
        </tr>
        <tr>
         <th>Student Name</th>
         <td><?= $results->student_name ?></td>
        </tr>
        <tr>
         <th>Calss Name</th>
         <td><?= $results->class_name ?></td>
        </tr>
        <tr>
         <th>Myanmar Marks</th>
         <td><?= $results->sub_myanmar ?></td>
        </tr>

        <tr>
         <th>English Marks</th>
         <td><?= $results->sub_eng ?></td>
        </tr>
        <tr>
         <th>Math Marks</th>
         <td><?= $results->sub_math ?></td>
        </tr>
        <tr>
         <th>Scient Marks</th>
         <td><?= $results->sub_scient ?></td>
        </tr>
        <tr>
         <th>Geo Marks</th>
         <td><?= $results->sub_geo ?></td>
        </tr>
        <tr>
         <th>History Marks</th>
         <td><?= $results->sub_history ?></td>
        </tr>
        <tr>
         <th>Total Marks</th>
         <td><?= $results->total_marks ?></td>
        </tr>
        <tr>
         <th>Grade Point</th>
         <td>
          <?php 
          $total = $results->total_marks;
          $grade_point = $total / 100;
          
            if($grade_point >= 4.00) :
            ?>
          <span class="badge bg-success">A+</span>
          <?php elseif($grade_point >= 3.75) : ?>
          <span class="badge bg-success">A</span>
          <?php elseif($grade_point >= 3.50) : ?>
          <span class="badge bg-success">A-</span>
          <?php elseif($grade_point >= 3.25) : ?>
          <span class="badge bg-success">B+</span>
          <?php elseif($grade_point >= 3.00) : ?>
          <span class="badge bg-success">B</span>
          <?php elseif($grade_point >= 2.75) : ?>
          <span class="badge bg-success">B-</span>
          <?php elseif($grade_point >= 2.50) : ?>
          <span class="badge bg-success">C+</span>
          <?php elseif($grade_point >= 2.25) : ?>
          <span class="badge bg-success">C</span>
          <?php elseif($grade_point >= 2.00) : ?>
          <span class="badge bg-success">C-</span>
          <?php elseif($grade_point >= 1.75) : ?>
          <span class="badge bg-success">D+</span>
          <?php elseif($grade_point >= 1.50) : ?>
          <span class="badge bg-success">D</span>
          <?php elseif($grade_point >= 1.25) : ?>
          <span class="badge bg-success">D-</span>
          <?php elseif($grade_point >= 1.00) : ?>
          <span class="badge bg-success">E</span>
          <?php else : ?>
          <span class="badge bg-danger">F</span>
          <?php endif; ?>
         </td>

        </tr>
        <tr>
         <th>Exam Name</th>
         <td><?= $results->exam_name ?></td>
        </tr>
        <tr>
         <th>Exam Date</th>
         <td><?= $results->exam_date ?></td>
        </tr>
        <tr>
         <th>Exam Time</th>
         <td><?= $results->exam_time ?></td>
        </tr>
        <tr>
         <th>Academic Year</th>
         <td><?= $results->academic_year ?></td>
        </tr>
        <tr>
         <th>Teacher Name</th>
         <td><?= $results->tr_name ?></td>
        </tr>
        <tr>
         <th>Created At</th>
         <td><?= $results->created_at ?></td>
        </tr>
        <tr>
         <th>Updated At</th>
         <td><?= $results->updated_at ?></td>
        </tr>
       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>