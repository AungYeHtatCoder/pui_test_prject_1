<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\ClassTable;

$data =[
"class_name" => $_POST['class_name'],
"class_code" => $_POST['class_code']
];
$table = new ClassTable(new MySQL());
if($table){
 $table->CreateClass($data);
 header("Location: ../admin/class_index.php?addsuccess=true ");
} else {
 header("Location: ../admin/class_index.php", "error=true");
}