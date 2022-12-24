<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Libs\Databases\TrInfoTable;
use Libs\Databases\StudentTable;
$student_table = new StudentTable(new MySQL());
$students = $student_table->GetAllStudentData();

$table = new TrInfoTable(new MySQL());
$users = $table->GetTrInfoAllData();

$user_table = new UsersTable(new MySQL());
$user_count = $user_table->UserAllData();

?>
<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">
  <div id="layoutSidenav_nav">
   <?php include("includes/sidebar.php"); ?>
  </div>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>

     </ol>

     <!-- top card start  -->
     <div class="row">
      <div class="col-xl-3 col-md-6">
       <div class="card bg-primary text-white mb-4">
        <div class="card-body">Registed Total Teacher
         <h1 class="text-center"> <?php 
         if($user_count){
          $count = 0;
          foreach($user_count as $student_total){
           if($student_total->role_id == '4'){
            $count++;
           }
          }
          echo $count;
         }
         ?> </h1>
        </div>
       </div>
      </div>

      <div class="col-xl-3 col-md-6">
       <div class="card bg-primary text-white mb-4">
        <div class="card-body">Information Updated Total Teacher
         <h1 class="text-center"> <?= count($users) ?> </h1>

        </div>
       </div>
      </div>

      <div class="col-xl-3 col-md-6">
       <div class="card bg-dark text-white mb-4">
        <div class="card-body">Registed Total Student
         <h1 class="text-center">
          <?php 
         if($user_count){
          $count = 0;
          foreach($user_count as $student_total){
           if($student_total->role_id == '5'){
            $count++;
           }
          }
          echo $count;
         }
          ?>
         </h1>
        </div>

       </div>
      </div>
      <div class="col-xl-3 col-md-6">
       <div class="card bg-warning text-white mb-4">
        <div class="card-body">KG Teacher
         <h1 class="text-center">
          <?php 
         if($users){
          $count = 0;
          foreach($users as $user){
           if($user->class_code == '001'){
            $count++;
           }
          }
          echo $count;
         }
         ?>
         </h1>
        </div>
       </div>
      </div>
      <div class="col-xl-3 col-md-6">
       <div class="card bg-success text-white mb-4">
        <div class="card-body">Grade 1 Teacher
         <h1 class="text-center">
          <?php 
         if($users){
          $count = 0;
          foreach($users as $user){
           if($user->class_code == '002'){
            $count++;
           }
          }
          echo $count;
         }
         ?>
         </h1>
        </div>

       </div>
      </div>
      <div class="col-xl-3 col-md-6">
       <div class="card bg-danger text-white mb-4">
        <div class="card-body">Information Updated Total Student
         <h1 class="text-center"> <?= count($students); ?> </h1>
        </div>

       </div>
      </div>

      <div class="col-xl-3 col-md-6">
       <div class="card bg-danger text-white mb-4">
        <div class="card-body">Total KG Student
         <h1 class="text-center">
          <?php 
         if($students){
          $count = 0;
          foreach($students as $student){
           if($student->class_code == '001'){
            $count++;
           }
          }
          echo $count;
         }
          ?>
         </h1>
        </div>

       </div>
      </div>

      <div class="col-xl-3 col-md-6">
       <div class="card bg-dark text-white mb-4">
        <div class="card-body">Total Grade 1 Student
         <h1 class="text-center">
          <?php 
         if($students){
          $count = 0;
          foreach($students as $student){
           if($student->class_code == '002'){
            $count++;
           }
          }
          echo $count;
         }
          ?>
         </h1>
        </div>

       </div>
      </div>


     </div>
     <!-- top card end -->
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       DataTable Example
      </div>
      <div class="card-body">
       <!-- add to datatable -->
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>