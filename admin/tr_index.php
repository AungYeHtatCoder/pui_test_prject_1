<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$users = $table->UserAllData();
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
       Teacher List
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <th>ID</th>
         <th>Name</th>
         <th>Email</th>
         <th>Role</th>
         <th>Action</th>
        </thead>
        <tbody>
         <?php 
         // foreach loop with equal role value
         foreach($users as $user): 
          if($user->value == 4):
         ?>
         <tr>
          <td><?= $user->id; ?></td>
          <td><?= $user->name; ?></td>
          <td><?= $user->email; ?></td>
          <td><?= $user->role; ?></td>
          <td>
           <?php if($auth->value == '3') : ?>
           <a href="user_edit.php?id=<?= $user->id; ?>" class="btn btn-outline-primary">Edit</a>
           <?php endif; ?>
           <a href="user_detail.php?id=<?= $user->id; ?>" class="btn btn-outline-warning">Detail</a>
           <?php if($auth->value == '3') : ?>
           <a href="../_actions/user_delete.php?id=<?= $user->id; ?>" class="btn btn-outline-danger">Delete</a>
           <?php endif; ?>
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