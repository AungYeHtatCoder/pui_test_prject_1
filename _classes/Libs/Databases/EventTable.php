<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class EventTable

{
private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all event 
 public function GetEventAllData()
 {
  try{
   $query = "SELECT * FROM events ORDER BY id";
   $statement = $this->db->prepare($query);
   $statement->execute();
   return $statement->fetchAll();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // add event
 public function CreateEvent($data)
 {
  try {
   $query = "INSERT INTO events (title, start, end, created_at) VALUES (:title, :start, :end, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
 
}