<?php
include 'config/core.php';
include 'config/Database.php';
include 'models/StudentModel.php';
include 'header.php';
$database = new Database();
$connection = $database->connection();

//
$studentModel = new StudentModel($connection);



?>
<form action="transact.php" method="POST">
	<input type="hidden" name="type" value="create">
	<input type="hidden" name="location" value="index.php">

	<label>firstname</label>
	<input type="text" name="firstname" value=""required>
	<br>
	<label>lastname</label>
	<input type="text" name="lastname" value=""required>
	<br>
	<label>age</label>
	<input type="text" name="age" value="" required>
	<br>
	<label>address</label>
	<input type="text" name="address" value="" required>
	<br>
	<button type="submit">Create</button>
</form>
