<?php

include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';

render::renderheader("طراحی آزمون",'<link href="./statics/design.css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="./ForumLogic/style.css"><link href="./ForumLogic/jasny-bootstrap.min.css" rel="stylesheet"><script src="./ForumLogic/main.js"></script>');

include_once $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/designExam.php' ;
$e=new designExam();
$e->addQuestion();
?>
<div  id="main" class="panel panel-default" dir="rtl" style="height:540px;" > 
<h3>مشخصات آزمون</h3>
<div class="container-fluid songs-container" style="
    margin-top: 4em;
">
  <div id="content" style="display: inline; position:absolute;top:25%;right:20%">

			<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form_settings">
				متن سوال:<br>
				<br><textarea  name="question" style="width:20em; height:5em;"></textarea>
				<br>
				<br>
				گزینه1:<input type="text" name="a1">
				<br>
				<br>
				گزینه2:<input type="text" name="a2">
				<br>
				<br>
				گزینه3<input type="text" name="a3">
				<br>
				<br>
			
				پاسخ:
				<input list="browsers" name="true_a" style="width:2em;">
				<datalist id="browsers">
				<option value="1">
				<option value="2">
				<option value="3">
				</datalist>
				<br><br>
				<p><input type="submit" value="بعدی(ذخیره)" class="btn btn-success">
				<a href="/l2"><input type="button" onclick="myFunction()" value="پایان" class="btn btn-danger"></a></p>

				
				</div>
			</form>
      </div>
	  <div id="tozih" dir=rtl>
	  <p>مرحله ی دوم<p>
	  در این مرحله برای طراحی هر سوال،موارد خواسته شده را کامل کرده و بعدی (ذخیره)را انتخاب کنید.
	  <br/>
	  در پایان ثبت سوالات ،بعدی(ذخیره)و سپس پایان را انتخاب کنید.
	  </div>
</div>
</div>
<?php


render::renderfooter();
?>