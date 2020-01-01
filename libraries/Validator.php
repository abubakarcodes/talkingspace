<?php 
class Validator{
	// check require fileds
	public function isRequired($field_array){
		foreach ($field_array as $field) {
			if( empty($_POST['' . $field . '']) ){
				return false;
			}else{
				return true;
			}
		}
	}


	/**
	 * validate email 
	 */
	public function isValidEmail($email){
		if(filter_var($email  ,FILTER_VALIDATE_EMAIL )){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * match password 
	 */
	public function matchPassword($pw1, $pw2){
		if($pw1 == $pw2){
			return true;
		}else{
			return false;
		}
	}


}


 ?>