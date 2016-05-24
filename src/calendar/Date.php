<?php
/**
 * Encapsulates a calendar date of YYYY-MM-DD format.
 */
final class Date extends Object implements Comparable {
	/**
	 * Constructs an object from a date.
	 * 
	 * @param 	string	$strDate
	 * @throws 	DataTypeException
	 * 			If input is not a valid date of YYYY-MM-DD format.
	 */
	public function __construct($strDate) {
		if($strDate!=null && !self::isValid($strDate)) throw new DataTypeException("Invalid date: ".$strDate."! Accepted format is: YYYY-MM-DD");
		$this->_value_ = $strDate;
	}

	/**
	 * Adds years to encapsulated date and returns new date.
	 * 
	 * @param 	integer	$intYears
	 * @return 	Date
	 */
	public function addYears($intYears) {
		$this->_value_ = date('Y-m-d', strtotime($this->_value_." +".$intYears." years"));
		return $this;
	}


	/**
	 * Adds months to encapsulated date and returns new date.
	 *
	 * @param 	integer	$intMonths
	 * @return 	Date
	 */
	public function addMonths($intMonths) {
		$this->_value_ =  date('Y-m-d', strtotime($this->_value_." +".$intMonths." months"));
		return $this;
	}


	/**
	 * Adds days to encapsulated date and returns new date.
	 *
	 * @param 	integer	$intDays
	 * @return 	Date
	 */
	public function addDays($intDays) {
		$this->_value_ =  date('Y-m-d', strtotime($this->_value_." +".$intDays." days"));
		return $this;
	}

	/**
	 * Subtracts years from encapsulated date and returns new date.
	 *
	 * @param 	integer	$intYears
	 * @return 	Date
	 */
	public function subYears($intYears) {
		$this->_value_ =  date('Y-m-d', strtotime($this->_value_." -".$intYears." years"));
		return $this;
	}

	/**
	 * Subtracts months from encapsulated date and returns new date.
	 *
	 * @param 	integer	$intMonths
	 * @return 	Date
	 */
	public function subMonths($intMonths) {
		$this->_value_ =  date('Y-m-d', strtotime($this->_value_." -".$intMonths." months"));
		return $this;
	}


	/**
	 * Subtracts days from encapsulated date and returns new date.
	 *
	 * @param 	integer	$intDays
	 * @return 	Date
	 */
	public function subDays($intDays) {
		$this->_value_ =  date('Y-m-d', strtotime($this->_value_." -".$intDays." days"));
		return $this;
	}

	/**
	 * Calculates how many days differ between encapsulated and input date.
	 * 
	 * @param 	Date	$objDate
	 * @throws 	DataTypeException
	 * @return 	integer
	 */
	public function diff($objDate) {
		if(!($objDate instanceof Date)) throw new DataTypeException("Argument must be of Date type!");
		return intval((strtotime($this->_value_)-strtotime($objDate->toValue()))/(60*60*24));
	}

	/**
	 * (non-PHPdoc)
	 * @see Comparable::compareTo()
	 */
	public function compareTo($objDate) {
		if(!($objDate instanceof Date)) throw new DataTypeException("Compared argument must be of Date type!");
		$intValue = strtotime($this->_value_) - strtotime($objDate->toValue());
		if($intValue>0) 		return 1;
		else if($intValue<0)	return -1;
		else 					return 0;
	}

	/**
	 * Verifies if input date is valid and respecting YYYY-MM-DD format.
	 * 
	 * @param 	string	$strDate
	 * @return 	boolean
	 */
	public static function isValid($strDate) {
		if(preg_match("/(\d{4})-(\d{2})-(\d{2})/", $strDate)==1 && strtotime($strDate)!=false ) return true;
		else return false;
	}

	/**
	 * Gets current date.
	 * 
	 * @return string
	 */
	public static function getCurrent() {
		return date('Y-m-d');
	}
	
	/**
	 * Format input date according to date format. More information on date formats here:
	 * http://php.net/manual/en/function.date.php
	 * 
	 * @param string $strDate
	 * @param string $strFormat
	 * @return string
	 */
	public static function format($strDate, $strFormat='Y-m-d') {
		return date($strFormat,strtotime($strDate));
	}
}