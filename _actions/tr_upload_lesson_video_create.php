<?php
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\TRUploadVideoTable;
$file_name = $_FILES['file_name']['name'];
$photo_tmp = $_FILES['file_name']['tmp_name'];
$error = $_FILES['file_name']['error'];
$type = $_FILES['file_name']['type'];
$data = [
  'title' => $_POST['title'],
  'program_id' => $_POST['program_id'],
  'class_id' => $_POST['class_id'],
  'subject_id' => $_POST['subject_id'],
  'description' => $_POST['description'],
  'academic_year' => $_POST['academic_year'],
  'user_id' => $_POST['user_id'],
  'file_name' => $file_name,
];
if ($error) {
  echo "<script>alert('Error Video')</script>";
}
if($type === "video/mp4" or $type === "video/mp3" or $type === "video/avi" or $type === "video/flv" or $type === "video/wmv" or $type === "video/mov" or $type === "video/3gp" or $type === "video/mkv" or $type === "video/webm" or $type === "video/ogg" or $type === "video/mpeg" or $type === "video/mpg" or $type === "video/m4v" or $type === "video/vob" or $type === "video/ogv" or $type === "video/m3u8" or $type === "video/ts" or $type === "video/3g2" or $type === "video/mxf" or $type === "video/roq" or $type === "video/nsv" or $type === "video/f4v" or $type === "video/f4p" or $type === "video/f4a" or $type === "video/f4b") {
 
 $table = new TRUploadVideoTable(new MySQL());
 $table->InsertTRUploadVideo($data);
 move_uploaded_file($photo_tmp, "video_lesson/$file_name");
 header("Location: ../admin/teacher_profile.php?success=true");
} else {
  echo "<script>alert('You Video Error')</script>";
  echo "<script>loaction.href = '../admin/teacher_profile.php'</script>";
//  header("Location: ../admin/teacher_profile.php?error=fale");
}