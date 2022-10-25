<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$data = [
 "id" => $_POST['id'] ?? 'Unknown'
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

// attach pdf && doc file upload
$table = new PostTable(new MySQL());
$name = $_FILES['file_name']['name'];
$error = $_FILES['file_name']['error'];
$tmp = $_FILES['file_name']['tmp_name'];
$type = $_FILES['file_name']['type'];

if ($error) {
	
 header("Location: ../admin/post_edit.php?error=file");
}
if ($type === "image/jpeg" or $type === "image/png") {
    if (move_uploaded_file($tmp, "post_img/".$name)) {
        
        $data['file_name'] = $name;
        $result = $table->fileUpdate($data);
        header("Location: ../admin/post_index.php?success=post_update");
    } else {
        header("Location: ../admin/post_edit.php?error=type");
    }
}
 