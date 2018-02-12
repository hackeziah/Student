<?php

/**
* 
*/
class StudentModel 
{
	public $id;
	public $firstname;
	public $lastname;
	public $age;
	public $address;

	private $conn;

	 public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function read(){
		
		$query = "SELECT * FROM student ORDER BY lastname";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_OBJ); //FETCH_ASSOC
        return $results;
    	// $fake= [
    	// 	'id'=>1,
    	// 	'firstname'=>'Kevin',
    	// 	'lastname'=>'kahitano'
    	// 		];
    	// return $fake;

    }

    public function detail($id){
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT * FROM student WHERE id=:id";

        $stmt = $this->conn->prepare($query);   
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_OBJ); //fetch if one row expected
        return $results;
    }

     public function create(){
     		 // insert query
        $query = "INSERT INTO student (firstname, lastname, age, address) 
                    VALUES(:firstname, :lastname, :age, :address)";

        // prepare query for execution
        $stmt = $this->conn->prepare($query);

        // sanitize the input
        $firstname = filter_var($this->firstname, FILTER_SANITIZE_STRING);
        $lastname = filter_var($this->lastname, FILTER_SANITIZE_STRING);
        $age = filter_var($this->age, FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($this->address, FILTER_SANITIZE_STRING);

        // bind the parameters
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);

        // Execute the query
        return $stmt->execute();
     }

     public function update (){
     	      $query = "UPDATE student set firstname=:firstname, lastname=:lastname, age=:age, address=:address WHERE id=:id";

        // prepare query for execution
        $stmt = $this->conn->prepare($query);

        // sanitize the input
        $id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
        $firstname = filter_var($this->firstname, FILTER_SANITIZE_STRING);
        $lastname = filter_var($this->lastname, FILTER_SANITIZE_STRING);
        $age = filter_var($this->age, FILTER_SANITIZE_NUMBER_INT);
        $address = filter_var($this->address, FILTER_SANITIZE_STRING);

        // bind the parameters
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':address', $address);

        // Execute the query
        return $stmt->execute();

     }
	
	public function delete($id){
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = "DELETE FROM student WHERE id=:id";

        $stmt = $this->conn->prepare($query);   
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $results = $stmt->fetch(PDO::FETCH_OBJ); //fetch if one row expected
        return $results;
	}
}

?>