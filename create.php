<?php require"core/init.php";?>
<?php 
$topic = new Topic;
$validate = new Validator;

if(isset($_POST['do_post'])){
	$data = array();
	$data['title'] = $_POST['title'];
	$data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category'];
	$data['user_id'] = getUser()['user_id'];
	$data['last_activity'] = date("y-m-d H:i:s");
	$field_array = array('title', 'body', 'category');
	if($validate->isRequired($field_array)){
		if($topic->create($data)){
			redirect('index.php', 'Your Topic has been Posted', 'success');
		}else{
			redirect('topic.php?id=' . $topic_id, 'Something went wrong with your Post' , 'error');
		}
	}else{
		redirect('create.php', 'Please Fill in all required fields' , 'error');
	}
}

$temp = new Template('templates/create.php');
$temp->getTotalTopics = $topic->getTotalTopics();
$temp->getTotalCategories = $topic->getTotalCategories();

echo $temp;


 ?>