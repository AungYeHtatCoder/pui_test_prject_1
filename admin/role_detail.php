<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

$table = new RoleTable(new MySQL());
$id = $_GET['id'];
$roles = $table->RoleDetail($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Role Deatil Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Role Details <span><a href="role_index.php" class="btn btn-outline-info">Back</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table class="table">
        <tr>
         <th>ID</th>
         <td><?= $roles->id ?></td>
        </tr>
        <tr>
         <th>Role Name</th>
         <td><?= $roles->name ?></td>
        </tr>
        <tr>
         <th>Role Value</th>
         <td><?= $roles->value ?></td>
        </tr>
       </table>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>