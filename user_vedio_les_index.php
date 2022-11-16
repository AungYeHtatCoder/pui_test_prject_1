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
     <?php //foreach($posts as $post) : ?>
     <video width="400" controls>
      <source src="_actions/video_lesson/<?= $post->file_name ?>" type="video/mp4">
      <source src="mov_bbb.ogg" type="video/ogg">
      Your browser does not support HTML video.
     </video>
     <div class="card-body">
      <div class="small text-muted">January 1, 2022</div>
      <h2 class="card-title">Featured Post Title</h2>
      <p class="card-text"></p>
      <a class="btn btn-primary" href="#!">Read more →</a>
     </div>
     <?php //endforeach; ?>
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