<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;

$table = new UsersTable(new MySQL());
$id = $_GET['id'];
$st_deatails = $table->UserDetail($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registered Student Deatil Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Registered Student Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registered Student Details <span><a href="role_index.php" class="btn btn-outline-info">Back</a></span>
      </div>
      <div class="card mt-3 mx-auto">

       <img src="../_actions/photos/<?= $st_deatails->photo ?>" width="150px" height="150px" alt="">
      </div>
      <div class="card-body">

       <!-- add to datatable -->
       <table class="table">
        <tr>
         <th>ID</th>
         <td><?= $st_deatails->id ?></td>
        </tr>
        <tr>
         <th>Student Name</th>
         <td><?= $st_deatails->name ?></td>
        </tr>
        <tr>
         <th>Role Value</th>
         <td><?= $st_deatails->value ?></td>
        </tr>
        <tr>
         <th>Email</th>
         <td>
          <?= $st_deatails->email ?>
         </td>
        </tr>
        <tr>

         <th>Phone</th>
         <td>
          <?= $st_deatails->phone ?>
         </td>
        </tr>
        <tr>
         <th>Address</th>
         <td>
          <?= $st_deatails->address ?>
         </td>
        </tr>
        <tr>
         <th>
          created At
         </th>
         <td>
          <?= $st_deatails->created_at ?>
         </td>
        </tr>
        <tr>
         <th>Updated At</th>
         <td>
          <?= $st_deatails->updated_at ?>
         </td>
        </tr>
       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>