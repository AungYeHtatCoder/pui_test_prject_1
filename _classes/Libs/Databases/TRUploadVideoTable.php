<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class TRUploadVideoTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function InsertTRUploadVideo($data)
 {
  try {
   $query = "INSERT INTO tr_upload_lessons (title, program_id, class_id, subject_id, description, academic_year,file_name,  user_id, created_at ) VALUES (:title, :program_id, :class_id, :subject_id, :description, :academic_year, :file_name, :user_id, Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }


 // get all data with join program, class, subject, user
 public function GetVideoAllData()
 {
  $statement = $this->db->prepare("
            SELECT tr_upload_lessons.*, programs.program_name, classes.class_name, classes.class_code, subjects.subject_name, subjects.subject_code, users.name, users.email
            FROM tr_upload_lessons 
            LEFT JOIN programs ON tr_upload_lessons.program_id = programs.id
            LEFT JOIN classes ON tr_upload_lessons.class_id = classes.id
            LEFT JOIN subjects ON tr_upload_lessons.subject_id = subjects.id
            LEFT JOIN users ON tr_upload_lessons.user_id = users.id
        ");
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
  
 }

 // delete upload video lesson
 public function DeleteVideo($id)
 {
  try {
   $query = "DELETE FROM tr_upload_lessons WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return true;
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}