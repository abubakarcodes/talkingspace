<?php require"core/init.php";?>
<?php 

// create topic object
$topic = new Topic;
//create a user object
$user = new User;
//create a object for validator class
$validate = new Validator;

if(isset($_POST['register'])){
	// create data array to store variables
	$data = array();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['username'] = $_POST['username'];
	$data['password'] = md5($_POST['password']);
	$data['password2'] = md5($_POST['password2']);
	$data['about'] = $_POST['about'];
	$data['last_activity'] = date("y-m-d H:i:s");

	$field_array = array('name', 'email', 'username', 'password', 'password2');
	if($validate->isRequired($field_array)){
		if($validate->isValidEmail($data['email'])){
			if($validate->matchPassword($data['password'], $data['password2'])){
							//upload avatar
				if($user->uploadAvatar()){
					$data["avatar"] = $_FILES["avatar"] ["name"];
				}else{
					$data["avatar"] = 'no-img.png';
				}

				//register user
				if($user->register($data)){
					redirect('index.php', 'you are registered and you can log in now' , 'success');
				}else{
					redirect('index.php', 'something went wrong with registeration', 'error');
				}
			}else{
				redirect('register.php', 'your password did not match', 'error');
			}
		}else{
			redirect('register.php', 'Please use a valid email address', 'error');
		}
	}else{
		redirect('register.php', 'Please fill in all required fields', 'error');
	}
	
}


$temp = new Template('templates/register.php');
//getting total topics in the side bar
$temp->getTotalTopics = $topic->getTotalTopics();
echo $temp;


 ?>