
<?php
include 'config/core.php';
include 'config/Database.php';
include 'models/StudentModel.php';
include 'header.php';
$database = new Database();
$connection = $database->connection();

//
$studentModel = new StudentModel($connection);
//access method
$id = $_GET['id'];
$student = $studentModel->delete($id);


if (!$student){
  header('location: index.php');

}
?>
