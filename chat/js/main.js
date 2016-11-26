//================================================================================================================================================================//
//================================================================================================================================================================//
//=======================================|__________________________________________________________________________|=============================================//
//=======================================|__________________________________________________________________________| ============================================//
//***************************************|                                                                          |*********************************************//
//***************************************|	Project Name       	: 	Chat 											|*********************************************//
//***************************************|	File Or Class Name 	:	main.js 										|*********************************************//
//***************************************|	Copyright          	:	Copyright © 2016								|*********************************************//
//***************************************|__________________________________________________________________________|*********************************************//
//=======================================																			 =============================================//
//================================================================================================================================================================//
//================================================================================================================================================================//

$(function (){
	var data = {};
	$('#loginButton').bind('click', function (){
		validateLogin();
	});

	$('#registerButton').bind('click', function (){
		validateRegister();
	});
});


var sendRequest = function(params, caller){
	$.ajax({
		type: "POST",
	    url: "request.php",   
	    data: params,
	    async: true,
	    statusCode: {
	        404: function() {
	    		alert( "page not found" );
	        }
		},
		success: function(response){
			callback(response, caller);
		}
	});	
}

var callback	=	function (response, caller){
	if(caller == 1){//Register
		if(response == 1){
			location.href = "index.php?param=1";
		}
		else{
			$('#error').html('Registration faild. Please try again!!!.');
		}
	}
	else{ // Login
		if(response == 2){
			$('#error').html('Login failed');
		}
		else{
			location.href = "chat.php";
		}
	} 
}

var validateLogin = function (){
	data = {}; 
	var uname, pwd;
	uname	=	$('#username').val().trim();
	pwd		=	$('#pwd').val().trim();
	if(pwd == ""){
		alert("Please enter username");
		return false;
	}
	else if(uname == ""){
		alert("Please enter password");
		return false;
	}
	data.request = 2
	data.username = uname;
	data.pwd = encodeURI(pwd);
	sendRequest(data, 2);
}

var validateRegister	=	function (){
	data = {};
	var email, pwd, fname, lname, cpwd;
	fname	=	$('#firstName').val().trim();
	lname	=	$('#lastName').val().trim();
	email	=	$('#userMail').val().trim();
	pwd		=	$('#password').val().trim();
	cpwd	=	$('#c_password').val().trim();
	
	if(fname == ""){
		alert("Please enter first name");
		return false;
	}
	else if(lname == ""){
		alert("Please enter second name");
		return false;
	}
	else if(email == ""){
		alert("Please enter email address");
		return false;
	}
	else if(pwd == ""){
		alert("Please enter password");
		return false;
	}
	else if(cpwd== ""){
		alert("Please enter confirm password");
		return false;
	}

	if(pwd != cpwd){
		alert("Pasword doesn't match");
		return false;
	}
	
	data.request = 1;
	data.fname 	= fname;
	data.lname	= lname;
	data.email	= email;
	data.pwd 	= encodeURI(pwd);
	sendRequest(data, 1);
}