if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }

//when the form is submitted
$(document).ready(function(){
	var con1 = false;
	var con2 = false;
	var con3 = false;
	var con4 = false;
	$("#mail").val("");
	$("#email").val("");

	$('form').submit(function (evt) {
			if (!con1||!con2||!con3||!con4||$("#name").val()=="")
		   		evt.preventDefault(); //prevents the default action

		   	if ($("#name").val()=="")
		   		$("#result1").html("Must have name");
		   	else
		   		$("#result1").html("");

		   	if (!con1)
		   		$("#result2").html("Wrong format email");
		   	if (!con2)
		   		$("#result3").html("Wrong format password");
		   	if (!con3)
		   		$("#result3").html("Password too short");
		   	if (!con4)
		   		$("#result4").html("Re-Password not match");
	});

  $("#name").keyup(function(){
      if (this.value=="")
        $("#result1").html("Must have name");
      else
        $("#result1").html("");
    });

	$("#email").keyup(function(){
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var x = regex.test(this.value);
        if(!x){
        	$("#result2").html("Wrong format email");
        	con1 = false;
        }
        else{
        	$("#result2").html("");
        	con1 = true;
        }
  });

  $("#pass").keyup(function(){
		var regex = /^[a-zA-Z0-9]+$/;
		var x = regex.test(this.value);
        if(!x){
        	$("#result3").html("Wrong format password");
        	con2 = false;
        }
        else if (this.value.length<8){
        	$("#result3").html("Password too short");
        	con3 = false;
        }
        else{
        	$("#result3").html("");
        	con2 = true;
        	con3 = true;
        }
  }); 

  $("#repass").keyup(function(){
   		if (this.value!=$("#pass").val()){
   			$("#result4").html("Re-Password not match");
   			con4= false;
   		}
   		else{
   			$("#result4").html("");
   			con4 = true;
   		}
  });
});			



