<?php
class forumDataAcess{
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
		$this->printError();
	}
	function closeConnection(){
		$this->connection->close();
	}
	function addQuestion($uid,$text,$pid){ //
		$sql = "INSERT INTO `fsoal`(`uid`, `soal` ,`c_counter`) VALUES ('$uid','$text','0')"; //ezafe mishe be forumq ham
		$this->query($sql);
		$sql = "SELECT * FROM `fsoal` ;";
		$result = $this->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$lastId=$row["sid"];
			}}
		$sid=$lastId;
		$sql = "INSERT INTO `forumq`(`sid`, `pid`) VALUES ($sid,$pid)";
		return $this->query($sql);
	}
	function getQuestion($sid){ //
		$sql = "SELECT * FROM `fsoal` WHERE sid= '" . $sid. "';";
		return $this->query($sql);
	}
	function addAnswer($sid,$uid,$text){//
		$result=$this->getQuestion($sid);
		$row = $result->fetch_assoc();
		
		$comment=$row['comments']."<hr/>".$uid.":".$text;
		$c_Count=$row['c_counter']+1;
	
		$sql ="UPDATE `fsoal` SET `comments`='$comment',`c_counter`='$c_Count' WHERE sid= '$sid';";
		return $this->query($sql);
	
	}
	function getAllQuestions(){//
		$sql = "SELECT * FROM `fsoal` WHERE 1";
		return $this->query($sql);
		
	}
	function getQuestions($pid){
		$sql = "SELECT * FROM `fsoal` WHERE 1";
		return $this->query($sql);
		
	}
	function getForumsids($pid){ //
		//echo "m2";
		$sql = "SELECT sid FROM `forumq` WHERE pid= $pid;";
	
		$result = $this->query($sql);
			
		return $result;
		
	}
	function getForumQuestion($sid){ //
		$sql2 = "SELECT * FROM `fsoal` WHERE sid= '" . $sid. "';";
		$result = $this->query($sql2);
		return $result;
		
	}

function query($sql){//
		$result = $this->connection->query($sql);
		$this->printError();
		return $result;
}
function printError(){//
	echo mysqli_error($this->connection);}
	

	}
?>