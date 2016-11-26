<?php
/*
 Project Name       	: 	Chat
 File Or Class Name 	:   index.php
 Description			:
 Copyright          	:	Copyright © 2016.
 */

require_once __DIR__.'/dbClass.php';
class _register{
	public $db	=	"";

	public function __construct(){
		$this->db	=	_dbConnection::conn();
	}
	
	public function register($data = array()){
		$query	=	"INSERT INTO userinfo SET f_name = '".$data['fname']."', l_name = '".$data['lname']."', email = '".$data['email']."', password = '".md5($data['pwd'])."'";
		$result	=	$this->db->query($query);
		return $result;
	}
}

class _login{
	public $db	=	"";
	
	public function __construct(){
		$this->db	=	_dbConnection::conn();
	}
	
	public function verify_login($data = array()){
		$query	=	"SELECT COUNT(*) FROM logininfo WHERE username = '".$data['username']."' AND password = '".md5($data['pwd'])."'";
		$result	=	$this->db->query($query);
		$result	=	$result->fetch_assoc(); 
		
		if($result['COUNT(*)'] == 1){
			$query 	= "UPDATE logininfo SET last_login = now() Where username = '".$data['username']."'";
			$result	=	$this->db->query($query);
			session_start();
			$_SESSION['username'] = $data['username'];
		}
		else{
			$result	=	"";
		}
		return $result;  
	}
}

extract($_POST);
if(!empty($request)){
	if($request	==	2){//Login
		$data	=	array('username' => $username, 'pwd' => $pwd);
		$obj	=	new _login();
		//echo 5;die();
		$result	=	$obj->verify_login($data);
		
		if($result){
			echo "";
		}
		else{
			echo "2";
		}
	}
	else {
		$data	=	array('fname' => $fname, 'lname' => $lname, 'email' => $email, 'pwd' => $pwd);
		$obj	=	new _register();
		$result	=	$obj->register($data);
		
		if($result){
			echo 1;
		}
		else{
			echo 2;
		}
	}
}
else{
	header('Location: index.php');
}

