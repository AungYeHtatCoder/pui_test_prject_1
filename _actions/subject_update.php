<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\SubjectTable;


// $data =[
// "name" => $_POST['name'],
// "value" => $_POST['value']
// ];
$id = $_POST['id'];
$name = $_POST['subject_name'];
$code = $_POST['subject_code'];
$date = date("Y-m-d H:i:s");
// echo $id;
// echo $name;
// echo $code;
// echo $date;
// die();



$table = new SubjectTable(new MySQL());
// $pro = $table->UpdateClass($id, $name, $code, $date);
// echo "<pre>";
// print_r($pro);
// echo "</pre>";
// die();
if($table){
 $table->UpdateSubject($id, $name, $code, $date);
 header("Location: ../admin/subject_index.php?success=true");
} else {
 header("Location: ../admin/subject_index.php?error=true");
}