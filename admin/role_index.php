<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

$table = new RoleTable(new MySQL());
$roles = $table->RoleAllData();
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Role List Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Role List <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        Role</span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <tr>
          <th>ID</th>
          <th>Role Name</th>
          <th>Role Value</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <?php foreach($roles as $role): ?>
         <tr>
          <td><?= $role->id; ?></td>
          <td><?= $role->name; ?></td>
          <td><?= $role->value; ?></td>
          <td>
           <a href="role_edit.php?id=<?= $role->id; ?>" class="btn btn-outline-primary">Edit</a>
           <a href="role_detail.php?id=<?= $role->id; ?>" class="btn btn-outline-warning">Detail</a>
           <a href="../_actions/role_delete.php?id=<?= $role->id; ?>" class="btn btn-outline-danger">Delete</a>
          </td>
         </tr>
         <?php endforeach; ?>
        </tbody>
       </table>
      </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Role Create</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="../_actions/role_create.php" method="POST">
          <div class="mb-3">
           <label for="exampleInputEmail1" class="form-label">Role Name</label>
           <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Role Name">
          </div>
          <div class="mb-3">
           <label for="value" class="form-label">Role Value</label>
           <input type="number" name="value" class="form-control" id="value">
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-primary" value="Create New Role">
          </div>
         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>