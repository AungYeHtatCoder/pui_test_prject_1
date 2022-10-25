<?php
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
//$auth = Auth::check();
$table = new UsersTable(new MySQL());
$users = $table->UserAllData();
?>
<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Admin Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <div class="row">
      <div class="col-xl-3 col-md-6">
       <div class="card bg-primary text-white mb-4">
        <div class="card-body">Total Users : <?php echo count($users); ?>
        </div>

        <div class="card-footer d-flex align-items-center justify-content-between">
         <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
         <div class="small text-white"><i class="fas fa-angle-right"></i></div>
        </div>
       </div>
      </div>
      <div class="col-xl-3 col-md-6">
       <div class="card-body"></div>
       <?php 
           if(isset($_GET['success']))
           {
            echo '<div class="alert alert-success">
            <strong>Success!</strong> Role has been changed.
            </div>';
           }
           ?>
      </div>
     </div>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       User List

      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
         </tr>
        </thead>
        <tfoot>
         <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
         </tr>
        </tfoot>
        <tbody>
         <?php foreach($users as $user) : ?>
         <tr>
          <td><?= $user->id; ?></td>
          <td><?= $user->name ?></td>
          <td><?= $user->email ?></td>
          <td>
           <?php
           if($user->value == 1) : ?>
           <span class="badge bg-primary"><?= $user->role; ?></span>
           <?php elseif($user->value == 2) : ?>
           <span class="badge bg-success"><?= $user->role; ?></span>
           <?php elseif($user->value == 3) : ?>
           <span class="badge bg-danger"><?= $user->role; ?></span>
           <?php endif; ?>
          </td>
          <td>
           <div class="dorpdown-menu dropdown-menu-dark">
            <a href="" class="btn btn-sm btn-outline-primary dropdwon-toggle" data-bs-toggle="dropdown">
             Change Role
            </a>
            <div class="dropdown-menu dropdown-menu-dark">
             <a href="../_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
             <a href="../_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Manager</a>
             <a href="../_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
            </div>
           </div>
          </td>
         </tr>
         <?php endforeach; ?>
        </tbody>
       </table>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>