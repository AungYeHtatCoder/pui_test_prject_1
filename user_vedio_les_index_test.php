<?php include("layouts/head.php"); 
include("vendor/autoload.php");
include("functions.php");
include("config/db_con.php");
use Libs\Databases\MySQL;
use Libs\Databases\TRUploadVideoTable;
use Libs\Databases\CategoryTable;
// $start = 0;
// $limit = 6;
$table = new TRUploadVideoTable(new MySQL());
$video_data = $table->GetVideoAllData();
$count_page = count($video_data);
$start= $count_page;
$limit= 6;

$per_page = ceil($start/$limit);
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}

$offset = ($page-1)*$limit;

$videos = $table->GetVideoAllDataWithPagination($offset, $limit);
// echo "<pre>";
// print_r($videos);
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
     <?php foreach($videos as $video_les) : ?>
     <video width="400" controls>
      <source src="_actions/video_lesson/<?= $video_les->file_name ?>" type="video/mp4">

     </video>
     <div class="card-body">
      <div class="small text-muted">January 1, 2022</div>
      <h2 class="card-title">Featured Post Title</h2>
      <p class="card-text"></p>
      <a class="btn btn-primary" href="user_vedio_les_index_detail.php?id=<?= $video_les->id ?>">Read more →</a>
     </div>
     <?php endforeach; ?>
    </div>
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
       <?php for($i=1; $i<=$per_page; $i++) : ?>
       <li class="page-item"><a class="page-link" href="user_vedio_les_index_test.php?page=<?= $i ?>"><?= $i ?></a></li>
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


 ?>