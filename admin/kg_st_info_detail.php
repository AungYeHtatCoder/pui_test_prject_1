<?php 
include_once("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\StudentTable;

$id = $_GET['id'];

$table = new StudentTable(new MySQL());
$student = $table->GetStudentById($id);

// echo $student->id . "<br>";
// echo $student->name . "<br>";
// echo $student->student_name . "<br>";
// echo $student->email . "<br>";
// echo "../_actions/uploads/" . $student->attach_file . "<br>";
?>

<a class="btn btn-outline-primary" href="../_actions/uploads/<?= $student->attach_file ?>" target="_blank">View File</a>
<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Student Information Details Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">KG Student Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed KG Student Information Details
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table class="table">
        <tr>
         <th>ID</th>
         <td><?= $student->id; ?></td>
        </tr>
        <tr>
         <th>User Account Name</th>
         <td><?= $student->name; ?></td>
        </tr>
        <tr>
         <th>Updated Name</th>
         <td><?= $student->student_name; ?>
         </td>
        </tr>
        <tr>
         <th>Email</th>
         <td><?= $student->email; ?></td>
        </tr>
        <tr>
         <th>Address</th>
         <td><?= $student->address; ?></td>
        </tr>
        <tr>
         <th>Phone</th>
         <td><?= $student->phone; ?></td>
        </tr>
        <tr>
         <th>Academic Year</th>
         <td><?= $student->academic_year; ?></td>
        </tr>

        <tr>
         <th>Class</th>
         <td><?= $student->class_name; ?>
          <span>
         <th>Class Code </th>
         <td><?= $student->class_code; ?></td>
         </span>
         </td>
        </tr>
        <tr>
         <th>PDF Download</th>
         <td>
          <a class="btn btn-outline-primary" href="../_actions/uploads/<?= $student->attach_file ?>"
           target="_blank">View File</a>
         </td>
        </tr>
        <tr>
         <th>Read pdf file</th>
         <!-- read pdf file -->
         <?php 
         // read pdf file
        //  $file = "../_actions/uploads/" . $student->attach_file;
        //  $file_handle = fopen($file, "r");
        // echo fread($file_handle, filesize($file));
         
        ?>
        </tr>

       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>