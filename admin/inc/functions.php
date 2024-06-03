<?php 
	
	// generate password functin
	function genratepass($length = 10){ //function to generate password
        $char = "abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ1234567890";
        return substr(str_shuffle($char), 0, $length);
    }