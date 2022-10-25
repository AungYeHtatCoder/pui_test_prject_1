<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class SubjectTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }
 

 public function GetSubjectAllData()
 {
  try{
   $query = "SELECT * FROM subjects";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // Role Create 
 public function CreateSubject($data)
 {
  try {
   $query = "INSERT INTO subjects (subject_name, subject_code, created_at) VALUES (:subject_name, :subject_code, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // GetSubjectById
 public function GetSubjectById($id)
 {
  try {
   $query = "SELECT * FROM subjects WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 // Classs Update
 public function UpdateSubject($id, $name, $code, $date)
 {
  try {
   $query = "UPDATE subjects SET subject_name = :subject_name, subject_code = :subject_code, updated_at = :updated_at WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["subject_name" => $name, "subject_code" => $code, "updated_at" => $date, "id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // show by id 
 public function ShowById($id)
 {
  try {
   $query = "SELECT * FROM subjects WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->fetch();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
 // Role Delete
 public function DeleteSubject($id)
 {
  try {
   $query = "DELETE FROM subjects WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}