<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class ClassTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
 

 public function GetClassAllData()
 {
  try{
   $query = "SELECT * FROM classes";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // Role Create 
 public function CreateClass($data)
 {
  try {
   $query = "INSERT INTO classes (class_name, class_code, created_at) VALUES (:class_name, :class_code, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // GetRoleById
 public function GetClassById($id)
 {
  try {
   $query = "SELECT * FROM classes WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 // Classs Update
 public function UpdateClass($id, $name, $code, $date)
 {
  try {
   $query = "UPDATE classes SET class_name = :class_name, class_code = :class_code, updated_at = :updated_at WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["class_name" => $name, "class_code" => $code, "updated_at" => $date, "id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // show by id 
 public function ShowById($id)
 {
  try {
   $query = "SELECT * FROM classes WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
 // Role Delete
 public function DeleteClass($id)
 {
  try {
   $query = "DELETE FROM classes WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}