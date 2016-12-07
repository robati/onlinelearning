$(document).ready(function(){
	function changeSheet(a){
	$("#sh1").hide();
	$("#sh2").hide();
	$(a).show();
}
$("#m2").click(function(){
	changeSheet("#sh2");
    //css ro taghir bede input ha.  - age link bala ro zad bege safe ro khast bebande bege.
    });

$("#m1").click(function(){
	changeSheet("#sh1");
    });
	
$("#save").click(function(){
	
	$("#blockedbg").show();
    $("#savealert").show();
	 });
	 
	 $("#blockedbg,.decline").click(function(){
	
		
        $("#blockedbg,.warning").hide();
	 });
	 $("#cancel").click(function(){
	
		 $("#blockedbg").show();
        $("#discardalert").show();
	 });
	 var oddClick = true;
	$("#toggletimer").click(function(){
	 if(oddClick){
	 $(".flip-clock-wrapper").css("visibility","hidden");
	 $("#toggletimer").html("Show timer");
	 oddClick = false;
	 }
	 else{
	 $(".flip-clock-wrapper").css("visibility","visible");
	$("#toggletimer").html("Hide timer");
	oddClick=true;}
    });

 $(".accept").click(function(){
	
		clock.stop();
		 $("#blockedbg").hide();
        $(".warning").hide();
		$(".sehat,#natije").show();
		
	 });
var clock = $('.clock').FlipClock(10, {
	clockFace: 'MinuteCounter',
	countdown: true,
	 callbacks: {
		        	stop: function() {
						 $("#blockedbg").show();
		        			$("#timealert").show();
							$(".sehat,#natije").show();
		        	}
		        }
	
});

});