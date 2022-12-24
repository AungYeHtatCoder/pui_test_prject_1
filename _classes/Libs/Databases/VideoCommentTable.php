<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class VideoCommentTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // add vidoe comment data to database
 public function CreateVideoComment($data)
 {
  try {
   $query = "INSERT INTO video_lesson_comments (video_id, comment, user_id, created_at) VALUES (:video_id, :comment, :user_id, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }


 // Get video comment data by video id left join with users table and tr_upload_lessons table
 // public function GetVideoCommentByVideoId($id)
 // {
 //  try {
 //   $query = "SELECT * FROM video_lesson_comments WHERE video_id = :video_id";
 //   $statement = $this->db->prepare($query);
 //   $statement->execute(["video_id" => $id]);
 //   return $statement->fetchAll();
 //  } catch (PDOException $e) {
 //   return $e->getMessage();
 //  }
 // }
 
public function GetVideoCommentByVideoId($id)
 {
  $statement = $this->db->prepare("
            SELECT video_lesson_comments.*, users.name AS user, users.photo AS profile
            FROM video_lesson_comments LEFT JOIN users
            ON video_lesson_comments.user_id = users.id
            WHERE video_lesson_comments.video_id = :id
            ORDER BY video_lesson_comments.id DESC
        ");
  $statement->execute([':id' => $id]);
  $rows = $statement->fetchAll();
  return $rows;
 }
 

 // delete video comment by id
 public function DeleteVideoComment($id)
 {
  try {
   $query = "DELETE FROM video_lesson_comments WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }
}