<?php 
include("../vendor/autoload.php");

use Helpers\Auth;
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$password = md5($_POST['password']);

if($table)
{
 $table->updatePassword($auth->id, $password);
 header("Location: ../admin/user_profile.php?success=password");
}elseif($auth->value == 5){
 header("Location: ../admin/student_profile.php?success=password");
}elseif($auth->value == 4){
 header("Location: ../admin/teacher_profile.php?success=password");
}elseif($auth->value == 3){
 header("Location: ../admin/admin_profile.php?success=password");
}elseif($auth->value == 2){
 header("Location: ../admin/manager_profile.php?success=password");
}
else{
 header("Location: ../admin/user_profile.php?error=password");
}