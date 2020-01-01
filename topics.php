<?php require"core/init.php";?>
<?php 

$topic = new Topic;

/**
 * get category from url
 */

$category_id = isset($_GET['category']) ? $_GET['category'] : null;
$user_id = isset($_GET['user']) ? $_GET['user'] : null;


$temp = new Template('templates/topics.php');
$user = new User;

//assign variables 
if(isset($category_id)){
	$temp->topics = $topic->getByCategories($category_id);
    $temp->title =  "Post IN : " .$topic->getCategory($category_id)['name'];
}

if(!isset($category_id)){
	$temp->topics = $topic->getAllTopic();
}

if(isset($user_id)){
	$temp->topics = $topic->getByUser($user_id);
    // $temp->title = 	"Post BY:" . getUser($user_id)['username'];
}



$temp->getTotalTopics = $topic->getTotalTopics();
$temp->getTotalCategories = $topic->getTotalCategories();
$temp->totalUsers = $user->getTotalUsers();

echo $temp;


 ?>