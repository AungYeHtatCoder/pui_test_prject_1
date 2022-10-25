<?php include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;

$table = new PostTable(new MySQL());
$id= $_GET['id'];
$posts = $table->getPostById($id);
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
    <article>
     <!-- Post header-->
     <header class="mb-4">
      <!-- Post title-->
      <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
      <!-- Post meta content-->
      <div class="text-muted fst-italic mb-2"><?= $posts->created_at ?> || &nbsp; &nbsp;
       <?= time_Ago($posts->created_at) ?> &nbsp; &nbsp; posted by <?= $posts->user ?></div>
      <!-- Post categories-->
      <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
      <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
     </header>
     <!-- Preview image figure-->
     <figure class="mb-4"><img class="img-fluid rounded" src="_actions/post_img/<?= $posts->file_name; ?>" alt="..." />
     </figure>

     <!-- Post content-->
     <section class="mb-5">
      <p class="fs-5 mb-4">
       <?= $posts->description ?>
      </p>

     </section>
    </article>
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