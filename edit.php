
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
$student = $studentModel->detail($id);

if (!$student){
  header('location: index.php');

}
?>


<div class="container">

    <div class="page-header">
    	<h2>Student Management System --EDIT--</h2>
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
    

      </tr>
    </thead>
    <tbody>
  
      <tr>
       <td><?php echo $student->id;?></td>
       <td><?php echo $student->firstname;?></td>
       <td><?php echo $student->lastname;?></td>
       <td><?php echo $student->age;?></td>
       <td><?php echo $student->address;?></td>
    

      </tr>
      
      
    </tbody>
  </table>
  <form action="transact.php" method="POST">

      <input type="hidden" name="id" value="<?php echo $student->id; ?>">
      <input type="hidden" name="type" value="update">
      <input type="hidden" name="location" value="index.php">

      <label>firstname</label>
      <input type="text" name="firstname" value="<?php echo $student->firstname; ?>">
      <br>
      <label>lastname</label>
      <input type="text" name="lastname" value="<?php echo $student->lastname; ?>">
      <br>
      <label>age</label>
      <input type="text" name="age" value="<?php echo $student->age; ?>">
      <br>
      <label>address</label>
      <input type="text" name="address" value="<?php echo $student->address; ?>">
      <br>
      <button type="submit">Update</button>
    </form>

<?php
include 'footer.php';
?>