<?php

namespace Libs\Databases;
use PDO;
use PDOException;

class PostTable
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // get all posts from database join with categories and users
 public function getAllPosts()
 {
  $statement = $this->db->prepare("
            SELECT posts.*, categories.category_name AS category, users.name AS user
            FROM posts LEFT JOIN categories
            ON posts.category_id = categories.id
            LEFT JOIN users
            ON posts.user_id = users.id
            ORDER BY posts.id DESC
        ");
  $statement->execute();
  $rows = $statement->fetchAll();
  return $rows;
 }

 

public function PostCreate($data)
 {
  try{
   $query = "INSERT INTO posts (title, category_id, description, file_name, user_id, created_at) VALUES (:title, :category_id, :description, :file_name, :user_id, Now())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  }catch(PDOException $e){
   return $e->getMessage();
  }
 }

 // get post by id
    public function getPostById($id)
    {
    $statement = $this->db->prepare("
                SELECT posts.*, categories.category_name AS category, users.name AS user
                FROM posts LEFT JOIN categories
                ON posts.category_id = categories.id
                LEFT JOIN users
                ON posts.user_id = users.id
                WHERE posts.id = :id
            ");
    $statement->execute([':id' => $id]);
    $row = $statement->fetch();
    return $row;
    }


    // post detete from database
//     public function PostDelete($id)
//     {
//         $statement = $this->db->prepare(
//             "DELETE posts FROM posts WHERE posts.id = :id"
//         );
//         $statement->deleteId = ['id' => $id];
//         $statement->execute();
//         return $statement->rowCount();

// }

public function PostDelete($id)
 {
  try {
   $query = "DELETE FROM posts WHERE id = :id";
   $statement = $this->db->prepare($query);
   $statement->execute(["id" => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 // post update 
//     public function PostUpdate($data, $id)
//     {   
//         $statement = $this->db->prepare(
//             "UPDATE posts SET title = :title, category_id = :category_id, description = :description, file_name = :file_name, user_id = :user_id, updated_at = Now() WHERE id = :id"
//         );
//         $statement->execute([
//             ':title' => $data['title'],
//             ':category_id' => $data['category_id'],
//             ':description' => $data['description'],
//             ':file_name' => $data['file_name'],
//             ':user_id' => $data['user_id'],
//             ':id' => $id
//         ]);
//         return $statement->rowCount;
// }

public function PostUpdate($data)
{
    $statement = $this->db->prepare("
    UPDATE posts SET title = :title, category_id = :category_id, description = :description, file_name = :file_name, user_id = :user_id, updated_at = Now() WHERE id = :id
    ");
    $statement->execute($data);
    return $statement->rowCount();
}

// file update 
public function fileUpdate($data)
{
    $statement = $this->db->prepare("
    UPDATE posts SET file_name = :file_name, updated_at = Now() WHERE id = :id
    ");
    $statement->execute($data);
    return $statement->rowCount();
}

// search posts tabale data by title
// public function searchPost($data)
// {
//     $statement = $this->db->prepare("
//     SELECT posts.*, categories.category_name AS category, users.name AS user
//     FROM posts LEFT JOIN categories
//     ON posts.category_id = categories.id
//     LEFT JOIN users
//     ON posts.user_id = users.id
//     WHERE posts.title LIKE :title
//     ORDER BY posts.id DESC
//     ");
//     $statement->execute([':title' => '%'.$data['search'].'% ']);
//     $rows = $statement->fetchAll();
//     return $rows;
// }

// post search by category
// public function searchPostByCategory($data)
// {
//     $statement = $this->db->prepare("
//     SELECT posts.*, categories.category_name AS category, users.name AS user
//     FROM posts LEFT JOIN categories
//     ON posts.category_id = categories.id
//     LEFT JOIN users
//     ON posts.user_id = users.id
//     WHERE posts.category_id = :category_id
//     ORDER BY posts.id DESC
//     ");
//     $statement->execute([':category_id' => $data['category_id']]);
//     $rows = $statement->fetchAll();
//     return $rows;
// }

// post search data

// public function SimpleSearch($search)  ->  this method working correctly
// {
//     $statement = $this->db->prepare("
//     SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%'
//     ");
//     $statement->execute();
//     $rows = $statement->fetchAll();
//     return $rows;
// }
public function Search($search)
{
    $statement = $this->db->prepare("
    SELECT posts.*, categories.category_name AS category, users.name AS user
    FROM posts LEFT JOIN categories
    ON posts.category_id = categories.id
    LEFT JOIN users
    ON posts.user_id = users.id
    WHERE title LIKE '%$search%' OR description LIKE '%$search%'
    ");
    $statement->execute();
    $rows = $statement->fetchAll();
    return $rows;
}

}
//SELECT * FROM posts WHERE title LIKE '%$search%' OR description LIKE '%$search%'