<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ClassTable;

$id = $_GET['id'];

$table = new ClassTable(new MySQL());
if($table){
 $table->DeleteClass($id);
 header("Location: ../admin/class_index.php?delsuccess=true");
} else {
 header("Location: ../admin/class_index.php?error=true");
}