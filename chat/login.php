<?php 
/*
 Project Name       	: 	Chat
 File Or Class Name 	:   index.php
 Description			:
 Copyright          	:	Copyright © 2016.
 */

if(!empty($_GET['param'])){
	if($_GET['param'] == 1){
		$error	=	 "Registration successfully. Please login to chat.";
	}
}
?>
<div class="row">
	<div id="error" class="error col-md-12"><?php if(!empty($error)){echo $error;}?></div>
</div>
<div class="row">

<div class="container loginContainer">    
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-body" >
                <div id="loginform" class="form-horizontal" role="form">	                                    
                    <div class="input-group input-field username-field">
	                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                    <input data-toggle="tooltip" data-placement="right" data-trigger="manual" id="username" type="text" class="form-control login-validation no-space" name="usname" autocomplete="off" placeholder="username" >                                        
                    </div>
                        
                    <div class="input-group input-field password-field">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="pwd" type="password" class="form-control login-validation no-space" placeholder="password" >
                    </div>

                    <div class="form-group btn-container">
                        <div class="col-sm-12 controls text-center">
	                        <button type='submit' id="loginButton" class="btn btn-success ">Login</button>
                        </div>
                        <div class="col-md-12 text-center forgot-password-container">
	                       	<div class="bottom-link">
	                       		<a href="registration.php" id='forgot-pwd'>New User? Sign Up</a>
	                       	</div>
                        </div>
                    </div>   
                </div>  
            </div>                     
        </div> 
    </div>
</div>

</div>
