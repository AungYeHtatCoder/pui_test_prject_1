<?php 
include("../vendor/autoload.php");

use Libs\Databases\MySQL;
use Libs\Databases\PostTable;

$table = new PostTable(new MySQL());
$search = $_POST['search'];
$posts = $table->Search($search);


foreach ($posts as $post) 
{
 echo $post->title;
}

?>