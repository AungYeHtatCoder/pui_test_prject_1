<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\StudentTable;
$data = [
 "student_name" => $_POST['student_name'] ?? 'Unknown',
 "roll_no" => $_POST['roll_no'] ?? 'Unknown',
 "father_name" => $_POST['father_name'] ?? 'Unknown',
 "mother_name" => $_POST['mother_name'] ?? 'Unknown',
 "father_id_card_no" => $_POST['father_id_card_no'] ?? 'Unknown',
 "mother_id_card_no" => $_POST['mother_id_card_no'] ?? 'Unknown',
 "phone" => $_POST['phone'] ?? 'Unknown',
 "address" => $_POST['address'] ?? 'Unknown',
 "academic_year" => $_POST['academic_year'] ?? 'Unknown',
 "class_id" => $_POST['class_id'] ?? 'Unknown',
 "attach_file" => $_POST['attach_file'] ?? 'Unknown',
 "user_id" => $_POST['user_id'] ?? 'Unknown',

];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

// attach pdf && doc file upload
$table = new StudentTable(new MySQL());
$name = $_FILES['attach_file']['name'];
$error = $_FILES['attach_file']['error'];
$tmp = $_FILES['attach_file']['tmp_name'];
$type = $_FILES['attach_file']['type'];

// echo $name;
// echo "<br>";
// echo $error;
// echo "<br>";
// echo $tmp;
// echo "<br>";
// echo $type;

if ($error) {
	
 header("Location: ../admin/student_profile.php?error=file");
}

if ($type === "application/pdf" or $type === "application/doc") {
        $folder_name = $name;
        mkdir("uploads/".$folder_name);
    if (move_uploaded_file($tmp, "uploads/".$folder_name."/".$name)) {
        
        $data['attach_file'] = $name;
        $result = $table->StudentInfoCreateWithFile($data);
        header("Location: ../admin/student_profile.php?success=student_info_create");

    } else {
        header("Location: ../admin/student_profile.php?error=type");
    }
}
 