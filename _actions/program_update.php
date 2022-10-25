<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ProgramTable;

// $data =[
// "name" => $_POST['name'],
// "value" => $_POST['value']
// ];
$id = $_POST['id'];
$name = $_POST['program_name'];
$date = date("Y-m-d H:i:s");



// echo $id;
// die();
$table = new ProgramTable(new MySQL());
$pro = $table->UpdateProgram($id, $name, $date);
// echo "<pre>";
// print_r($pro);
// echo "</pre>";
// die();
if($table){
 $table->UpdateProgram($id, $name, $date);
 header("Location: ../admin/program_index.php?success=true");
} else {
 header("Location: ../admin/program_index.php?error=true");
}