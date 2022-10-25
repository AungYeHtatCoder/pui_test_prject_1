<?php
/**
 * Populate MySQL Table Using faker
 * 
 * @author 
 */
require_once('./vendor/autoload.php');
try{
    $count = 100;
    $faker = \Faker\Factory::create();

    //Connecting MySQL Database
    $pdo  = new PDO('mysql:host=localhost;dbname=pui_1', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    //Drop the table 
    $stmt = $pdo->prepare("truncate table students");
    $stmt->execute();

    //Insert the data
    $sql = 'INSERT INTO users (name, email, password, phone, address, photo, role_id, created_at) 
    VALUES (:name, :email, :password, :phone, :address, :photo, :role_id, :created_at)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $stmt->execute(
            [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password(8),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'photo' => $faker->imageUrl($width = 640, $height = 480),
                'role_id' => $faker->numberBetween(1, 10),
                ':created_at' => $date
            ]
        );
    }
} catch(Exception $e){
    echo '<pre>';print_r($e);echo '</pre>';exit;
}
if ($stmt->rowCount() > 0) {
    echo 'Data Inserted Successfully';
} else {
    echo 'Data Inserted Failed';
}