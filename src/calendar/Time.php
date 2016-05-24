<?php
/**
 * Encapsulates a calendar time of HH:MM:SS format.
 */
final class Time extends Object {
	/**
	 * Constructs an object from a time.
	 * 
	 * @param 	string	$strTime
	 * @throws 	DataTypeException
	 * 			If input is not a valid time of HH:MM:SS format.
	 */
	public function __construct($strTime) {
		if($strTime!=null && !self::isValid($strTime)) throw new DataTypeException("Invalid time: ".$strTime."! Accepted format is: HH:MM:SS");
		$this->_value_ = $strTime;
	}

	/**
	 * Verifies if input date is valid and respecting YYYY-MM-DD format.
	 *
	 * @param 	string	$strTime
	 * @return 	boolean
	 */
	public static function isValid($strTime) {
		if(preg_match("/(\d{2}):(\d{2}):(\d{2})/", $strTime)==1 && strtotime($strTime)!=false ) return true;
		else return false;
	}


	/**
	 * Gets current time.
	 *
	 * @return string
	 */
	public static function getCurrent() {
		return date('H:i:s');
	}
	
	/**
	 * Format input time according to time format. More information on time formats here:
	 * http://php.net/manual/en/function.date.php
	 * 
	 * @param string $strTime
	 * @param string $strFormat
	 * @return string
	 */
	public static function format($strTime, $strFormat='H:i:s') {
		return date($strFormat,strtotime($strTime));
	}
}