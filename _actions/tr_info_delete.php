<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TrInfoTable;

$id = $_GET['id'];

$table = new TrInfoTable(new MySQL());
if($table){
 $table->DeleteTrInfo($id);
 header("Location: ../admin/tr_info_index.php?delsuccess=true");
} else {
 header("Location: ../admin/tr_info_index.php?error=true");
}