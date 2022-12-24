<?php 
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Helpers\Auth;
use Libs\Databases\VideoCommentTable;

// $data = [
//  'id' => $_POST['id'],
//  'video_id' => $_POST['video_id'],
 
// ];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
$id = $_POST['id'];
$video_id = $_POST['video_id'];

$table = new VideoCommentTable(new MySQL());
$comment = $table->DeleteVideoComment($id);
if ($comment) {
 header("Location: ../user_vedio_les_index_detail.php?id=$video_id");
} else {
 echo "Error";
}


// if(isset($_POST['id'])){
//  $id = $_POST['id'];
//  $data = $video_id = $_POST['video_id'];
//  $table = new VideoCommentTable(new MySQL());
//  $comment = $table->DeleteVideoComment($id);
//  if ($comment) {
//   header("Location: ../user_vedio_les_index_detail.php?id=$data[video_id]");
//  } else {
//   echo "Error";
//  }
// }