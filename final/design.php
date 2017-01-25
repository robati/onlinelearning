<?php

include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';

render::renderheader("طراحی آزمون",'<link href="./statics/design.css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="./ForumLogic/style.css"><link href="./ForumLogic/jasny-bootstrap.min.css" rel="stylesheet"><script src="./ForumLogic/main.js"></script>');

require $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/designExam.php' ;
$e=new designExam();
$e->insertExamInfo();
?>
<div  id="main" class="panel panel-default" dir="rtl" style="height:540px; " > 
<h3>مشخصات آزمون</h3>
<div class="container-fluid songs-container" style="
    margin-top: 4em ;    
">
  <div id="content">

		<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="form_settings" dir=rtl>
			نام آزمون:<input type="text" name="exam">
			<br/>
			<br/>
			رمز:<input type="text" name="Enroll_key">
			<br/>
			<br/>
	
			زمان:<input type="number" name="timer" >
			<br/>
			<br/>
			
			به کدام بخش اضافه شود<select dir=ltr name="isTest">
			  <option value="exam">آزمون</option>
			  <option value="practice">تمرین</option>
			
			 
			</select>
  <br/><br/>
			<button type="submit" class="submit btn-success" >ثبت</button>
			
			</div>
		</form>
      </div>
	  <div id="tozih" dir=rtl>
	  <p>مرحله ی اول<p>
	  در این بخش ، در صورتی که می  خواهید آزمون طراحی کنید نام آزمون ،رمز ورود به آزمون(اختیاری) و مدت زمان آزمون( ثانیه) را ثبت کرده و سپس آزمون را انتخاب کنید.
	  <br/>
	  اما در صورتی که تمایل به طراحی تمرین دارید، تنها نام آزمون را وارد کرده و تمرین را انتخاب کنید.
	  </div>
</div>
</div>
<?php


render::renderfooter();
?>