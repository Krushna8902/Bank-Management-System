<?php




        $name=$_POST["name"]
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "banksysphp";

	$name = $_POST['name'];
	$number = $_POST['number'];
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conformpassword = $_POST['conformpassword'];

	// Database connection
	$conn = new mysqli('localhost','root','','createuser');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into createuser(name, number,  email, password, conformpassword) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssii", $name, $number,  $email, $password, $conformpassword);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
       