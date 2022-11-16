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
     <?php 
$query = $link->query("SELECT posts.*, users.name, users.email, users.photo, categories.category_name as cat_name FROM posts LEFT JOIN users ON posts.user_id = users.id LEFT JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC");

// echo "<pre>";
// print_r($query);
// echo "</pre>";
// number of rows
// $total = $query->num_rows;
//  echo $total;

 // number of posts
    $num_posts = $query->num_rows;
    $num_per_pages = 6;// limit of posts per page
    $num_pages = ceil($num_posts/$num_per_pages);
    if(isset($_GET['page'])){
      $page = $_GET['page'];    
    }else{  
      $page = 1;
    }
    $offset = ($page-1)*$num_per_pages;
    $query = $link->query("SELECT posts.*, users.name, users.email, users.photo, categories.category_name as cat_name FROM posts LEFT JOIN users ON posts.user_id = users.id LEFT JOIN categories ON posts.category_id = categories.id ORDER BY posts.id DESC LIMIT $offset, $num_per_pages");
    
?>
     <?php 
if($query->num_rows > 0) :
      while($row = $query->fetch_assoc()) :
?>
     <a href="#!"><img class="card-img-top" src="_actions/post_img/<?= $row['file_name']; ?>" width="350px"
       height="850px" alt="..." /></a>
     <div class="card-body">
      <div class="small text-muted">
       <?php 
      // date format
      $date = date_create($row['created_at']);
      echo date_format($date, "F d, Y");
      ?>
       ||&nbsp; &nbsp; <?= time_Ago($row['created_at']) ?>
      </div>
      <h2 class="card-title"><?= $row['title'] ?></h2>
      <p class="card-text"><?= substr($row['description'], 0, 100) ?></p>
      <a class="btn btn-primary" href="user_post_detail.php?id=<?= $row['id'] ?>">Read more →</a>
     </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>
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
       <?php for($i=1; $i<=$num_pages; $i++) : ?>
       <li class="page-item"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
       <?php endfor; ?>
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
/* 
<div class="card mb-4">
     <?php foreach ($posts as $post) : ?>
 <a href="#!"><img class="card-img-top" src="_actions/post_img/<?= $post->file_name; ?>" width="350px" height="850px"
   alt="..." /></a>
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
 </div>

 */

 ?>