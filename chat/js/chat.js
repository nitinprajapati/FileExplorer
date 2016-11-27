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
	var data	=	{};
	var users	=	$('#userArray').val();
	if(users.trim() != ""){
		var obj	=	JSON.parse(users), attr	=	0;
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

/**
 * Insert the chat messages into database
 * */
var insertChat	=	function (){
	var friendName, message;
	data = {};
	friendName	=	$('li.activeChatUser').html();
	message		=	$('#messageText').val();
	data.request	=	1;
	data.friend_id	=	friendName;
	data.message	=	encodeURI(message);
	sendRequest("chatClass.php", data, 3);
}


var updateChatOnUI	=	function (){
	var friendName	=	$('li.activeChatUser').html();
	data	=	{};
	data.request	=	2;
	data.friend_id	=	friendName;
	if(friendName != "" && friendName != undefined){
		sendRequest("chatClass.php", data, 4);
	}
}

var checkMessageUpdate	=	function (){
	var totalUiChatCount	=	$('#totalChatCountOnUi').val();
	var friendName	=	$('li.activeChatUser').html();
	data	=	{};
	data.request = 3;
	data.friend_id	=	friendName;
	data.totalResultOnUi	=	totalUiChatCount ? totalUiChatCount : 0;
	sendRequest("chatClass.php", data, 5);
}
