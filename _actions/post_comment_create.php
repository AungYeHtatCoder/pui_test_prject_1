<?php 
include("../vendor/autoload.php");

use Helpers\Auth;
use Libs\Databases\MySQL;
use Libs\Databases\CommentsTable;
$auth = Auth::check();

$data = [
 'post_id' => $_POST['post_id'],
 'comment' => $_POST['comment'],
 'user_id' => $auth->id,
];

//echo $auth->id;

// echo "<br>";
// echo"<pre>";
// print_r($data);
// echo"</pre>";

$table = new CommentsTable(new MySQL());
$comment = $table->CommentCreate($data);

// echo "<pre>";
// print_r($comment);
// echo "</pre>";
// die();
if($comment){
 header("Location: ../user_post_detail.php?id=$data[post_id]");
}else{
 echo "Error";
}

?>