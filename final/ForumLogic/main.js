

$(document).ready(function() {

	class forumControl {
		submitText(uname,matn,sourceFile) {
			var pid=getTarget();
			console.log("sm: "+pid);
			var otherindex=index+1;
			var serializedData="name="+uname+"&matn="+matn+"&soal="+id+"&pid="+pid;
			console.log("Request: "+serializedData);
			$.post(sourceFile, serializedData, function(response) {
					console.log("Response: "+response);
					var msg = $.parseJSON(response);
			});
				
			}
		 validateForm(x){
		
			if(x==""){
			$("#error").text("لطفا موارد خواسته شده را تکمیل کنید");
				console.log("na");
			return false;
		
			}
			console.log("yes");
			
			return true;
			}
		 getInput(name){
			 var x=$(name).val().replace(/[\*\\\/\"\'<>]/gi, ' '); 
			 return x;
			}
		 emptyAllfields(){
			 $("#qNAME").val("");
			 $("#ansNAME").val("");
			 $("#ans").val("");
			 $("#question").val("");
			 
			}
		
		 addQuestion(){
			 
			//var f=new forumControl();
			var x=this.getInput("#question");
			var y=this.getInput("#qNAME");
			if(this.validateForm(x)){
				$("#error").text("");
				$("#myTable").find('tbody')
					.append('<tr class="special"><td>'+x+'</td><td>'+y+'</td><td class="rowlink-skip">0<br/><button class="btn btn-success btn-xs javab" >نظردهید</button></td></tr> ');
				
				this.submitText(y,x,'/l2/logic/askQuestion.php');
				this.emptyAllfields();
				$("#new").hide();
				}
			
			}
		addAnswer(){
			var y=this.getInput("#ans");
			var x=this.getInput("#ansNAME");
			if(this.validateForm(y)){
			
				$("#error").text("");
			$(".pasokh").eq(index).append('<hr>'+x+':'+y);
	
			this.submitText(x,y,'/l2/logic/answer.php');
			this.emptyAllfields()
			$("#newanswer").hide();
				}
			}
			getID(item) {
				return $(item).attr('id');
			}}

	var index;
	var id;
	//alert()
	//alert(id);
var f=new forumControl();

$(".special").on('click', function() {
	index = $( ".special" ).index( this );
		    $(".pasokh").eq(index).show();
	//id= $( ".special" ).index( this ).attr('id');
	id=f.getID(this);
	
});

$("#addTopic").on("click", function() {//ezafe kardane soal
		  $("#new").show();
		   $(".pasokh,#newanswer").hide();
	  });
	  
$("#insert").on("click", function() { //ezafe kardane soal->ok
		 
		 f.addQuestion();
		
		
 });
	$( document ).on( 'click', '.javab', function() {
											//ezafe kardane javab
		  $("#newanswer").show();
		 
	  });
	  
$("#collapse").on("click", function() {
		  $("#new,.pasokh,#newanswer").hide();
	  });
	 
$("#insert2").on("click", function() { //ezafe kardane javab-> ok
		
		f.addAnswer();
		

      });
	  
 $("#cancel").on("click", function() {//ezafe kardane javab ->cancel
		  $("#newanswer").hide();
		  $("#ans").val("");
	  });
		  

	 
});


// $( "#myForm" ).unbind('submit');
			 //  $("#myForm").attr('action', "/l2/logic/answer.php/id="+index+"&");
	//	$( "#myForm" ).submit();
	// $('#myForm').on('submit', function(e){
		   // e.preventDefault();