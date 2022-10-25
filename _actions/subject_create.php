<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\SubjectTable;

$data =[
"subject_name" => $_POST['subject_name'],
"subject_code" => $_POST['subject_code']
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new SubjectTable(new MySQL());

// $cl = $table->CreateClass($data);
// echo "<pre>";
// print_r($cl);
// echo "</pre>";
// die();
if($table){
 $table->CreateSubject($data);
 header("Location: ../admin/subject_index.php?addsuccess=true ");
} else {
 header("Location: ../admin/subject_index.php", "error=true");
}