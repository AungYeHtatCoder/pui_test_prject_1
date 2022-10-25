<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\ProgramTable;

$data =[
"program_name" => $_POST['program_name']

];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();

$table = new ProgramTable(new MySQL());

// $pro = $table->CreateProgram($data);
// echo "<pre>";
// print_r($pro);
// echo "</pre>";
// die();
if($table){
 $table->CreateProgram($data);
 header("Location: ../admin/program_index.php?addsuccess=true ");
} else {
 header("Location: ../admin/program_index.php", "error=true");
}