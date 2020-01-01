<?php require"core/init.php";?>
<?php 
$topic = new Topic;
$temp = new Template('templates/reply.php');

//GEt id from URL
$topic_id = $_GET['id'];

if(isset($_POST['do_reply'])){
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];

	$validate = new Validator;
	$field_array = array('body');
	if($validate->isRequired($field_array)){
		if($topic->reply($data)){
			redirect('topic.php?id='. $topic_id , 'you reply has been posted', 'successs' );
		}else{
			redirect('topic.php?id='.$topic_id,'Something went wrong with your reply', 'error');

		}
	}else{
		redirect('topic.php?id='.$topic_id,'Please Fill in reply body', 'error');
	}
}



$temp->getTotalTopics = $topic->getTotalTopics();
$temp->topic = $topic->getTopic($topic_id);
$temp->replies = $topic->getReplies($topic_id);
$temp->title = $topic->getTopic($topic_id)['title'];


echo $temp;

 ?>