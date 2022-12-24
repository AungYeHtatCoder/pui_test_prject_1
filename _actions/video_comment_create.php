<?php 
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Helpers\Auth;
use Libs\Databases\VideoCommentTable;


$auth = Auth::check();

$data = [
 'video_id' => $_POST['video_id'],
 'comment' => $_POST['comment'],
 'user_id' => $auth->id,
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$table = new VideoCommentTable(new MySQL());
$comment = $table->CreateVideoComment($data);
// echo "<pre>";
// print_r($comment);
// echo "</pre>";
// die();
if ($comment) {
 header("Location: ../user_vedio_les_index_detail.php?id=$data[video_id]");
} else {
 echo "Error";
}