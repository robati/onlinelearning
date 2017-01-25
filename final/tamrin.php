<?php
include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';
$i='<link rel="stylesheet" href="statics/flipclock.css"><script src="statics/flipclock.js"></script>	<script src="./logic/tamrinFrontControl.js"></script>';
$t="تمرین";
render::renderheader($t,$i);
?>
<div id="sheet" class="panel panel-default" dir="rtl"> 
<form id="form1" action="" method="GET">


<div id="sh1">
<?php
require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/getquestions.php' ;

$id=$_GET['id'];

$e=new getQuestions($id);
$e->getPquestions();
?>

</div>
<div id="sh2" style="height:600px">
</div>
</div>

<div id="docker">

<div id="pagingtion" class="btn-group-vertical">
<button id="m1" type="button" class="btn btn-primary btn-block" >سری اول</button>
<button id="m2" type="button" class="btn btn-primary btn-block " >سری دوم</button>
<button type="button" class="btn btn-primary btn-block disabled">سری سوم</button>
<button type="button" class="btn btn-primary btn-block disabled">سری چهارم</button>
</div>

<button id="savea" type="button"style="visibility:hidden" class="btn btn-success vasat"> ثبت</button>
<button id="canceal"  type=button style="visibility:hidden"class="btn btn-danger vasat" > انصراف</button>
<button id="toggletimer" type="button"style="visibility:hidden" class="btn btn-warning vasat" style="" > عدم نمایش تایمر</button>

<p/><p/>
<div id="result2" class="vasat"  dir="rtl">

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
<div id=vasat2>
<button id="save" type="button" class="btn btn-success vasat2"> ثبت</button>
<button id="cancel"  type=button class="btn btn-danger vasat2" > انصراف</button>
</div>
</div>
</div>

<div id="blockedbg">
</div>
   <!-- alerts -->
<div id="savealert" class="warning" dir=rtl >
<p class="warning-onvan">
هشدار</p>
<hr>
<p>آیا از ثبت پاسخ ها اطمینان دارید؟</p><br>

<input type="submit" class="btn btn-success accept" name="ok" value="بله">
			
<button type="button" class="btn btn-danger decline">خیر</button>
</div>
<div id="discardalert" class="warning" dir=rtl>
<p class="warning-onvan">
هشدار</p>
<hr>
<p>آیا می خواهید بدون ثبت پاسخ ها از تمرین خارج شوید؟</p><br>
<button type="button" class="btn btn-success " onclick="location.href='practice.php'">بله</button>

<button type="button" class="btn btn-danger decline">خیر</button>
</div>

</form>

<?php


render::renderfooter();
?>

