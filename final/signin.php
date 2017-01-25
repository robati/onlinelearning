<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title><?= $title ?></title>
<link rel="shortcut icon" type="image/x-icon" href="statics/s.png" />
<link rel="stylesheet" href="statics/bootstrap.min.css">
<script src="statics/jquery.min.js"></script>
<script src="statics/bootstrap.min.js"></script>
<!--
<script src="logic/signIn.js"></script>
-->
<?php echo $includes ?>
<link rel="stylesheet"  href="statics/test.css">
<link rel="stylesheet" href="statics/fonts.css" type="text/css" charset="utf-8" />
<link href="statics/css" rel="stylesheet" type="text/css">
</head>

<body>

<header>
	<!-- Navbar -->
	<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggled="collapse" data-target="#navbar-collapse" aria-expanded="false" >
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>		
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>
				<a href="" class="navbar-brand">Online Learning</a>
			</div><!--navbar header-->
			
			<div class="collapse navbar-collapse navbar-left" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="home.php">&nbsp;  آزمون</a></li>
					<li>
						<a href="practice.php"> &nbsp; دوره ها</a>
						
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a id="in"> &nbsp; ورود</a></li>
					<li><a href="signup.php"> &nbsp; ثبت نام</a></li>
				</ul>
			</div>
		</div>
	</nav>


</header>
<body>
<div id="blockedbg">
</div>







<div  id="main" class="panel panel-default" dir="rtl" style="height:540px;;" > 

<div style="
    
    color: red;
">
اطلاعات وارد شده نادرست است.
</div>
<form method="POST">
<div id="loginalert" style="display:block" >
<p class="warning-onvan">
ورود به بخش طراحی سوال</p>
<hr>
<span>
<?php 

 require_once('logic/login.php');
$login=new login();
$login->goTodesingPage();
?>
</span>
<p dir="ltr">
<input id="email" type="text"  name="email" >ایمیل</p>
<p dir="ltr">
<input id="pass" type="password"  name="pass" style="width:60%;">رمز</p>
<input type="submit" id="loginsubmit" class="btn btn-success accept" name="ok" value="تایید">
</div>
</form>

</div>
<?php
render::renderfooter();
?>