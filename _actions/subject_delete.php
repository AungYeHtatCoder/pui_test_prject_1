<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\SubjectTable;

$id = $_GET['id'];

$table = new SubjectTable(new MySQL());
if($table){
 $table->DeleteSubject($id);
 header("Location: ../admin/subject_index.php?delsuccess=true");
} else {
 header("Location: ../admin/subject_index.php?error=true");
}