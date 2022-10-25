<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$photo = $_FILES['file_name']['name'];
$photo_tmp = $_FILES['file_name']['tmp_name'];
$error = $_FILES['file_name']['error'];
$type = $_FILES['file_name']['type'];

$data = [
 'title' => $_POST['title'],
 'category_id' => $_POST['category_id'],
 'description' => strip_tags($_POST['description']),
 //'file_name' => $_FILES['file_name']['name'],
 'file_name' => $photo,
 'user_id' => $_POST['user_id']
];

if ($error) {
	
 header("Location: ../admin/post_index.php?error=file");
}

if($type === "image/jpeg" or $type === "image/png") {
 
 $table = new PostTable(new MySQL());
 $table->PostCreate($data);
 move_uploaded_file($photo_tmp, "post_img/$photo");
 header("Location: ../admin/post_index.php?success=true");
} else {
 header("Location: ../admin/post_index.php?error=file");
}