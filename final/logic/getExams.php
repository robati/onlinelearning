<?php

class getExams{
	public $examsDataAccess;
	function __construct() {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/examsDataAccess.php' ;
		$this->db=new examsDataAccess("lo");
		$this->db->createConncection();
	
	}
	  function __destruct() {
		  $this->db->closeConnection();
	  }
		  
	public function printExamNames($result){
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {?>
					<tr id="in" class="special" onclick="document.location = 'examkey.php?id=<?= $row["eid"] ?>&x=<?=$row["time"]?>';">
					<td><?= $row["eid"] ?></td>
					<td><?= $row["name"] ?> </td>
					<td><?= $row["time"] ?> </td></tr>
			<?php
			} 
		} 
		else {
				echo "0 results";
		}
	}

	public function getAllexams(){
	
	$result=$this->db->getAllExamsName();
	
	$this->printExamNames($result);
	
	

}
	public function printPracticeNames($result){
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {?>
					<tr id="in" class="special" >
					<td onclick="document.location ='tamrin.php?id=<?= $row["id"] ?>';"><?= $row["id"] ?></td>
					<td style="cursor:auto"><?= $row["name"] ?> </td>
					<td style="width:38%"onclick="document.location ='forum.php?id=<?= $row["id"] ?>';">برای ورود به تالار گفت و گو کلیک کنید </td>
					</tr>
			<?php
			} 
		} 
		else {
				echo "0 results";
		}
	}

	public function getAllpractices(){
	
	$result=$this->db->getAllPracticeName();
	$this->printPracticeNames($result);
	
	

}
	
	
}


?>