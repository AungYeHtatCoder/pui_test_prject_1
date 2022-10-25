<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class CategoryTable
{
private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function GetCategoryAllData()
 {
  try{
   $query = "SELECT * FROM categories";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // insert category
 public function CreateCategory($data)
 {
  try {
   $query = "INSERT INTO categories (category_name, created_at) VALUES (:category_name, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
}