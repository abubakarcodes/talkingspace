<?php include"core/init.php"; ?>
<?php 
  if(isset($_POST['do_login'])){
  	//get var
  	$username = $_POST['username'];
  	$password = md5($_POST['password']);

  	//create user object
  	$user = new User;
  	if($user->login($username , $password)){
  		redirect('index.php', 'You have been logged in', 'success');
  	}else{
  		redirect('index.php', 'That loggin is not valid', 'error'); 
  	}
  }else{
  	redirect('index.php');
  }

 ?>