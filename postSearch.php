<?php include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$post_table = new PostTable(new MySQL());
$search = $_POST['search'];
$posts = $post_table->Search($search);

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
     <?php foreach ($posts as $post) : ?>
     <a href="#!"><img class="card-img-top" src="_actions/post_img/<?= $post->file_name; ?>" width="350px"
       height="850px" alt="..." /></a>
     <div class="card-body">
      <div class="small text-muted">
       <?php 
      // date format
      $date = date_create($post->created_at);
      echo date_format($date, "F d, Y");
      ?>
       ||&nbsp; &nbsp; <?= time_Ago($post->created_at) ?>
      </div>
      <h2 class="card-title"><?= $post->title ?></h2>
      <p class="card-text"><?= substr($post->description, 0, 100) ?></p>
      <a class="btn btn-primary" href="user_post_detail.php?id=<?= $post->id ?>">Read more →</a>

     </div>
     <?php endforeach; ?>
     <!-- Nested row for non-featured blog posts-->

     <!-- Pagination-->

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