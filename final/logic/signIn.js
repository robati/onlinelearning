	$(document).ready(function(){
	class loginControl {
	showalert(alertName){
				$("#blockedbg").show();
				$("#"+alertName).show();
		}
	hidealert(){
			   $("#blockedbg,#loginalert").hide();
		}
		
		}
	var t=new loginControl();

$("#in").click(function(){
	t.showalert("loginalert");
		});
$("#blockedbg").click(function(){
	t.hidealert();
    	 });
			
});
