<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ExamintionTable;


$data = [
 'exam_name' => $_POST['exam_name']
 // 'created_at' => date('Y-m-d H:i:s'),
 // 'updated_at' => date('Y-m-d H:i:s')
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new ExamintionTable(new MySQL());
// $result = $table->CreateExamintion($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

if($table)
{
 $result = $table->CreateExamintion($data);
 if($result)
 {
  header("location: ../admin/exam_name_index.php?addsuccess=true");
 }
 else
 {
  echo "Error";
 }
}