<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;
use Helpers\Auth;

$table = new TrInfoTable(new MySQL());
$teachers = $table->GetTrInfoAllData();
include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Registed KG Teacher Information Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php if(isset($_GET['success']) && $_GET['success'] == true){ ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Teacher Information has been updated.
     </div>
     <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> KG Teacher Information has not been updated.
     </div>
     <?php } ?>

     <?php if(isset($_GET['delsuccess'])) : ?>
     <div class="alert alert-success">
      <strong>Success!</strong> KG Teacher Information has been Deleted.
     </div>
     <?php endif; ?>

     <?php if(isset($_GET['addsuccess'])) : ?>
     <div class="alert alert-success">
      <strong>Success!</strong> KG Teacher Information has been Created New Record.
     </div>
     <?php endif; ?>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Registed KG Teacher Information
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <th>ID</th>
         <th>Account Name</th>
         <th>Teacher Name</th>
         <th>Email</th>
         <th>Class</th>
         <th>Subjec</th>
         <th>Action</th>
        </thead>
        <tbody>
         <?php 
         // foreach loop with equal role value
         foreach($teachers as $info): 
          if($info->class_code == "001"):
         ?>
         <tr>
          <td><?= $info->id; ?></td>
          <td><?= $info->name; ?></td>
          <td><?= $info->tr_name; ?></td>
          <td><?= $info->email; ?></td>
          <td><?= $info->class_name; ?></td>
          <td><?= $info->subject_name; ?></td>
          <td>
           <?php if($auth->value == '3'): ?>
           <a href="kg_tr_edit.php?id=<?= $info->id; ?>" class="btn btn-outline-primary">Edit</a>
           <?php endif; ?>
           <a href="kg_tr_detail.php?id=<?= $info->id; ?>" class="btn btn-outline-warning">Detail</a>
           <?php if($auth->value == '3'): ?>
           <a href="../_actions/kg_tr_delete.php?id=<?= $info->id; ?>" class="btn btn-outline-danger">Delete</a>
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