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
	
	var users	=	$('#userArray').val();
	if(users.trim() != ""){
		var obj	=	JSON.parse(users);
		var attr	=	0;
		for(var key in obj){
			attr = attr+1;
			$('#users').append('<li class="list-group-item cursorPointer userList" data-attr="attr'+attr+'">'+obj[key]+"</li>")
			$('#chatTextArea').append('<div class="form-control resizeNone displayNone textArea" disabled data-attr="attr'+attr+'"></div>');
		}
	}

	$('#chatButton').bind('click', function (){
		insertChat();
		event.preventDefault();
	});
});

var insertChat	=	function (){
	data	=	{};
	var friendName	=	$('li.activeChatUser').html();
	var message		=	$('#messageText').val();
	data.request	=	1;
	data.friend_id	=	friendName;
	data.message	=	encodeURI(message);
	sendRequest("chatClass.php", data, 3);
}

var updateChatOnUI	=	function (){
	var data1	=	{};
	data1.request	=	2;
	var friendName	=	$('li.activeChatUser').html();
	data1.friend_id	=	friendName;
	if(friendName != "" && friendName != undefined){
		$.ajax({
			type: "POST",
		    url: "chatClass.php",   
		    data: data1,
		    async: true,
		    statusCode: {
		        404: function() {
		    		alert( "page not found" );
		        }
			},
			success: function(response){
				
				$('div.activeChatUser').append(response);
			}
		});
	}
   setTimeout('updateChatOnUI()', 1000);
}

