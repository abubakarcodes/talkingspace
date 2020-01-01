<?php require"core/init.php";?>
<?php 
/**
 * create a topic object
 */
$topic = new Topic;
$temp = new Template('templates/frontpage.php');
$user = new User;
//assign variables 
$temp->topics = $topic->getAllTopic();
$temp->getTotalTopics = $topic->getTotalTopics();
$temp->getTotalCategories = $topic->getTotalCategories();
$temp->totalUsers = $user->getTotalUsers();
echo $temp;

 ?>