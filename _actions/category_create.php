<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\CategoryTable;


$data = [
 'category_name' => $_POST['category_name']
];

$table = new CategoryTable(new MySQL());
$table->CreateCategory($data);

if($table){
 header("Location: ../admin/category_index.php");
}else{
 echo "Error";
}