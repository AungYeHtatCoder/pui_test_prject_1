<?php 
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Libs\Databases\TRUploadVideoTable;

$table = new TRUploadVideoTable(new MySQL());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $table->DeleteVideo($id);
    header("Location: ../admin/tr_video_lesson_index.php?success_delete=true");
} else {
    header("Location: ../admin/tr_video_lesson_index.php?error=true");
}