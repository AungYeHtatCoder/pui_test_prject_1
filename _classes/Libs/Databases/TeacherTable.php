<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class TeacherTable {


 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function TeacherRegister($data)
 {
  try {
   $query = "INSERT INTO teachers (teacher_name, email, password, phone, address, role_id, edu_info, programm, subject, class_name, created_at) VALUES (:teacher_name, :email, :password, :phone, :address, :role_id, :edu_info, :programm, :subject, :class_name,  NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}