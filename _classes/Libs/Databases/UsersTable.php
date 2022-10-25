<?php
namespace Libs\Databases;
use PDO;
use PDOException;
class UsersTable 
{
 private $db = null;

 public function __construct($db)
 {
  $this->db = $db->connect();
 }

 // user get all data 
 public function UserAllData()
 {
    $statement = $this->db->prepare("SELECT users.*, roles.name As role, roles.value FROM users LEFT JOIN roles ON users.role_id =roles.id");
    $statement->execute();
    $rows = $statement->fetchAll();
    return $rows;
 }
 // user change role 
 public function UserChangeRole($id, $role)
{
    $statement = $this->db->prepare("UPDATE users SET role_id = :role WHERE id = :id");
    $statement->execute([':id' => $id, ':role' => $role]);
    return $statement->rowCount();
    
}
 // user change password 
 public function UserChangePassword($id, $password)
{
    $statement = $this->db->prepare("UPDATE users SET password = :password WHERE id = :id");
    $statement->bindParam(":id", $id);
    $statement->bindParam(":password", $password);
    $statement->execute();
    return $statement->rowCount();
}
 // user delete 
 public function UserDelete($id)
{
    $statement = $this->db->prepare("DELETE FROM users WHERE id = :id");
    $statement->bindParam(":id", $id);
    $statement->execute();
    return $statement->rowCount();
}

 public function UserRegister($data)
 {
  try {
   $query = "INSERT INTO users (name, email, password, phone, address, role_id, created_at) VALUES (:name, :email, :password, :phone, :address, :role_id, NOW())";
   $statement = $this->db->prepare($query);
   $statement->execute($data);
   return $this->db->lastInsertId();
  } catch (PDOException $e) {
   return $e->getMessage();
  }
 }

 public function UserLogin($email, $password)
 {
  $statement = $this->db->prepare("SELECT users.*, roles.name as role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password");
  $statement->execute([
   ':email' => $email,
   ':password' => $password
  ]);
  $row = $statement->fetch();
  return $row ?? false;
 }

 public function suspended($id)
 {
  $statement = $this->db->prepare("SELECT suspended FROM users WHERE id = :id");
  $statement->execute([
   ':id' => $id
  ]);
  $row = $statement->fetch();
  return $row->suspended;
 }


 public function updatePhoto($id, $name)
	{
		$statement = $this->db->prepare(
			"
            UPDATE users SET photo=:name WHERE id = :id"
		);
		$statement->execute([':name' => $name, ':id' => $id]);

		return $statement->rowCount();
	}

	public function updatePassword($id, $password)
	{
		$statement = $this->db->prepare(
			"
		UPDATE users SET password=:password WHERE id = :id"
		);
		$statement->execute([':password' => $password, ':id' => $id]);

		return $statement->rowCount();
	}
 
    // get data equal to role_id 


    // user detail
    public function UserDetail($id)
    {
        $statement = $this->db->prepare("SELECT users.*, roles.name As role, roles.value FROM users LEFT JOIN roles ON users.role_id =roles.id WHERE users.id = :id");
        $statement->execute([':id' => $id]);
        $row = $statement->fetch();
        return $row;
    }
    
}