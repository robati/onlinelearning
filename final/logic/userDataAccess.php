<?php
class userDataAccess{
	public $connection;
	public  $database;
	function __construct($db) {
		$this->database=$db;
	}
	function createConncection(){

		$servername = "localhost";
		$conn = new mysqli($servername, "root","",$this->database);
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		$this->connection=$conn;
		
	}
	function closeConnection(){
		$this->connection->close();
	}
	/*function isPasswordRight($email,$pass){
		$sql = "SELECT * FROM `user` WHERE 'email'=$email";// AND 'password'=$pass";
		$result = $this->query($sql);
		return mysqli_num_rows($result);
	}*/
	function getPass($email){
		$sql = "SELECT * FROM `user` ";//WHERE 'email'=$email";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				if($row["email"]==$email)
				$lastId=$row["password"];
			}}
		//echo $lastId;
		return $lastId;
		
	}
	
function query($sql){
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		return $result;
}
function printError(){
	echo mysqli_error($this->connection);}
	

	}
?>