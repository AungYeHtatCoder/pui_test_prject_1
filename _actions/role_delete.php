<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

$id = $_GET['id'];

$table = new RoleTable(new MySQL());
if($table){
 $table->DeleteRole($id);
 header("Location: ../admin/role_index.php?delsuccess=true");
} else {
 header("Location: ../admin/role_index.php?error=true");
}