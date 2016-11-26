<?php
/*
 Project Name       	: 	Chat
 File Or Class Name 	:   index.php
 Description			:
 Copyright          	:	Copyright © 2016.
 */

require_once __DIR__.'/dbClass.php';

class _chat{
	private $db	=	"";
	public function __construct(){
		$this->db = _dbConnection::conn();
	}
	
	public function insrtChat($data){
		$query	=	"Insert into chat_info set user_id =".$this->getId($_SESSION['username']).", message = '".addslashes($data['message'])."', friend_id =".$this->getId($_SESSION['friend_email'])."', chat_time = now(), messae_by =".$_SESSION['username'];
		$result	=	$this->db->query($query);
		
		return $result;
	}
	
	private function getId($user){
		$username	=	"";
		$query	=	"SELECT id FROM userinfo WHERE email ='".$user."'";
		$result	=	$this->db->query($query);
		if($result){
			$username	=	$result->fetch_assoc();
			$username	=	$username['id'];
		}
		
		return $username;
	}
	
	private function getUser($id){
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
		$query	=	"SELECT message, message_by FROM chat_info WHERE user_id = ".$this->getId($_SESSION['username'])." AND friend_id =".$this->getId($data['friend_email'])." OR user_id = ".$this->getId($data['friend_email'])." AND friend_id =".$this->getId($_SESSION['username']);
		$result	=	$this->db->query($query);
		$messages	=	array();
		if($result){
			while($row	=	$result->fetch_assoc()){
				$message	=	array();
				$message['by']		=	$this->getUser($row['message_by']);
				$message['message']	=	$row['message'];
				$messages[]	=	$message;
			}
		}
		return json_encode($messages);
	}
}
extract($_POST);
if(!empty($request)){
	 if($request == 1){
	 	
	 }
	 else{
	 	
	 }
}
else{
	header('Location: index.php');
}

?>