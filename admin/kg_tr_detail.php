<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;
use Helpers\Auth;
$id = $_GET['id'];
$table = new TrInfoTable(new MySQL());
$teachers = $table->GetTrInfoDetail($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Teacher Information Detail Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active"> KG Teacher Detail Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed KG Teacher Information Detail <span><a href="kg_tr_index.php"
         class="btn btn-outline-primary">Back</a></span>
      </div>
      <div class="card mt-3 mx-auto">

       <img src="../_actions/photos/<?= $teachers->photo ?>" width="150px" height="150px" alt="">

      </div>
      <div class="card-body">
       <!-- add to datatable -->

       <table class="table">
        <tr>
         <th>ID</th>
         <td><?= $teachers->id ?></td>
        </tr>
        <tr>
         <th>Name</th>
         <td><?= $teachers->tr_name ?></td>
        </tr>
        <tr>
         <th>Account Name</th>
         <td><?= $teachers->name ?></td>
        </tr>
        <tr>
        <tr>
         <th>Primary Phone</th>
         <td><?= $teachers->phone ?></td>
        </tr>
        <tr>
         <th>Secondary Phone</th>
         <td><?= $teachers->secondary_phone ?></td>
        </tr>
        <tr>
         <th>Address</th>
         <td><?= $teachers->address ?></td>
        </tr>
        <tr>
         <th>Fix Address</th>
         <td><?= $teachers->fix_address ?></td>
        </tr>
        <tr>
        <tr>
         <th>Experience</th>
         <td><?= $teachers->experience ?></td>
        </tr>
        <tr>
         <th>Academic Year</th>
         <td><?= $teachers->academic_year ?></td>
        </tr>
        <tr>
         <th>Program</th>
         <td><?= $teachers->program_name ?></td>
        </tr>
        <tr>
         <th>Class</th>
         <td><?= $teachers->class_name ?></td>
         <th>Class Code</th>
         <td><?= $teachers->class_code ?></td>
        </tr>
        <tr>
         <th>Subject</th>
         <td><?= $teachers->subject_name ?></td>
         <th>Subject Code</th>
         <td><?= $teachers->subject_code ?></td>
        </tr>
        <tr>
         <th>Created At</th>
         <td><?= date("F j, Y", strtotime($teachers->created_at)) ?></td>
        </tr>
        <tr>
         <th>Updated At</th>
         <td><?= date("F j, Y", strtotime($teachers->updated_at)) ?></td>
        </tr>
       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>