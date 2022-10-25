<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

// $data =[
// "name" => $_POST['name'],
// "value" => $_POST['value']
// ];
$id = $_POST['id'];
//$id = $_GET['id'];
$name = $_POST['name'];
$value = $_POST['value'];


// echo $id;
// die();
$table = new RoleTable(new MySQL());

if($table){
 $table->UpdateRole($id, $name, $value);
 header("Location: ../admin/role_index.php?success=true");
} else {
 header("Location: ../admin/role_index.php?error=true");
}