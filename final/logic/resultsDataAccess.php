<?php
class resultsDataAccess{
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
	function getAllExamsName(){
		$sql = "SELECT * FROM `allexams` WHERE 1";
		$result = $this->connection->query($sql);
		
		return $result;
		
	}
	function getExamsQids($eid){
		//echo "m2";
		$sql = "SELECT qid FROM `exam` WHERE eid= '" . $eid. "';";
	
		$result = $this->connection->query($sql);
			//echo "r=".$result->num_rows;
		echo mysqli_error($this->connection);
		return $result;
		
	}
	
function getExamQuestion($qid){
		$sql2 = "SELECT * FROM `questions` WHERE qid= '" . $qid. "';";
		$result = $this->connection->query($sql2);
		echo mysqli_error($this->connection);
		return $result;
		
	}
function printError(){
	echo mysqli_error($this->connection);}
	

	}
?>