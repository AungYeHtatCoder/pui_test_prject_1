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
    $sql = 'INSERT INTO tr_infos (tr_name, phone, secondary_phone, address, fix_address, experience, academic_year, program_id, class_id, subject_id, user_id, created_at) 
    VALUES (:tr_name, :phone, :secondary_phone, :address, :fix_address, :experience, :academic_year, :program_id, :class_id, :subject_id, :user_id, :created_at)';
    $stmt = $pdo->prepare($sql);

    for ($i=0; $i < $count; $i++) {
        $date = $faker->dateTime($max = 'now', 'UTC')->format('Y-m-d H:i:s');
        $stmt->execute(
            [
                'tr_name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'secondary_phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'fix_address' => $faker->address,
                'experience' => $faker->numberBetween(1, 10),
                'academic_year' => $faker->numberBetween(2000, 2022),
                'program_id' => $faker->numberBetween(1, 10),
                'class_id' => $faker->numberBetween(1, 20),
                'subject_id' => $faker->numberBetween(1, 20),
                'user_id' => $faker->numberBetween(1, 110),
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