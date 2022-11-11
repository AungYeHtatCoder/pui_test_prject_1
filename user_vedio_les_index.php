<?php include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
include("config/db_con.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;

$table = new PostTable(new MySQL());
$posts = $table->getAllPosts();
// echo "<pre>";
// print_r($posts);
// echo "</pre>";
?>

<body>
 <!-- Responsive navbar-->
 <?php include("layouts/navbar.php"); ?>
 <!-- Page header with logo and tagline-->
 <?php include("layouts/header.php"); ?>
 <!-- Page content-->
 <div class="container">
  <div class="row">
   <!-- Blog entries-->
   <div class="col-lg-8">
    <!-- Featured blog post-->
    <div class="card mb-4">
     <!-- post pagination -->
     <!-- Nested row for non-featured blog posts-->

     <!-- Pagination-->
     <div class="col-md-12">
      <nav aria-label="Page navigation example">
       <ul class="pagination
          justify-content-center">
        <li class="page-item">
         <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
         </a>
        </li>

        <li class="page-item">
         <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
         </a>
        </li>
       </ul>
      </nav>
     </div>
    </div>
    <!-- Side widgets-->
    <div class="col-lg-4">
     <!-- Search widget-->
     <?php include("layouts/search.php"); ?>
     <!-- Categories widget-->
     <?php include("layouts/category_sidebar.php") ;?>
     <!-- Side widget-->
     <?php include("layouts/side_widget.php"); ?>
    </div>
   </div>
  </div>
  <!-- Footer-->
  <?php include("layouts/footer.php"); ?>

  <?php 


 ?>