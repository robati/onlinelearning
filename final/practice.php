<?php

include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';

render::renderheader("تمرین ها وتالارهای گفت و گو",'<link href="./ForumLogic/css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="./ForumLogic/style.css"><link href="./ForumLogic/jasny-bootstrap.min.css" rel="stylesheet"><script src="./ForumLogic/main.js"></script>');
?>

<div  id="main" class="panel panel-default" dir="rtl" style="height:540px; overflow: scroll;" > 
<h3>تمرین ها:</h3>
<div class="container-fluid songs-container" style="
    margin-top: 4em;
">

  

    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-body">
             
					<table class="table table-striped table-bordered table-hover" id="myTable" dir="rtl">
  <thead >
 <tr >						
								 <th class="centerr"style="width: 8%;">شماره ی تمرین</th>
                                <th class="centerr">تمرین</th >
                                <th class="centerr"style="width: 8%;">پرسش و پاسخ</th>
		
                               

                            </tr>
  </thead>
  <tbody  class="rowlink">
<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/getExams.php' ;
$e=new getExams();
$e->getAllpractices();
     ?>
  </tbody>
</table>
                </div>
            </div>

        </div>

    </div>

</div>




</div>
<?php
render::renderfooter();
?>

