<?php
namespace Libs\Databases;

use PDO;
use PDOException;

class StudentTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // insert into  sutdent info with file
 public function StudentInfoCreateWithFile($data)
 {
  try{
   $query = "INSERT INTO students (student_name, roll_no, father_name, mother_name, father_id_card_no, mother_id_card_no, phone, address, academic_year, class_id, attach_file, user_id, created_at) VALUES (:student_name, :roll_no, :father_name, :mother_name, :father_id_card_no, :mother_id_card_no, :phone, :address, :academic_year, :class_id, :attach_file, :user_id, Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 } 

 // Get all student data
 public function GetAllStudentData()
 {
  $statement = $this->db->prepare("
            SELECT students.*, classes.class_name, classes.class_code, users.name, users.email, users.photo FROM students 
            LEFT JOIN classes ON students.class_id = classes.id
            LEFT JOIN users ON students.user_id = users.id
        ");
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
  
 }

 // get by student details / edit
    public function GetStudentById($id)
    {
    $statement = $this->db->prepare("
                SELECT students.*, classes.class_name, classes.class_code, users.name, users.email, users.photo FROM students 
                LEFT JOIN classes ON students.class_id = classes.id
                LEFT JOIN users ON students.user_id = users.id
                WHERE students.id = :id
            ");
    $statement->execute([':id' => $id]);
    $row = $statement->fetch();
    return $row;
    }

// student info update
    public function StudentInfoUpdate($data)
    {
        try{
            $query = "UPDATE students SET student_name = :student_name, father_name = :father_name, mother_name = :mother_name, father_id_card_no = :father_id_card_no, mother_id_card_no = :mother_id_card_no, phone = :phone, address = :address, academic_year = :academic_year, class_id = :class_id, user_id = :user_id, attach_file = :attach_file WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $statement->rowCount();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

}