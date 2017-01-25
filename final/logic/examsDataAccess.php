<?php
class examsDataAccess{
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
	function getAllPracticeName(){
		$sql = "SELECT * FROM `alltrains` WHERE 1";
		$result = $this->connection->query($sql);
		
		return $result;
		
	}
	function getExam($id){
		$sql = "SELECT* FROM `allexams` WHERE `eid`='$id'";
		$result = $this->connection->query($sql);
		//print_r($result);
		return $result;
		
	}
	function createExam($exam,$key,$timer){
		$sql = "INSERT INTO `allexams`(`name`, `time`, `key`) VALUES ('$exam','$timer','$key')";
		$this->query($sql);
			
		$sql = "SELECT * FROM `allexams` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["eid"];
			}}
		echo $lastId;
		return $lastId;
		
	}
	function createPractice($exam){
		$sql = "INSERT INTO `alltrains`(`name`) VALUES ('$exam')";
		$this->query($sql);
			
		$sql = "SELECT * FROM `alltrains` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["id"];
			}}
		echo $lastId;
		return $lastId;
		
	}
	function createQuestion($matn,$ch1,$ch2,$ch3,$correct){
		$sql = "INSERT INTO `questions`(`text`, `ch1`, `ch2`, `ch3`, `correct`) VALUES ('$matn','$ch1','$ch2','$ch3','$correct')";
		$this->query($sql);
			
		$sql = "SELECT * FROM `questions` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["qid"];
			}}
		//echo $lastId;
		return $lastId;
	}
	function addQuestion2exam($qid,$eid){
		$sql = "INSERT INTO `exam`( `qid`, `eid`) VALUES ('$qid','$eid')";
		return $this->query($sql);
	}
	function addQuestion2practice($qid,$eid){
		$sql = "INSERT INTO `train`( `qid`, `pid`) VALUES ('$qid','$eid')";
		return $this->query($sql);
	}
	function getExamsQids($eid){
		//echo "m2";
		$sql = "SELECT qid FROM `exam` WHERE eid= '" . $eid. "';";
	
		$result = $this->connection->query($sql);
			//echo "r=".$result->num_rows;
		echo mysqli_error($this->connection);
		return $result;
		
	}
	function gettamrinQids($pid){
		//echo "m2";
		$sql = "SELECT qid FROM `train` WHERE pid= '" . $pid. "';";
	
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
	
function query($sql){
		$result = $this->connection->query($sql);
		echo mysqli_error($this->connection);
		return $result;
}
function printError(){
	echo mysqli_error($this->connection);}

	}
?>