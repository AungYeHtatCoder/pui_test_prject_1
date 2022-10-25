<?php
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;

$data = [
 "name" => $_POST["name"] ?? "Unknown",
 "email" => $_POST["email"] ?? "Unknown",
 "password" => md5($_POST["password"]),
 "phone" => $_POST["phone"] ?? "Unknown",
 "address" => $_POST["address"] ?? "Unknown",
 "role_id" => 4,
];
echo $data["name"];
//$db = new MySQL();
$table = new UsersTable(new MySQL());
if($table)
{
 $table->UserRegister($data);
 header("Location: ../login_form.php", "register=true");
}else{
 header("Location: ../register_form.php", "register=false");
}