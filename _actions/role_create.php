<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\RoleTable;

$data =[
"name" => $_POST['name'],
"value" => $_POST['value']
];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new RoleTable(new MySQL());

//$role = $table->CreateRole($data);

if($table){
 $table->CreateRole($data);
 header("Location: ../admin/role_index.php?addsuccess=true ");
} else {
 header("Location: ../admin/role_index.php", "error=true");
}