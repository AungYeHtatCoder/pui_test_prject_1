<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

$table = new RoleTable(new MySQL());
$id = $_GET['id'];
$roles = $table->GetRoleById($id);
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Role Edit Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Role List <span><a href="role_index" class="btn btn-outline-info">Back</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <form action="../_actions/role_update.php" method="post">
        <div class="form-group">
         <input type="hidden" name="id" value="<?= $roles->id ?>">
         <label for="name">Role Name</label>
         <input type="text" class="form-control" id="name" name="name" value="<?= $roles->name; ?>">
        </div>
        <div class="form-group">
         <label for="value">Role Value</label>
         <input type="text" class="form-control" id="value" name="value" value="<?= $roles->value; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
       </form>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>