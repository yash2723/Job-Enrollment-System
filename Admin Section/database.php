<?php	
		$servername = 'localhost';
		$username = 'root';
		$dbase = 'searchbar';
		$pass = '';
		// Create connection
		$conn = new mysqli($servername, $username, $pass, $dbase);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "Successfully Connected.";
}
	
?>