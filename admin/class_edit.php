<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_header.php"); ?>
 <div id="layoutSidenav">
  <?php include("includes/sidebar.php"); ?>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Class Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Class Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <?php //include("includes/bar_chart.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Update Class
      </div>
      <div class="card-body">
       <!-- Add Datatable -->
       <?php 

       include("../vendor/autoload.php");
       use Libs\Databases\MySQL;
       use Libs\Databases\ClassTable;
       $table = new ClassTable(new MySQL());
       // get the role id from the url
       $id = $_GET['id'];
       $course = $table->GetClassById($id);
       // echo "<pre>";
       // print_r($role);
       // echo "</pre>";
       ?>
       <form action="../_actions/class_update.php" method="post">
        <input type="hidden" name="id" value="<?= $course->id ?>">
        <div class="form-group">
         <label for="name">Class Name</label>
         <input type="text" class="form-control" id="name" name="class_name" value="<?= $course->class_name; ?>">
        </div>
        <div class="form-group">
         <label for="value">Class Code</label>
         <input type="text" class="form-control" id="value" name="class_code" value="<?= $course->class_code; ?>">
        </div>
        <div class="form-group mt-5">
         <input type="submit" class="btn btn-primary" value="Class Update">
        </div>
       </form>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>