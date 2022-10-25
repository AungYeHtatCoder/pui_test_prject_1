<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ClassTable;


// $data =[
// "name" => $_POST['name'],
// "value" => $_POST['value']
// ];
$id = $_POST['id'];
$name = $_POST['class_name'];
$code = $_POST['class_code'];
$date = date("Y-m-d H:i:s");
// echo $id;
// echo $name;
// echo $code;
// echo $date;
// die();



$table = new ClassTable(new MySQL());
// $pro = $table->UpdateClass($id, $name, $code, $date);
// echo "<pre>";
// print_r($pro);
// echo "</pre>";
// die();
if($table){
 $table->UpdateClass($id, $name, $code, $date);
 header("Location: ../admin/class_index.php?success=true");
} else {
 header("Location: ../admin/class_index.php?error=true");
}