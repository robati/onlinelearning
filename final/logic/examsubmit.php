<?php
class examSubmit{
	public $db;
	public $form_data; 
	public $correctAnswersCount;
	function __construct() {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/examsDataAccess.php' ;
		$this->db=new examsDataAccess("lo");
		$this->db->createConncection();
		$this->form_data = array();
		$this->correctAnswersCount=0;
	}
	  function __destruct() {
		  $this->db->closeConnection();
	  }
	  function correct($result,$value,$key){
		  	if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					if( $row["qid"]==substr($key, 1)){
						$this->form_data[$key]=$row["correct"];
						if($row["correct"]==$value){
							$this->correctAnswersCount=$this->correctAnswersCount+1;
						}
						break; 
					}
				}
			}
			else{
				echo "error";
				$this->db->printError();
			}
	  }
	  function response2Ajax(){
		//  print_r($_POST);
		foreach($_POST as $key => $value) {
			if($key!="name"&&$key!="email"&&$key!="pass"){
			
			
			$result=$this->db->getExamQuestion(substr($key, 1));
			$this->correct($result,$value,$key);}
		}
		$this->form_data['posted'] = $this->correctAnswersCount;
		echo json_encode($this->form_data);	
		}
	  
}
 
$e=new examSubmit();
$e->response2Ajax();
 



?>
