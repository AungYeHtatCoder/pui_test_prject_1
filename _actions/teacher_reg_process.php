<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TeacherTable;


$data = [
"teacher_name" => $_POST["teacher_name"] ?? "Unknown",
"email" => $_POST["email"] ?? "Unknown",

"password" => md5($_POST["password"]),
"phone" => $_POST["phone"] ?? "Unknown",
"address" => $_POST["address"] ?? "Unknown",
"role_id" => 4,
"edu_info" => $_POST["edu_info"] ?? "Unknown",
"programm" => $_POST["programm"] ?? "Unknown",
"subject" => $_POST["subject"] ?? "Unknown",
"class_name" => $_POST["class_name"] ?? "Unknown",
];
//echo $data["teacher_name"];

$table = new TeacherTable(new MySQL());
if($table)
{

$table->TeacherRegister($data);

header("Location: ../login_form.php", "register=true");
}else{

header("Location: ../teacher_reg_form.php", "register=false");
}