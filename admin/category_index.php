<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\CategoryTable;

$table = new CategoryTable(new MySQL());
$categories = $table->GetCategoryAllData();
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Category List Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Category Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Category List <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        Category</span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <tr>
          <th>ID</th>
          <th>Category Name</th>
          <th>Created At</th>
          <th>Update At</th>
          <th>Action</th>
         </tr>
        </thead>
        <tbody>
         <tr>
          <?php
          foreach($categories as $category):
          ?>
          <td><?= $category->id; ?></td>
          <td><?= $category->category_name; ?></td>
          <td><?= date('F j, Y', strtotime($category->created_at)); ?></td>
          <td><?= date('F j, Y', strtotime($category->updated_at)); ?></td>
          <td>
           <a href="category_edit.php?id=<?= $category->id; ?>" class="btn btn-outline-primary">Edit</a>
           <a href="category_detail.php?id=<?= $category->id; ?>" class="btn btn-outline-warning">Detail</a>
           <a href="../_actions/category_delete.php?id=<?= $category->id; ?>" class="btn btn-outline-danger">Delete</a>
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
         <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="../_actions/category_create.php" method="POST">
          <div class="mb-3">
           <label for="exampleInputEmail1" class="form-label">Category Name</label>
           <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
            placeholder="Enter Role Name">
          </div>

          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-primary" value="Create New Category">
          </div>
         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>