<?php
include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';
$i='<link rel="stylesheet" href="statics/flipclock.css"><script src="statics/flipclock.js"></script>	<script src="./logic/testPageControl.js"></script><link rel="stylesheet" href="statics/design.css">';
$t="Test";
render::renderheader($t,$i);
?>
<div id="main" class="panel panel-default" dir="rtl" style="height:540px;" > 
<form id="form1" action="" method="POST">

<?php
require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/getquestions.php' ;
$time=$_GET['x'];
$id=$_GET['id'];
$e=new getQuestions($id);
if($e->getExamKey($id)=="")
	header("Location: test.php?id=$id&x=$time");
//if()
if ($_SERVER["REQUEST_METHOD"] == "POST") {


$e->checkEnrollKey();
}
?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div id="keyalert" class="warning" dir=rtl style="display:block">
<p class="warning-onvan">
هشدار</p>
<hr>
<p>لطفا رمز آزمون را وارد کنید.</p><br>
<input id="name" type="password"  name="key" >
<input type="submit" id="keysubmit" class="btn btn-success" name="ok" value="تایید">
</div>
</form>
<script>

</script>
<?php


render::renderfooter();
?>

