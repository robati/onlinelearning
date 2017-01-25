<?php

include $_SERVER['DOCUMENT_ROOT'] . '/l2/logic/layout.php';

render::renderheader("آزمون ها",'<link href="./ForumLogic/css" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="./ForumLogic/style.css"><link href="./ForumLogic/jasny-bootstrap.min.css" rel="stylesheet"><script src="./ForumLogic/main.js"></script>');
?>

<div  id="main" class="panel panel-default" dir="rtl" style="height:540px;;" > 
<div style="
    width: 30%;
    margin: auto;
    margin-top: 20%;
    color: red;
">
برای ثبت نام جهت طرح آزمون و تمرین با ایمیل info@onlinelearning.ir تماس حاصل فرمایید.
</div>
</div>
<?php
render::renderfooter();
?>