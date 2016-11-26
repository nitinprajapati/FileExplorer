<?php 
/*
 Project Name       	: 	Chat
 File Or Class Name 	:   index.php
 Description			:
 Copyright          	:	Copyright © 2016.
 */

require_once __DIR__.'/dbClass.php';
if(session_status() != PHP_SESSION_ACTIVE ){
	session_start();
}

if(empty($_SESSION['username'])){
	header('Location: index.php');
	exit();
}

require_once __DIR__.'./header.html';

$conn	=	_dbConnection::conn();
$query	=	"SELECT email FROM userinfo";
$result	=	$conn->query($query);
$name_arr	=	array();
while ($row	=	$result->fetch_assoc()){
	$name_arr[]	=	$row['email'];
} 

?>
<input type="hidden" id="userArray" value='<?php echo json_encode($name_arr)?>'/>
<div style="float: left">Welcome<?php echo $_SESSION['username']; ?>,</div>
<div class="logoutLink">
	<a href="logout.php">LogOut</a>
</div>
<div class="panel panel-info registration col-md-8 col-md-offset-2">
    <div class="row">
		<div class="form-group col-md-4">
			<ul id="users" class="list-group">
				
			</ul>
		</div>
	     <div class="form-group col-md-8">
	     	<textarea rows="20" cols="" class="form-control resizeNone"></textarea>
	     </div>
	</div>       
	<div class="row"> 
	    <div class="form-group col-md-10">
	        <textarea rows="" cols="" class="form-control resizeNone"></textarea>
	    </div>
	    <div class="col-md-2">
	        <button id="chatButton" class="btn btn-primary ">Send</button>
	    </div>
    </div>
    
</div>
<script src="js/chat.js"></script>
<?php 
	require_once __DIR__.'./footer.html';
?>