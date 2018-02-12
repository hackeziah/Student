
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
$students = $studentModel->read();

var_dump($students)
?>


<div class="container">

    <div class="page-header">
    	<h2>Student Management System</h2>
    	<?php echo date('Y-m-d H:i:s');?>
    	<a href="create.php">Create Name</a> 
				
    </div>

</div>
<!-- <a href="create.php?id=<?php echo $student->id; ?>">Edit</a> |  -->
				
<table class="table table-striped">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Address</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
    	<?php foreach($students as $student){?>
      <tr>
       <td><?php echo $student->id;?></td>
       <td><?php echo $student->firstname;?></td>
       <td><?php echo $student->lastname;?></td>
       <td><?php echo $student->age;?></td>
       <td><?php echo $student->address;?></td>
       <td colspan="2">
       <a href="edit.php?id=<?php echo $student->id; ?>">Edit</a> | 
		<a href="delete.php?id=<?php echo $student->id; ?>">Delete</a>
       </td>

      </tr>
     <?php }?>
    </tbody>
  </table>

<?php
include 'footer.php';
?>