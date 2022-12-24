<?php include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
include("config/db_con.php");
use Libs\Databases\MySQL;
use Libs\Databases\TRUploadVideoTable;
use Libs\Databases\CategoryTable;
use Libs\Databases\VideoCommentTable;
use Helpers\Auth;
$auth = Auth::check();
$table = new TRUploadVideoTable(new MySQL());
$id = $_GET['id'];
$detail = $table->GetVideoById($id);

$comment_table = new VideoCommentTable(new MySQL());
$comments = $comment_table->GetVideoCommentByVideoId($_GET['id']);

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
    <div class="card mb-4">
     <video width="400" controls>
      <source src="_actions/video_lesson/<?= $detail->file_name ?>" type="video/mp4">
     </video>
     <div class="card-body">
      <div class="small text-muted"><?= date('F j, Y', strtotime($detail->created_at)) ?></div>
      <h2 class="card-title"><?= $detail->title ?></h2>
      <h2 class="card-title badge bg-success"> Class : <?= $detail->class_name ?> &nbsp; &nbsp; Class Code :
       <span class="badge bg-secondary"><?= $detail->class_code ?></span>
      </h2>
      <h2 class="card-title badge bg-primary"> Program Name : <?= $detail->program_name ?></h2>
      <h2 class="card-title badge bg-warning"> Subject : <?= $detail->subject_name ?> &nbsp; &nbsp; Subject Code : <span
        class="badge bg-secondary"><?= $detail->subject_code ?></span></h2>

      <h2 class="card-title badge bg-dark"> Academic Year : <?= $detail->academic_year; ?></h2>
      <p class="card-text">
       <?= $detail->description ?>
      </p>
      <a class="btn btn-primary" href="#">Uploaded By : <?= $detail->name ?></a>
     </div>
    </div>
    <!-- Pagination-->
    <section class="mb-5">
     <div class="card bg-light">
      <div class="card-body">
       <!-- Comment form-->
       <form class="mb-4" action="_actions/video_comment_create.php" method="POST">
        <input type="hidden" name="video_id" value="<?= $detail->id?>">
        <textarea name="comment" class="form-control" rows="3"
         placeholder="Join the discussion and leave a comment!"></textarea>
        <div class="mb-3 mt-3">
         <input type="submit" class="btn btn-outline-primary" value="Create Comment">
        </div>
       </form>
       <!-- Comment with nested comments-->
       <?php foreach ($comments as $comment) : ?>
       <div class="d-flex mb-4">
        <!-- Parent comment-->

        <div class="flex-shrink-0"><img class="rounded-circle" src="_actions/photos/<?= $comment->profile; ?>" alt="..."
          width="50px" height="50px" /></div>
        <div class="ms-3">
         <div class="fw-bold">
          <?= $comment->comment ?>
         </div>
         <div class="small text-muted">
          <?= date('F j, Y', strtotime($comment->created_at)) ?>
          <div class="mb-3">
           <form action="_actions/create_reply" method="POST">
            <div class="form-group">
             <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
             <input type="text" name="reply">
             <input type="submit" class="btn btn-outline-primary" value="Reply">
            </div>
           </form>
          </div>
         </div>
         <!-- Child comment 1-->
        </div>
        <div class="mb-3">
         <!-- delete comment -->
         <?php if ($auth->id === $comment->user_id) : ?>
         <form action="_actions/video_comment_delete.php" method="POST">
          <input type="hidden" name="id" value="<?= $comment->id ?>">
          <input type="hidden" name="video_id" value="<?= $id ?>">
          <input type="submit" class="btn btn-outline-danger btn-sm" value="Delete Comment">
         </form>
         <?php endif; ?>

        </div>
       </div>
       <?php endforeach; ?>

       <!-- Single comment-->

      </div>
     </div>
    </section>
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