<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\StudentTable;
use Helpers\Auth;

$table = new StudentTable(new MySQL());
$students = $table->GetAllStudentData();
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Student Information Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">KG Student Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed Student Information
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <th>ID</th>
         <th>Account Name</th>
         <th>St_Name</th>
         <th>Email</th>
         <th>Image</th>
         <th>Action</th>
        </thead>
        <tbody>
         <?php 
         // foreach loop with equal role value
         foreach($students as $st_info): 
          if($st_info->class_code == 001):
          
         ?>
         <tr>
          <td><?= $st_info->id; ?></td>
          <td><?= $st_info->name; ?></td>
          <td><?= $st_info->student_name; ?></td>
          <td><?= $st_info->email; ?></td>
          <td><img src="../_actions/photos/<?= $st_info->photo; ?>" width="50px" height="50px" alt=""></td>

          <td>
           <a href="kg_st_info_edit.php?id=<?= $st_info->id; ?>" class="btn btn-outline-primary">Edit</a>
           <a href="kg_st_info_detail.php?id=<?= $st_info->id; ?>" class="btn btn-outline-warning">Detail</a>
           <a href="../_actions/kg_st_info_delete.php?id=<?= $st_info->id; ?>" class="btn btn-outline-danger">Delete</a>
          </td>
         </tr>
         <?php endif; endforeach; ?>

        </tbody>
       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>


   <?php
   /*
   <td><embed src="../_actions/uploads/<?=$st_info->attach_file; ?>" width=50px" height="50px" /></td>
   <td>
    */