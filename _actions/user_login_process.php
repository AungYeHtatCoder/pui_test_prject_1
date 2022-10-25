<?php

session_start();
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
$email = $_POST['email'];
$password = md5($_POST['password']);
$table = new UsersTable(new MySQL());
$user = $table->UserLogin($email, $password);
if ($user) {
	if ($table->suspended($user->id)) {
		header("Location: ../login_form.php", "suspended=true");
	}
	if($user->value == "3") {
		$_SESSION['user'] = $user;
	header("Location: ../admin/admin_profile.php", "login=true");
	}elseif($user->value == "2") {
		$_SESSION['user'] = $user;
		header("Location: ../admin/manager_profile.php", "login=true");
	}elseif($user->value == "1") {
		$_SESSION['user'] = $user;
		header("Location: ../admin/user_profile.php", "login=true");
	}elseif($user->value == "4") {
		$_SESSION['user'] = $user;
		header("Location: ../admin/teacher_profile.php", "login=true");
	}elseif($user->value == "5") {
		$_SESSION['user'] = $user;
		header("Location: ../admin/student_profile.php", "login=true");
	}
} else {
	header("Location: ../login_form.php", "error=true");
}