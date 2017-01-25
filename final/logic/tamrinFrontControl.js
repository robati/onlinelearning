$(document).ready(function(){
var time=$("#time").text();
var mark;
class testControl {
	lockScreen(){
		$("input").attr('disabled','disabled');
		$("button").attr('disabled','disabled');
		$('.accept2').removeAttr('disabled');
		$('#submitAnswers,#name,#namesubmit,#email,#pass,#loginsubmit,#m1,#m2').removeAttr('disabled');
	
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
$("#m2").click(function(){
	t.changeSheet("#sh2");
    //css ro taghir bede input ha.  - age link bala ro zad bege safe ro khast bebande bege.
    });

$("#m1").click(function(){
	t.changeSheet("#sh1");
    });
	
$("#save").click(function(){
	
	t.showalert("savealert");
	
	 });
	 
	 $("#blockedbg,.decline").click(function(){
	
		
        t.hidealert();
	 });
	 $("#cancel").click(function(){
	
		t.showalert("discardalert");
	 });
	 

 $(".accept").click(function(){
	
	 event.preventDefault();
	    t.submitExam("form",'/l2/logic/examsubmit.php',$("#natije"));
		t.hidealert();
		
	 });


});