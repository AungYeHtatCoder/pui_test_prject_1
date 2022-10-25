<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$data = [
 "id" => $_POST['id'] ?? 'Unknown',
 "title" => $_POST['title'] ?? 'Unknown',
 "category_id" => $_POST['category_id'] ?? 'Unknown',
 "description" => $_POST['description'] ?? 'Unknown',
 "user_id" => $_POST['user_id'] ?? 'Unknown',

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

    //// return to old image if not select image
    // if ($name === "") {
    //     $data['file_name'] = $_POST['old_file '];
    // } else {
    //     $data['file_name'] = $name;
    //     move_uploaded_file($tmp, "../post_img/" . $name);
    // }
       

    if (move_uploaded_file($tmp, "post_img/".$name)) {
        
        $data['file_name'] = $name;
        $result = $table->PostUpdate($data);
        header("Location: ../admin/post_index.php?success=post_update");
    } else {
        header("Location: ../admin/post_edit.php?error=type");
    }
}
 