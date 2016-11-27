<?php
/*
 Project Name       	: 	Chat
 File Or Class Name 	:   index.php
 Description			:
 Copyright          	:	Copyright © 2016.
 */

require_once __DIR__.'/dbClass.php';
session_start();
class _chat{
	private $db	=	"";
	public function __construct(){
		$this->db = _dbConnection::conn();
	}
	
	public function insrtChat($data){
		$query	=	"Insert into chat_info set user_id =".$this->getId($_SESSION['username']).", message = '".addslashes($data['message'])."', friend_id =".$this->getId($data['friend_id']).", chat_time = now(), message_by =".$this->getId($_SESSION['username']);
		$result	=	$this->db->query($query);
		return $result;
	}
	
	public function getId($user){
		$username	=	"";
		$query	=	"SELECT id FROM userinfo WHERE email ='".$user."'";
		$result	=	$this->db->query($query);
		if($result){
			$username	=	$result->fetch_assoc();
			$username	=	$username['id'];
		}
		
		return $username;
	}
	
	public function getUser($id){
		$username	=	"";
		$query	=	"SELECT email FROM userinfo WHERE id ='".$id."'";
		$result	=	$this->db->query($query);
		if($result){
			$username	=	$result->fetch_assoc();
			$username	=	$username['email'];
		}
	
		return $username;
	}
	
	public function retrieveChat($data){
		$query	=	"SELECT message, message_by FROM chat_info WHERE user_id = ".$this->getId($_SESSION['username'])." AND friend_id =".$this->getId($data['friend_id'])." OR user_id = ".$this->getId($data['friend_id'])." AND friend_id =".$this->getId($_SESSION['username']);
		$result	=	$this->db->query($query);
		return $result;
	}
	
	public function isChatUpdate($data){
		$query	=	"SELECT COUNT(*) FROM chat_info WHERE user_id = ".$this->getId($_SESSION['username'])." AND friend_id =".$this->getId($data['friend_id'])." OR user_id = ".$this->getId($data['friend_id'])." AND friend_id =".$this->getId($_SESSION['username']);
		$result	=	$this->db->query($query);
		$result	=	$result->fetch_assoc();
		
		return $result['COUNT(*)'];
	}
}
extract($_POST);
if(!empty($request)){
	$obj	=	new _chat();
	if($request == 1){
	 	$data	=	array('message' => $message, 'friend_id' => $friend_id);
	 	$result	=	$obj->insrtChat($data); 
	 	if($result){
	 		$result = 1;
	 	}
	 	else{
	 		$result	=	2;
	 	}
	 	
	 	echo $result;
	 }
	 elseif($request == 2){
	 	$data	=	array("friend_id" => $friend_id);
	 	$result	=	$obj->retrieveChat($data);
	 	$messages	=	array();
	 	if($result){
	 		while($row	=	$result->fetch_assoc()){
	 			$message	=	array();
	 			if($obj->getUser($row['message_by']) == $_SESSION['username']){
	 				$class = "loggedUserMessage";
	 			}
	 			else{
	 				$class = "otherUser";
	 			}
	 			$string	= "<div class=".$class."><b>".$obj->getUser($row['message_by']).":</b>&nbsp;".$row['message']."</div>";
	 			$message['text'] = $string;
	 			$messages[]	=	$message;
	 		}
	 		$chatCount	=	$obj->isChatUpdate($data);
	 		$messages['totalChatCount']	=	$chatCount;
	 		echo json_encode($messages);
	 	}
	 }
	 elseif($request == 3){
	 	$data	=	array("friend_id" => $friend_id);
	 	$result	=	$obj->isChatUpdate($data);
	 	if($result != $totalResultOnUi){
	 		echo 1;
	 	}
	 }
}
else{
	header('Location: index.php');
}

?>