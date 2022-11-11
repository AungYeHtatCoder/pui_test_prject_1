<?php include("includes/head.php");
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Libs\Databases\TRUploadVideoTable;

$table = new TRUploadVideoTable(new MySQL());
$videos = $table->GetVideoAllData();
// echo "<pre>";
// print_r($videos);
// echo "</pre>";
?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">
  <div id="layoutSidenav_nav">
   <?php include("includes/sidebar.php"); ?>
  </div>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       DataTable Example
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <th>ID</th>
         <th>Teacher Name</th>
         <th>Program</th>
         <th>Class</th>
         <th>Subjec</th>
         <th>Video Lesson</th>
         <th>Action</th>
        </thead>
        <tbody>
         <tr>
          <?php
         foreach ($videos as $video) :
          if($video->class_code == 001) :
          ?>
          <td><?php echo $video->id; ?></td>
          <td><?php echo $video->name; ?></td>
          <td><?php echo $video->program_name; ?></td>
          <td><?php echo $video->class_name; ?></td>
          <td><?php echo $video->subject_name; ?></td>
          <td>
           <video width="320" height="240" controls>
            <source src="../_actions/video_lesson/<?php echo $video->file_name; ?>" type="video/mp4">
            <source src="<?php echo $video->file_name; ?>" type="video/ogg">
            Your browser does not support the video tag.
           </video>
          </td>
          <td>
           <a href="tr_video_lesson_edit.php?id=<?php echo $video->id; ?>" class="btn btn-primary">Edit</a>
           <a href="../_actions/tr_video_lesson_delete.php?id=<?php echo $video->id; ?>" class="btn btn-danger">Delete</a>
          </td>

         </tr>
         <?php endif; endforeach; ?>

        </tbody>
       </table>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>