<?php

class Validator {

  // Pure method - tāpēc static
  static public function string($data, $min = 0, $max = INF) {
   $data = trim($data);

    return  is_string($data)
            && strlen($data) >= $min
            && strlen($data) <= $max;
  }
  
  static public function number($data, $min = 0, $max = INF) {
    $data = trim($data);
 
     return  is_numeric($data)
             && $data >= $min
             && $data <= $max;
   }
   public static function username($data) {
    return filter_var($data);
 }

 public static function password($data) {
    // Minimum length requirement
    $minLength = 8;
    
    // Regular expressions for checking password criteria
    $uppercaseRegex = '/[A-Z]/';
    $lowercaseRegex = '/[a-z]/';
    $numberRegex = '/[0-9]/';
    $specialCharRegex = '/[!@#$%^&*()\-_=+{};:,<.>]/';

    return  strlen($data) >= $minLength &&
            preg_match($uppercaseRegex, $data) &&
            preg_match($lowercaseRegex, $data) &&
            preg_match($numberRegex, $data) &&
            preg_match($specialCharRegex, $data);
 }
}