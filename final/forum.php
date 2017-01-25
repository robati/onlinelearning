<?php

include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';

render::renderheader("تالار گفت و گو",'<link href="./ForumLogic/css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="./ForumLogic/style.css"><link href="./ForumLogic/jasny-bootstrap.min.css" rel="stylesheet"><script src="./ForumLogic/main.js"></script>');
?>

<div class="container-fluid songs-container" style="
    margin-top: 4em;
">

    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills" style="margin-bottom: 10px;">
			<li role="presentation" id="addTopic" class="active"><a >+سوال جدید </a></li>
                <li id ="collapse" role="presentation" class="active"><a>نمای کلی</a></li>
		<li id="error" ></li> 
            </ul>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-body">
             
					<table class="table table-striped table-bordered table-hover" id="myTable" dir="rtl">
  <thead >
 <tr >
                                <th class="centerr">سوال</th >
                                <th class="centerr">نویسنده</th>
		
                                <th class="centerr">تعداد پاسخ ها</th>

                            </tr>
  </thead>
  <tbody  class="rowlink">
  
	<?php

require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/getforumData.php' ;
$id=$_GET['id'];
$e=new getforumData($id);

$e->getFquestions();
//$e->showAllTopics();
?>
 
     
  </tbody>
</table>
<div id="new"dir="rtl">نام شما<input type="text"   id="qNAME">سوال<input type="text" class="form-control question" id="question"/><button id="insert"> سوال بپرسید</button></div>
                </div>
            </div>

        </div>

    </div>

</div>

<div id="newanswer" dir=rtl>نام شما<input type="text" class="form-control" id="ansNAME" name="name"style="width:20% ;display:inline;"> <br/>متن پاسخ :<input type="text" class="form-control" name="text" id="ans"><br/><br/><button  id="insert2" class="btn btn-success accept" > ثبت پاسخ</button><button id="cancel" class="btn btn-danger decline"> بیخیال</button></div>


</div>
<script>
function getTarget() {
    var targetParam = "<?php  echo $_GET['id'];  ?>";
    return targetParam;
}
</script>
<?php
render::renderfooter();
?>

