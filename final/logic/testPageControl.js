$(document).ready(function(){
var time=$("#time").text();
var mark;
class testControl {
	lockScreen(){
		$("input").attr('disabled','disabled');
		$("button").attr('disabled','disabled');
		$('.accept2').removeAttr('disabled');
		$('#submitAnswers,#name,#namesubmit,#email,#pass,#loginsubmit').removeAttr('disabled');
	
	}
		showResult(mark,place){
				place.text("تعداد جواب های درست:"+mark);
				place.append("<br/><br/>امتیاز:"+mark*2+"<br/><br/><p>آفرین!</p>");
				$(".sehat,#natije").show();
		}
		showCorrectAnswer(answers){
				$.each( answers, function( key, value ) {		
					$( "#sehat"+key.substr(1) ).text(value);
			});
		}
	submitExam(formName,sourceFile,resultHolder) {
		var serializedData=$(formName ).serialize();
		console.log("Req: "+serializedData);
		$.post(sourceFile, serializedData, function(response) {
		var t=new testControl();
				console.log("Response: "+response);
				var msg = $.parseJSON(response);
				t.showResult(msg.posted,resultHolder);
				t.showCorrectAnswer(msg)
				mark=msg.posted;
			
		});
		this.lockScreen();
		
		}
		showalert(alertName){
				$("#blockedbg").show();
				$("#"+alertName).show();
		}
		hidealert(){
			   $("#blockedbg,.warning,#loginalert").hide();
		}
		
		toggleTimer(oddClock,buttonid){
			if(oddClick){
				 $(".flip-clock-wrapper").css("visibility","hidden");
				$("#"+buttonid).html("نمایش تایمر");
				oddClick = false;
			}
			else{
				$(".flip-clock-wrapper").css("visibility","visible");
				$("#"+buttonid).html("عدم نمایش تایمر");
				oddClick=true;}
				return oddClick;
		}
			 changeSheet(a){
	$("#sh1").hide();
	$("#sh2").hide();
	$(a).show();
}

}

var t=new testControl();

$("#save").click(function(){
	t.showalert("savealert");
		});
$("#blockedbg,.decline,.accept2").click(function(){
	t.hidealert();
    	 });
$("#cancel").click(function(){
	t.showalert("discardalert");
		 });
var oddClick = true;
$("#toggletimer").click(function(){
	oddClick= t.toggleTimer(oddClick,"toggletimer");
		});
 $(".accept").click(function(event){
	   event.preventDefault();
	    clock.stop();
		t.hidealert();
		
	 });
var clock = $('.clock').FlipClock(time, {
	clockFace: 'MinuteCounter',
	countdown: true,
	//autoStart :false,
	 callbacks: {
		        	stop: function() {
							t.showalert("timealert")
							t.submitExam("form",'/l2/logic/examsubmit.php',$("#natije"));
							
	
							
		        	}
		        }
	
});
$("#submitAnswers").click(function(e){
	e.preventDefault();
	t.showalert("submitalert");
	
   // $('#form1').attr('target','_blank');
});

  
  $("#namesubmit").click(function(e){          ////////////////////////////////not compelete
	 e.preventDefault();
	 name=$("input:text").val();
	 //alert(name);
	 post('/l2/testResult.php', {'name': name ,'nomre' : mark,'id':getTarget()},'get');
	
		}); 

function post(path, params, method) {      ////////////////////////////////not used
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}		
		});