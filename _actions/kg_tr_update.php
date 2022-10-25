<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;
use Libs\Databases\ProgramTable;
use Libs\Databases\ClassTable;
use Libs\Databases\SubjectTable;

$data = [
    'tr_name' => $_POST['tr_name'],
    'phone' => $_POST['phone'],
    'secondary_phone' => $_POST['secondary_phone'],
    'address' => $_POST['address'],
    'fix_address' => $_POST['fix_address'],
    'experience' => $_POST['experience'],
    'academic_year' => $_POST['academic_year'],
    'program_id' => $_POST['program_id'],
    'class_id' => $_POST['class_id'],
    'subject_id' => $_POST['subject_id'],
    'user_id' => $_POST['user_id'],
    //'updated_at' => date('Y-m-d H:i:s'),
    "id" => $_POST["id"]
    
];
// echo "<pre>";
// print_r($data);
// echo "</pre>";
$table = new TrInfoTable(new MySQL());
$result = $table->UpdateTrInfo($data);
// echo "<pre>";
// print_r($result);
// echo "</pre>";

if($result){
    header("location: ../admin/kg_tr_index.php");
}else{
        header("location: ../admin/kg_tr_edit.php");

}