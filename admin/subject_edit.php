<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_header.php"); ?>
 <div id="layoutSidenav">
  <?php include("includes/sidebar.php"); ?>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Subject Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Subject Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <?php //include("includes/bar_chart.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Update Subject
      </div>
      <div class="card-body">
       <!-- Add Datatable -->
       <?php 

       include("../vendor/autoload.php");
       use Libs\Databases\MySQL;
       use Libs\Databases\SubjectTable;
       $table = new SubjectTable(new MySQL());
       // get the subject id from the url
       $id = $_GET['id'];
       $subject = $table->GetSubjectById($id);
       // echo "<pre>";
       // print_r($subject);
       // echo "</pre>";
       ?>
       <form action="../_actions/subject_update.php" method="post">
        <input type="hidden" name="id" value="<?= $subject->id ?>">
        <div class="form-group">
         <label for="name">Subject Name</label>
         <input type="text" class="form-control" id="name" name="subject_name" value="<?= $subject->subject_name; ?>">
        </div>
        <div class="form-group">
         <label for="value">Subject Code</label>
         <input type="text" class="form-control" id="value" name="subject_code" value="<?= $subject->subject_code; ?>">
        </div>
        <div class="form-group mt-5">
         <input type="submit" class="btn btn-primary" value="Subject Update">
        </div>
       </form>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>