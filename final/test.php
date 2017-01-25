<?php
include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';
$i='<link rel="stylesheet" href="statics/flipclock.css"><script src="statics/flipclock.js"></script>	<script src="./logic/testPageControl.js"></script>';
$t="آزمون";
render::renderheader($t,$i);
?>
<div id="sheet" class="panel panel-default" dir="rtl"> 
<form id="form1" action="" method="GET">


<div id="sh1">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/getquestions.php' ;
$time=$_GET['x'];
$id=$_GET['id'];

$e=new getQuestions($id);
$e->getEquestions();
?>

</div>
</div>

<div id="docker">

<div class="clock" ></div>
<button id="save" type="button" class="btn btn-success vasat"> ثبت</button>
<button id="cancel"  type=button class="btn btn-danger vasat" > انصراف</button>
<button id="toggletimer" type="button" class="btn btn-warning vasat" style="" > عدم نمایش تایمر</button>
<p/><p/>
<div id="result" class="vasat" dir="rtl">
زمان کل:
<p id="time"><?php echo $time; ?></p>
نتیجه:
<br/>
<br/>
<div id="natije" >

correct answers: 2<p><p>
score:  4
</p><br>
<p>Good job!</p>
</div>
</div>
<!--<button id="submitAnswers" class="btn btn-success vasat" disabled> ثبت نمره آزمون </button>-->
</div>

<div id="blockedbg">
</div>
   <!-- alerts -->
<div id="savealert" class="warning" dir=rtl >
<p class="warning-onvan">
هشدار</p>
<hr>
<p>آیا از ثبت آزمون اطمینان دارید؟</p><br>

<input type="submit" class="btn btn-success accept" name="ok" value="بله">
			
<button type="button" class="btn btn-danger decline">خیر</button>
</div>
<div id="discardalert" class="warning" dir=rtl>
<p class="warning-onvan">
هشدار</p>
<hr>
<p>آیا می خواهید بدون ثبت پاسخ ها از آزمون خارج شوید؟</p><br>
<button type="button" class="btn btn-success " onclick="location.href='home.php'">بله</button>

<button type="button" class="btn btn-danger decline">خیر</button>
</div>
<div id="timealert"class="warning" dir=rtl>
<p class="warning-onvan" >
هشدار</p>
<hr>
<p>زمان شما به پایان رسید</p><br>
<button type="button" class="btn btn-success accept2" >تایید</button>
</div>
<div id="submitalert" class="warning" dir=rtl>
<p class="warning-onvan">
هشدار</p>
<hr>
<p>لطفا نام خود را وارد کنید</p><br>
<input id="name" type="text"  name="name" >
<input type="submit" id="namesubmit" class="btn btn-success accept" name="ok" value="تایید">
</div>
</form>

<script>
function getTarget() {
    var targetParam = "<?php  echo $_GET['id'];  ?>";
    return targetParam;
}
</script>
<?php


render::renderfooter();
?>

