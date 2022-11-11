<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ProgramTable;

// fetch api data from programs table
$table = new ProgramTable(new MySQL());
$programs = $table->GetProgramAllData();
// change array to json
// echo json_encode($programs);
// if($programs)
// {
//  $response = [
//   'status' => 'success',
//   'data' => $programs
//  ];
//  echo "<pre>";
//  print_r(json_encode($response));
//  echo "</pre>";
// }
if($programs)
{
 $program_arr = array();
 //$program_arr = array();

 //$program_arr['data'] = array();
 foreach($programs as $program)
 {
  $program_item = array(
   'id' => $program->id,
   'program_name' => $program->program_name,
   
   'created_at' => date('d-m-Y', strtotime($program->created_at)),
   'updated_at' => date('d-m-Y', strtotime($program->updated_at))
  );
  array_push($program_arr, $program_item);
 }
 echo json_encode($program_arr);
}
?>