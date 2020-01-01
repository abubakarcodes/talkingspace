<?php 
/**
 * format date function
 */
function dateFormat($date){
	$date = date("F j, Y, g:i a", strtotime($date));
	return $date;
}


/**
 * Url format function
 */
function urlFormat($str){
	//strip out all white space
  $str = preg_replace('/\s*/', '', $str);
  //convert the string to all lowercase
  $str = strtolower($str);
  //url encode
  $str = urlencode($str);
  return $str;
}


function is_active($category){
	if(isset($_GET['category'])){
		if($_GET['category'] == $category){
			return 'active';
		}else{
			return '';
		}
	}else{
		if($category == null)
		return 'active';
	}
}

 ?>