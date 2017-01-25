<?php

class login{
	public $db;
		function __construct() {
		require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/userDataAccess.php' ;
		$this->db=new userDataAccess("lo");
		$this->db->createConncection();
		
		
	
	}
	function goTodesingPage(){
		if (isset($_POST['email']) and isset($_POST['pass'])){
			$email = $_POST['email'];
			$password = $_POST['pass'];
			$p=$this->db->getpass($email);
			//echo "p=$p";
			if($password==$p){
				header('Location: /l2/design.php');
			}
			 else{
				header('Location: /l2/signin.php');
			} 
			
			
		
		
		}
		
			
		
	}
}
?>