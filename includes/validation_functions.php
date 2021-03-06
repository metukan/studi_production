
<?php
	function fieldname_as_text($fieldname) {
		$fieldname = str_replace("_", " ", $fieldname);
		$fieldname = ucfirst($fieldname);
		return $fieldname;
	}

	// * presence	
	function has_presence($value) {
		return isset($value) && $value !== "";
	}
	
	function validate_presence($required_fields) {
		global $errors;
		foreach($required_fields as $field) {
			$value = trim($_POST[$field]);
			if (!has_presence($value)) {
				$errors[$field] = fieldname_as_text($field) . " can't be blank";
			}
		}
	}

	// * string length
	function has_over_max_length($value, $min){
		return strlen($value) >= $min;
	}
	
	// max length
	function has_max_length($value, $max){
		return strlen($value) <= $max;	
	}
	
	function validate_max_lengths($fields_with_max_length) {
		global $errors;
		//Express an assoc. array
		foreach($fields_with_max_length as $field => $max) {
			$value = trim($_POST[$field]);
			if (!has_max_length($value, $max)) {
				$errors[$field] = fieldname_as_text($field) . " is too long";
			}
		}
	}

	// * inclusion in a set
	function has_inclusion_in($value, $set){
		return in_array($value, $set);
	}
	
	
	


?>
