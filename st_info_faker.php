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
    $sql = 'INSERT INTO students (student_name, father_name, mother_name, father_id_card_no, mother_id_card_no, phone, address, academic_year, class_id, user_id, attach_file, created_at) 
    VALUES (:student_name, :father_name, :mother_name, :father_id_card_no, :mother_id_card_no, :phone, :address, :academic_year, :class_id, :user_id, :attach_file, :created_at)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $stmt->execute(
            [
                'student_name' => $faker->name,
                'father_name' => $faker->name,
                'mother_name' => $faker->name,
                'father_id_card_no' => $faker->randomNumber(8),
                'mother_id_card_no' => $faker->randomNumber(8),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'academic_year' => $faker->year,
                'class_id' => $faker->numberBetween(1, 20),
                'user_id' => $faker->numberBetween(1, 100),
                'attach_file' => $faker->imageUrl($width = 640, $height = 480),
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