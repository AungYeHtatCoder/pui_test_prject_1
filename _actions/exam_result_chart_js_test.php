<?php 
header('Content-Type: application/json');
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Libs\Databases\ExamResultTable;

$exam_result_data = new ExamResultTable(new MySQL());
$exam_results = $exam_result_data->GetExamResultAllData();

// echo "<pre>";
// print_r($exam_results);
// echo "</pre>";

// $exam_result_data = array();
// $exam_result_data['labels'] = array();
// $exam_result_data['datasets'] = array();
// $exam_result_data['datasets'][0] = array();
// $exam_result_data['datasets'][0]['label'] = 'Exam Result';
// $exam_result_data['datasets'][0]['data'] = array();
// $exam_result_data['datasets'][0]['backgroundColor'] = array();
// $exam_result_data['datasets'][0]['borderColor'] = array();
// $exam_result_data['datasets'][0]['borderWidth'] = 1;

// echo json_encode($exam_result_data);
$data = array();
foreach($exam_results as $exam_result){
   $data[] = $exam_result;
   $myanmar = $exam_result->sub_myanmar;
   $english = $exam_result->sub_eng;
   $math = $exam_result->sub_math;
   $sub_scient = $exam_result->sub_scient;
   $sub_geo = $exam_result->sub_geo;
   $sub_history = $exam_result->sub_history;
   $marks = $myanmar + $english + $math + $sub_scient + $sub_geo + $sub_history;
   $total_mark = $exam_result->total = $marks;
   $grade_point = $marks / 100;
   
}

echo json_encode($data);