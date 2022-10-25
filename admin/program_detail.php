<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_header.php"); ?>
 <div id="layoutSidenav">
  <?php include("includes/sidebar.php"); ?>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <?php //include("includes/bar_chart.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Program Details <span><a href="program_index.php" class="btn btn-outline-info">Back</a></span>
      </div>
      <div class="card-body">
       <?php 
       include("../vendor/autoload.php");
       use Libs\Databases\MySQL;
       use Libs\Databases\ProgramTable;

       $table = new ProgramTable(new MySQL());
       $id = $_GET['id'];
       $program = $table->ShowProgramById($id);
       ?>
       <!-- Add Datatable -->
       <table class="table table-primary">
        <tr>
         <th>ID</th>
         <td><?= $program->id ?></td>
        </tr>
        <tr class="table-secondary">
         <th>Program Name</th>
         <td><?= $program->program_name ?></td>
        </tr>
        <tr class="table-light">
         <th>Created At</th>
         <td><?= $program->created_at ?></td>
        </tr>
        <tr class="table-light">
         <th>Updated At</th>
         <td><?= $program->updated_at ?></td>
        </tr>
       </table>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>