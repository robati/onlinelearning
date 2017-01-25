<?php
class designExam{
	public $examsDataAccess;
	function __construct() {
		include_once $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/examsDataAccess.php' ;
		$this->db=new examsDataAccess("lo");
		$this->db->createConncection();
	
	}
	  function __destruct() {
		  $this->db->closeConnection();
	  }
		  
	public function insertExamInfo(){
		
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	$exam = $_POST["exam"];
	$enroll_key = $_POST["Enroll_key"];
	$timer = $_POST["timer"];
	$test = $_POST["isTest"];
	session_start();
	$_SESSION['test']=$test;

	if($test=="exam"){
	$result=$this->db->createExam($exam,$enroll_key,$timer);
	if($result){
	$_SESSION['eid']=$result;
	header('Location: QuestionDesign.php');
	}
	}
	else if($test=="practice"){
	$result=$this->db->createPractice($exam);
	if($result){
	$_SESSION['pid']=$result;
	header('Location: QuestionDesign.php');
	}
	}
	}
	
	}
	
function addQuestion(){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$question = $_POST["question"];
	$ch1 = $_POST["a1"];
	$ch2 = $_POST["a2"];
	$ch3 = $_POST["a3"];

	$correct = $_POST["true_a"];
		session_start();
		//$_SESSION['id']!=$result;
	$result=$this->db->createQuestion($question,$ch1,$ch2,$ch3,$correct);
	if($_SESSION['test']=="exam")
	$result=$this->db->addQuestion2exam($result,$_SESSION['eid']);
	else if($_SESSION['test']=="practice")
	$result=$this->db->addQuestion2practice($result,$_SESSION['pid']);
} 
}
	
}


?>

