<?php

include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;

use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL());

$id = $_GET['id'];
$role = $_GET['role'];
$table->UserChangeRole($id, $role);
$msg = '';
// header("Location: ../admin/user_index.php?success=role");
if($role == 1)
{
 header("Location: ../admin/user_index.php?success=role");
 $msg = 'success change role';
}elseif($role == 2)
{
 header("Location: ../admin/user_index.php?success=role");
 $msg = 'success change role';
}elseif($role == 3)
{
 header("Location: ../admin/user_index.php?success=role");
 $msg = 'success change role';
}else{
 header("Location: ../admin/user_index.php?error=role");
}