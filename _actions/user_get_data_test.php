<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;

$table = new UsersTable(new MySQL());
$users = $table->UserAllData();

echo "<pre>";
print_r($users);
echo "</pre>";