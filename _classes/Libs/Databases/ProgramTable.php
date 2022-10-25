<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class ProgramTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
 

 public function GetProgramAllData()
 {
  try{
   $query = "SELECT * FROM programs";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // Role Create 
 public function CreateProgram($data)
 {
  try {
   $query = "INSERT INTO programs (program_name, created_at) VALUES (:program_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // GetRoleById
 public function GetPrgramById($id)
 {
  try {
   $query = "SELECT * FROM programs WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 // Program Update
 public function UpdateProgram($id, $name, $date)
 {
  try {
   $query = "UPDATE programs SET program_name = :program_name, updated_at = :updated_at WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute([':program_name' => $name, ':id' => $id, ':updated_at' => $date]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 // show by id 
 public function ShowProgramById($id)
 {
  try {
   $query = "SELECT * FROM programs WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
 // Role Delete
 public function DeleteProgram($id)
 {
  try {
   $query = "DELETE FROM programs WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}