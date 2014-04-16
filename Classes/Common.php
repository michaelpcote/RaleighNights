<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
class Common
{
	
	static function checkString($string)
	{
		if ( $string == null || $string == 'null' ) {
			return '';
		} else {
			return $string;
		}
	}

	static function checkEmpty($string)
	{
		if ( $string == null || $string == '' ) {
			return 'null';
		} else {
			return $string;
		}
	}
	
	static function get_random_string($valid_chars, $length) {
		// start with an empty random string
		$random_string = "";
	
		// count the number of chars in the valid chars string so we know how many choices we have
		$num_valid_chars = strlen($valid_chars);
	
		// repeat the steps until we've created a string of the right length
		for ($i = 0; $i < $length; $i++)
		{
			// pick a random number from 1 up to the number of valid chars
			$random_pick = mt_rand(1, $num_valid_chars);
	
			// take the random character out of the string of valid chars
			// subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
			$random_char = $valid_chars[$random_pick-1];
	
			// add the randomly-chosen char onto the end of our string so far
			$random_string .= $random_char;
		}
	
		// return our finished random string
		return $random_string;
    }
	
	static function getLatLong( $data ) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://www.datasciencetoolkit.org/street2coordinates");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
					"data=".$data);
		
		// in real life you should use something like:
		// curl_setopt($ch, CURLOPT_POSTFIELDS, 
		//          http_build_query(array('postvar1' => 'value1')));
		
		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);
		$output = json_decode($server_output, true);
		$lat = '';
	
		$long = '';
		echo $long;
		if( isset( $output ) && is_array( $output ) ) {
			foreach ( $output as $k => $v ) {
				if ( is_array( $v ) ) {
					foreach ( $v as $m=>$n ) {
						if ( $m == 'latitude' ) {
							$lat = $n;
						}
						if ( $m == 'longitude' ) {
							$long = $n;
						}
					}
				}
			}
		}
		
		return array( $lat, $long);
	}
	
	static function getConn() {
		$conn =  mysqli_connect('54.186.207.86', 'root', '>Password1', 'Raleigh_Nights' );
		return $conn;
	}
	
	
}
?>
