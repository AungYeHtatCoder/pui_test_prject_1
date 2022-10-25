<?php
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;

$data = [ 
 "tr_name" => $_POST['tr_name'] ?? "Unknown",
 "phone" => $_POST['phone'] ?? "UnKnown",
 "secondary_phone" => $_POST['secondary_phone'] ?? "UnKnow",
 "address" => $_POST['address'] ?? "UnKnown",
 "fix_address" => $_POST['fix_address'] ?? "UnKnown",
 "experience" => $_POST['experience'] ?? "UnKnown",
 "academic_year" => $_POST['academic_year'] ?? "UnKnow",
 "program_id" => $_POST['program_id'] ?? "UnKnown",
 "class_id" => $_POST['class_id'] ?? "UnKnown",
 "subject_id" => $_POST['subject_id'] ?? "UnKnown",
 "user_id" => $_POST['user_id'] ?? "UnKnown",
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$table = new TrInfoTable(new MySQL);
$tr_info_insert = $table->InsertTrInfo($data);
// echo "<pre>";
// print_r($tr_info_insert);
// echo "</pre>";
// die();
if($tr_info_insert){
    header("location: ../admin/tr_info_index.php");
}else{
    header("location: ../admin/teacher_profile.php");
}