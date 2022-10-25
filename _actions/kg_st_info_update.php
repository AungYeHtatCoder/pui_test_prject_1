<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\StudentTable;

$data = [
 'student_name' => $_POST['student_name'],
 'father_name' => $_POST['father_name'],
 'mother_name' => $_POST['mother_name'],
 'father_id_card_no' => $_POST['father_id_card_no'],
 'mother_id_card_no' => $_POST['mother_id_card_no'],
 //'student_id_card_no' => $_POST['student_id_card_no'],
 'phone' => $_POST['phone'],
 'address' => $_POST['address'],
 'academic_year' => $_POST['academic_year'],
 'class_id' => $_POST['class_id'],
 'user_id' => $_POST['user_id'],
 'attach_file' => $_FILES['attach_file']['name'],
 'id' => $_POST['id']

];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
$table = new StudentTable(new MySQL());
//$result = $table->StudentInfoUpdate($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

$name = $_FILES['attach_file']['name'];
$error = $_FILES['attach_file']['error'];
$tmp = $_FILES['attach_file']['tmp_name'];
$type = $_FILES['attach_file']['type'];



// student info update
if($error){
    header("Location: ../admin/kg_st_info_edit.php?error=file");
}
if ($type === "application/pdf" or $type === "application/docx") {
    $folder_name = $name;
    mkdir("uploads/".$folder_name);
    if (move_uploaded_file($tmp, "uploads/".$folder_name."/".$name)) {
        if ($data['attach_file'] != "") {
            $result = $table->StudentInfoUpdate($data);
            header("Location: ../admin/kg_st_info_index.php?success=student_info_update");
        } elseif ($data['attach_file'] == "") {
            $result = $table->StudentInfoUpdate($data);
            header("Location: ../admin/kg_st_info_index.php?success=student_info_update");
        } else {
            header("Location: ../admin/kg_st_info_index.php?error=type");
        }
    }
}