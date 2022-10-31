<?php 
namespace Libs\Databases;

use PDO;
use PDOException;

class CommentsTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 public function CommentCreate($data)
 {
  try{
   $query = "INSERT INTO comments (user_id, post_id, comment, created_at) VALUES (:user_id, :post_id, :comment,  Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // get post comments by post id left join with users table
 public function getPostComments($id)
 {
  $statement = $this->db->prepare("
            SELECT comments.*, users.name AS user, users.photo AS profile
            FROM comments LEFT JOIN users
            ON comments.user_id = users.id
            WHERE comments.post_id = :id
            ORDER BY comments.id DESC
        ");
  $statement->execute([':id' => $id]);
  $rows = $statement->fetchAll();
  return $rows;
 }

 // delete comment by id
    public function deleteComment($id)
    {
    $statement = $this->db->prepare("DELETE FROM comments WHERE id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount();
    }
 
 
}