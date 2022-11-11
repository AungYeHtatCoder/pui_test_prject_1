<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
session_start();
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
$email = $_POST['email'];
$password = md5($_POST['password']);
$table = new UsersTable(new MySQL());
$user = $table->UserLogin($email, $password);
// api response
if($user)
{
 if($user->value == "3")
 {
  
  $response = [
   'status' => 'success',
   'data' => $user
  ];
  echo json_encode($response);
 }elseif($user->value == "2")
 {
  $_SESSION['user'] = $user;
  $response = [
   'status' => 'success',
   'data' => $user
  ];
  echo json_encode($response);
 }elseif($user->value == "1")
 {
  $_SESSION['user'] = $user;
  $response = [
   'status' => 'success',
   'data' => $user
  ];
  echo json_encode($response);
 }elseif($user->value == "4")
 {
  $_SESSION['user'] = $user;
  $response = [
   'status' => 'success',
   'data' => $user
  ];
  echo json_encode($response);
 }else{
  $_SESSION['user'] = $user;
  $response = [
   'status' => 'success',
   'data' => $user
  ];
  echo json_encode($response);
 }
//  $response = [
//   'status' => 'success',
//   'data' => $user
//  ];
//  echo json_encode($response);
// }
// else
// {
//  $response = [
//   'status' => 'error',
//   'data' => 'Invalid email or password'
//  ];
//  echo json_encode($response);
}