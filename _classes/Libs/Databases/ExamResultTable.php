<?php 
namespace Libs\Databases;
use PDO;
use PDOException;

class ExamResultTable
{

private $db = null;

    public function __construct($db)
    {
        $this->db = $db->connect();
    }
 // get all data join program, class, examinations, students and tr_infos with total mark group by student_id
    public function GetExamResultAllData()
    {
        $statement = $this->db->prepare("
            SELECT exam_results.*,
            programs.program_name, classes.class_name,
            classes.class_code,
            examintions.exam_name,
            students.student_name, tr_infos.tr_name
            FROM exam_results 
            LEFT JOIN programs ON exam_results.program_id = programs.id
            LEFT JOIN classes ON exam_results.class_id = classes.id
            LEFT JOIN students ON exam_results.student_id = students.id
            LEFT JOIN examintions ON exam_results.examination_id = examintions.id
            LEFT JOIN tr_infos ON exam_results.tr_infos_id = tr_infos.id
            
        ");
        $statement->execute();
        $row = $statement->fetchAll();
        return $row;
    }
    
   

    // insert into exam_results
    public function InsertExamResult($data)
    {
        try {
            $query = "INSERT INTO exam_results (program_id, student_id, class_id, sub_myanmar, sub_eng, sub_math, sub_scient, sub_geo, sub_history, examination_id, exam_date, exam_time, academic_year, tr_infos_id, created_at ) VALUES (:program_id, :student_id, :class_id, :sub_myanmar, :sub_eng, :sub_math, :sub_scient, :sub_geo, :sub_history, :examination_id, :exam_date, :exam_time, :academic_year, :tr_infos_id, Now())";
            $statement = $this->db->prepare($query);
            $statement->execute($data);
            return $this->db->lastInsertId();
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }


    // eaxm result by student id
public function GetExamResultByStudentId($id)
{
    $statement = $this->db->prepare("
            SELECT exam_results.*, SUM(exam_results.sub_myanmar + exam_results.sub_eng + exam_results.sub_math + exam_results.sub_scient + exam_results.sub_geo + exam_results.sub_history) AS total_marks,
            programs.program_name, students.student_name, classes.class_name, classes.class_code, examintions.exam_name, 
            tr_infos.tr_name FROM exam_results 
            LEFT JOIN programs ON exam_results.program_id = programs.id
            LEFT JOIN students ON exam_results.student_id = students.id
            LEFT JOIN classes ON exam_results.class_id = classes.id
            LEFT JOIN examintions ON exam_results.examination_id = examintions.id
            LEFT JOIN tr_infos ON exam_results.tr_infos_id = tr_infos.id
            WHERE exam_results.id = :id
            
        ");
    $statement->execute([
        ':id' => $id
    ]);
    $row = $statement->fetch();
    return $row;
}

// update exam_result by id
 public function UpdateExamResult($data)
 {
    try {
        $query = "UPDATE exam_results SET program_id = :program_id, student_id = :student_id, class_id = :class_id, sub_myanmar = :sub_myanmar, sub_eng = :sub_eng, sub_math = :sub_math, sub_scient = :sub_scient, sub_geo = :sub_geo, sub_history = :sub_history, examination_id = :examination_id, exam_date = :exam_date, exam_time = :exam_time, academic_year = :academic_year, tr_infos_id = :tr_infos_id, updated_at = Now() WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
        return $statement->rowCount();
    } catch (PDOException $e) {
        return $e->getMessage();
    }
     
 }
}