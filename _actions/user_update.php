<?php
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Helpers\Auth;
$auth = Auth::check();  // Check if user is logged in
$table = new UsersTable(new MySQL()); // Create new instance of UsersTable class 

$name = $_FILES['photo']['name']; // 
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];
if ($error) {
 header("Location: ../admin/user_profile.php?error=file");
}

if ($type === "image/jpeg" or $type === "image/png") {

	$table->updatePhoto($auth->id, $name);

	move_uploaded_file($tmp, "photos/$name");

	$auth->photo = $name;
if($auth->value == 4){
	header("Location: ../admin/teacher_profile.php?success=photo");
} elseif($auth->value == 1) {
	header("Location: ../admin/user_profile.php?success=photo");
}elseif($auth->value == 2) {
	header("Location: ../admin/manager_profile.php?success=photo");
}elseif($auth->value == 3) {
	header("Location: ../admin/admin_profile.php?success=photo");
}elseif($auth->value == 5) {
	header("Location: ../admin/student_profile.php?success=photo");
}
} else {
	header("Location: ../admin/user_profile.php?error=type");
} 



	