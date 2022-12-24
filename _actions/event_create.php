<?php 
include('../vendor/autoload.php');
use Libs\Databases\MySQL;
use Libs\Databases\EventTable;

$data = [
 'title' => $_POST['title'],
 'start' => $_POST['start'],
 'end' => $_POST['end']
];

$event = new EventTable(new MySQL());
$event->CreateEvent($data);
if ($event) {
 echo 'Added Successfully';
}