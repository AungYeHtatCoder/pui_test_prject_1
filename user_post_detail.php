<?php 
//session_start();
include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;
use Libs\Databases\CommentsTable;
use Helpers\Auth;
$auth = Auth::check();

$table = new PostTable(new MySQL());
$id= $_GET['id'];
$posts = $table->getPostById($id);
// echo "<pre>";
// print_r($posts);
// echo "</pre>";
$comment_data = new CommentsTable(new MySQL());
$comments = $comment_data->getPostComments($id);

// echo "<pre>";
// print_r($comments);
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
    <!-- comment section -->
    <section class="mb-5">
     <div class="card bg-light">
      <div class="card-body">
       <!-- Comment form-->
       <form class="mb-4" action="_actions/post_comment_create.php" method="POST">
        <input type="hidden" name="post_id" value="<?= $id ?>">
        <textarea name="comment" class="form-control" rows="3"
         placeholder="Join the discussion and leave a comment!"></textarea>
        <div class="mb-3 mt-3">
         <input type="submit" class="btn btn-outline-primary" value="Create Comment">
        </div>
       </form>
       <!-- Comment with nested comments-->
       <?php foreach($comments as $comment): ?>
       <div class="d-flex mb-4">
        <!-- Parent comment-->
        <div class="flex-shrink-0"><img class="rounded-circle" src="_actions/photos/<?= $comment->profile ?>" alt="..."
          width="50px" height="50px" /></div>
        <div class="ms-3">
         <div class="fw-bold"><?= $comment->user ?></div>
         <?= $comment->comment; ?>
         <!-- Child comment 1-->
        </div>
        <div class="mb-3">
         <!-- delete comment -->
         <?php if($comment->user_id == $auth->id): ?>
         <form action="_actions/post_delete_comment.php" method="POST">
          <input type="hidden" name="id" value="<?= $comment->id ?>">
          <input type="hidden" name="post_id" value="<?= $id ?>">
          <input type="submit" class="btn btn-outline-danger" value="Delete Comment">
         </form>
         <?php endif; ?>
        </div>
       </div>
       <?php endforeach; ?>
       <!-- Single comment-->

      </div>
     </div>
    </section>

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