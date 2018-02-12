
<?php
include 'config/core.php';
include 'config/Database.php';
include 'models/StudentModel.php';
include 'header.php';
$database = new Database();
$connection = $database->connection();

//
$studentModel = new StudentModel($connection);
// validate if posted or not
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('location: index.php');
}

// var_dump($_POST);

$type = $_POST['type'];
$location = $_POST['location'];
switch ($type) {
	case 'create':
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$address = $_POST['address'];

		$studentModel->firstname = $firstname;
		$studentModel->lastname = $lastname;
		$studentModel->age = $age;
		$studentModel->address = $address;

		if ($studentModel->create()) {
			echo "OK";
		} else {
			echo "failed";
		}
		break;
	case 'update':

		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$address = $_POST['address'];

		$studentModel->id = $id;
		$studentModel->firstname = $firstname;
		$studentModel->lastname = $lastname;
		$studentModel->age = $age;
		$studentModel->address = $address;
		$studentModel->update();
		break;
	case 'delete':


		break;	
	default:
		# code...
		break;
}
header('location: ' .$location);