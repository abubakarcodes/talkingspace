<?php 

/**
 * get the number of replies per topic
 * @param  [int] $topic_id [description]
 * @return [type]           [description]
 */
function replyCount($topic_id){
	$db = new Database;
	$db->query("SELECT * FROM replies WHERE topic_id = :topic_id");
	$db->bind(':topic_id', $topic_id);
	//Assign rows
	$rows = $db->resultset();
	return $db->rowCount();
}


/**
 * get # of categories
 */
function getCategories(){
	$db = new Database;
	$db->query("SELECT * FROM categories");
	$result = $db->resultset();
	return $result;
}


/**
 * user posts count
 */
function userPostcount($user_id){
 $db = new Database;
 $db->query("SELECT * FROM topics
 			WHERE user_id = :user_id");
 $db->bind(":user_id", $user_id);

 $rows = $db->resultset();
// get count
$topic_count = $db->rowCount();


$db->query("SELECT * FROM replies
			WHERE user_id = :user_id");
$db->bind(":user_id", $user_id);

$rows = $db->resultset();
$reply_count = $db->rowCount();

return $topic_count;

}


 ?>