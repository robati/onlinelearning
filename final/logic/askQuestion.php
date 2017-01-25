<?php
require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/submitText.php' ;
$e=new textSubmit();
$e->response2Ajax("question");		
		
?>