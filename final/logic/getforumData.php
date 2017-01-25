<?php

class getforumData{
	public $db;
	public $pid;
	function __construct($id) {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/forumDataAccess.php' ;
		$this->db=new forumDataAcess("lo");
		$this->db->createConncection();
		$this->pid=$id;
	}
	  function __destruct() {
		  $this->db->closeConnection();
	  }
		  
	public function printAllTopics($result){
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				?>
				<tr class="special" id="<?= $row["sid"] ?>"><td><?= $row["soal"] ?> <div class="pasokh"><br/><?=$row["comments"] ?> </div> </td>
				<td><?= $row["uid"] ?>  </td>
				<td class="rowlink-skip"><?=  $row["c_counter"] ?> <br/><button class="btn btn-success btn-xs javab">نظردهید</button></td></tr>
				<?php
			
			} 
		} 
		/* else {
				echo "0 results";
		} */
	}

	public function showAllTopics(){
	
	$result=$this->db->getAllQuestions();
	$this->printAllTopics($result);
	
	

}

	public function getFquestions(){

	$result=$this->db->getForumsids($this->pid);
	
	if ($result->num_rows !=0) {
		while($row = $result->fetch_assoc()){
			
			$sid=$row["sid"];
			$result2 =$this->db->getForumQuestion($sid);
			//print_r($result2);
			$this->printAllTopics($result2);
		} 
	}
	/* else {
			$this->db->printError();
			echo "0 results no exam found";
		} */
	
	}
	
	
}


?>