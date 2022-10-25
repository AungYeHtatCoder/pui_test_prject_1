<?php
/**
 * Populate MySQL Table Using faker
 * 
 * @author 
 */
require_once('./vendor/autoload.php');
try{
    $count = 20;
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
    $sql = 'INSERT INTO classes (class_name, class_code,  created_at) 
    VALUES (:class_name, :class_code, :created_at)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $stmt->execute(
            [
                'class_name' => $faker->name,
                'class_code' => $faker->numberBetween(001, 20),
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