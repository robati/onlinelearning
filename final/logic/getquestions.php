<?php


class getQuestions{
	public $db;
	public $eid;
	function __construct($id) {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/examsDataAccess.php' ;
		$this->db=new examsDataAccess("lo");
		$this->db->createConncection();
		$this->eid =$id;
		
	
	}
	  function __destruct() {
		  $this->db->closeConnection();
	  }
	function getExamKey($id){
			$id=$_GET['id'];
			$result=$this->db-> getExam($id);
			$row = mysqli_fetch_assoc($result);
			return $row['key'];
	}	 
	public function checkEnrollKey(){
		$time=$_GET['x'];
		$id=$_GET['id'];
		$password=$_POST['key'];
		$key=$this->getExamKey($id);
		//echo $key;
			if($key==$password){	
				header("Location: test.php?id=$id&x=$time");
			}
			
				else{
					echo "<p style='color:red;'>پسورد وارد شده نادرست است</p>";
				}
				//	header("Location: examkey.php?id=$id&x=$time");
			

		}
	public function printQuestion($result2){
		if ($result2->num_rows !=0) {
			while($row = mysqli_fetch_assoc($result2)){
				echo '<div class="soal">
					<li ><p>
					' . $row["text"]. '
					<p></li><br>
					<ol>
					<li><input type="radio" name="s' . $row["qid"]. '" id="r' . $row["qid"]. '1" value="1" />
					<label for="r' . $row["qid"]. '1" >
					' . $row["ch1"]. '
					</label></li>
					<li><input type="radio" name="s' . $row["qid"]. '"  id="r' . $row["qid"]. '2" value="2" checked="checked"/>
					<label for="r' . $row["qid"]. '2" >
					' . $row["ch2"]. '
					</label></li>
					<li><input type="radio" name="s' . $row["qid"]. '" id="r' . $row["qid"]. '3" value="3" />
					<label for="r' . $row["qid"]. '3" class="css-label radGroup2">
					' . $row["ch3"]. '
					</label></li>
					</ol>
					</div>  
					<div class="sehat">
					گزینه ی درست
					<span id="sehat' . $row["qid"]. '" ></span> 
					است
					</div>
					<p/>';
			
			} 
		}
		else {
			echo mysqli_error($conn);
			echo "0 results";
		}

		
   } 
	

	public function getEquestions(){
	$result=$this->db->getExamsQids($this->eid);
	if ($result->num_rows !=0) {
		while($row = $result->fetch_assoc()){
			$qid=$row["qid"];
			$result2 =$this->db->getExamQuestion($qid);
			$this->printQuestion($result2);

		
		} 
	}
	else {
			$this->db->printError();
			echo "0 results no exam found";
		}
	
	}
	public function getPquestions(){

	//
	$result=$this->db->gettamrinQids($this->eid);
	//print_r($result);
	//echo $this->eid;
	if ($result->num_rows !=0) {
		while($row = $result->fetch_assoc()){
			$qid=$row["qid"];
			$result2 =$this->db->getExamQuestion($qid);
			$this->printQuestion($result2);

		
		} 
	}
	else {
			$this->db->printError();
			echo "0 results no exam found";
		}
	
	}
}


?>