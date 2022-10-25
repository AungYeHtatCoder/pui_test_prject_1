<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class TrInfoTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all data with join program, class, subject, user
 public function GetTrInfoAllData()
 {
  $statement = $this->db->prepare("
            SELECT tr_infos.*, programs.program_name, classes.class_name, classes.class_code, subjects.subject_name, subjects.subject_code, users.name, users.email
            FROM tr_infos 
            LEFT JOIN programs ON tr_infos.program_id = programs.id
            LEFT JOIN classes ON tr_infos.class_id = classes.id
            LEFT JOIN subjects ON tr_infos.subject_id = subjects.id
            LEFT JOIN users ON tr_infos.user_id = users.id
        ");
  $statement->execute();
  $row = $statement->fetchAll();
  return $row;
  
 }

 public function InsertTrInfo($data)
 {
    try {
    $query = "INSERT INTO tr_infos (tr_name, phone, secondary_phone, address, fix_address, experience, academic_year, program_id, class_id, subject_id, user_id, created_at ) VALUES (:tr_name, :phone, :secondary_phone, :address, :fix_address, :experience, :academic_year, :program_id, :class_id, :subject_id, :user_id, Now())";
    $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }


 public function GetTrInfoDetail($id)
    {
    try {
    //$query = "SELECT * FROM tr_infos WHERE id = :id";
    $query = "SELECT tr_infos.*, programs.program_name, classes.class_name, classes.class_code, subjects.subject_name, subjects.subject_code, users.name, users.email, users.photo
            FROM tr_infos 
            LEFT JOIN programs ON tr_infos.program_id = programs.id
            LEFT JOIN classes ON tr_infos.class_id = classes.id
            LEFT JOIN subjects ON tr_infos.subject_id = subjects.id
            LEFT JOIN users ON tr_infos.user_id = users.id WHERE tr_infos.id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute(["id" => $id]);
    return $statement->fetch();
    } catch (PDOException $e) {
    return $e->getMessage();
    }
    }



    // get tr_info by id
    public function GetTrInfoById($id)
    {
    try {
    //$query = "SELECT * FROM tr_infos WHERE id = :id";
    $query = "SELECT tr_infos.*, programs.program_name, classes.class_name, subjects.subject_name, users.name, users.email
            FROM tr_infos 
            LEFT JOIN programs ON tr_infos.program_id = programs.id
            LEFT JOIN classes ON tr_infos.class_id = classes.id
            LEFT JOIN subjects ON tr_infos.subject_id = subjects.id
            LEFT JOIN users ON tr_infos.user_id = users.id WHERE tr_infos.id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute(["id" => $id]);
    return $statement->fetch();
    } catch (PDOException $e) {
    return $e->getMessage();
    }
    }


    // update tr_info
    public function UpdateTrInfo($data)
    {
    try {
    $query = "UPDATE tr_infos SET tr_name = :tr_name, phone = :phone, secondary_phone = :secondary_phone, address = :address, fix_address = :fix_address, experience = :experience, academic_year = :academic_year, program_id = :program_id, class_id = :class_id, subject_id = :subject_id, user_id = :user_id, updated_at = Now() WHERE id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute($data);
    return $statement->rowCount();
    } catch (PDOException $e) {
    return $e->getMessage();
    }
    }


    // delete tr_info
    public function DeleteTrInfo($id)
    {
    try {
    $query = "DELETE FROM tr_infos WHERE id = :id";
    $statement = $this->db->prepare($query);
    $statement->execute(["id" => $id]);
    return $statement->rowCount();
    } catch (PDOException $e) {
    return $e->getMessage();
    }
    }
    


}