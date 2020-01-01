<?php 
function redirect($page = false , $message = null , $message_type = null){
if(is_string($page)){
	$location = $page;
}else{
	$location = $_SERVER['SCRIPT_NAME'];

}
//check for message
if($message != NULL){
	//set message
	$_SESSION['message'] = $message;

}

//check for type
if($message_type != null){
	$_SESSION['message_type'] = $message_type;

}
//redirect
header("location: $location");

exit;
}

//display messages
function displayMessage(){
	if(isset($_SESSION['message'])){

		//assign type variable
			$message = $_SESSION['message'];

		if(!empty($_SESSION['message_type'])){
			//assign type variable
			$message_type = $_SESSION['message_type'];
			//create output
			if($message_type == 'error')
			{
				echo '<div class="alert alert-danger">'. $message . '</div>';
			}else{

				echo '<div class="alert alert-success">'. $message . '</div>';
			}
		}
		//unset message
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);

	}else{
		echo '';
	}
}


// check is user is logged in 
function isLoggedIn(){
	if(isset($_SESSION['is_logged_in'])){
		return true;
	}else{
		return false;
	}
}


function getUser(){
	$userArray = array();
	$userArray['user_id'] = $_SESSION['user_id'];
	$userArray['username'] = $_SESSION['username'];
	$userArray['name'] = $_SESSION['name']; 
	return $userArray;
}




 ?>