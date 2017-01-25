<?php
class textSubmit{
	public $db;
	public $form_data; 
	function __construct() {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/forumDataAccess.php' ;
		$this->db=new forumDataAcess("lo");
		$this->db->createConncection();
		}
		function response2Ajax($request){
			if($request=="question"){		
				$this->form_data["done"]=$this->db->addQuestion($_POST["name"],$_POST["matn"],$_POST["pid"]);
				}
			else if($request=="answer"){
				$this->form_data["done"]=$this->db->addAnswer($_POST["soal"],$_POST["name"],$_POST["matn"]);
				}
				
				$this->form_data['posted'] = "ok";
				echo json_encode($this->form_data);
			}
		
		}
		
//$e=new textSubmit();
//$e->response2Ajax();	
//foreach($_POST as $key => $value){	
		?>