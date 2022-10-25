<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class ExamintionTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all exam name
 public function GetExamination()
 {
  try{
   $query = "SELECT * FROM examintions";
   $statement = $this->db->prepare($query);
   $statement->execute();
   $result = $statement->fetchAll();
   return $result;
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // create new examintion 
 public function CreateExamintion($data)
 {
  try{
   $query = "INSERT INTO examintions (exam_name, created_at, updated_at) VALUES (:exam_name, Now(), Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }
}