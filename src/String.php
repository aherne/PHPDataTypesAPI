<?php
/**
 * Encapsulates a PHP string primitive.
 */
final class String extends Object implements Comparable  {
	/**
	 * Constructs an object from a string primitive.
	 * 
	 * @param 	string 		$strInput
	 * @throws 	DataTypeException
	 * 			If input parameter is not a string primitive.
	 */
	public function __construct($strInput="") {
		if(!is_string($strInput)) throw new DataTypeException("Variable is not string: ".$strInput);
		$this->_value_ = (string) $strInput;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Comparable::compareTo()
	 */
	public function compareTo($objString) {
		if(!($objString instanceof String)) throw new DataTypeException("Compared argument must be of String type!");
		$intAnswer = strcmp($this->_value_, $objString->toValue());
		if($intAnswer<0) return -1;
		else if($intAnswer>0) return 1;
		else return 0;
	}
	
	/**
	 * Checks if current string contains a value.
	 * 
	 * @param string $strString
	 * @return boolean
	 */
	public function contains($strString) {
		return (strpos($this->_value_, $strString)!==false?true:false);
	}
	
	/**
	 * Checks if current string ends with a value.
	 * 
	 * @param string $strString
	 * @return boolean
	 */
	public function endsWith($strString) {
		$intPosition = strrpos($this->_value_, $strString);
		return (strlen($this->_value_)===($intPosition + strlen($strString))?true:false);
	}
	
	/**
	 * Checks if current string starts with a value.
	 * 
	 * @param string $strString
	 * @return boolean
	 */
	public function startsWith($strString) {
		return (strpos($this->_value_, $strString)===0?true:false); 
	}
	
	/**
	 * Gets position of value in current string
	 * 
	 * @param string $strString
	 * @param int $intOffset
	 * @return number
	 */
	public function indexOf($strString, $intOffset=0) {
		$intPosition = strpos($this->_value_, $strString, $intOffset);
		return ($intPosition!==false?$intPosition:-1);
	}
	
	/**
	 * Checks if current string is empty.
	 * 
	 * @return boolean
	 */
	public function isEmpty() {
		return ($this->_value_===""?true:false);
	}
	
	/**
	 * Gets current string length, according to charset. For double-bytes characters, it is mandatory to provide charset.
	 * 
	 * @param string $strCharset
	 * @return number
	 */
	public function length($strCharset="") {
		if(!$strCharset) return strlen($this->_value_);
		else return mb_strlen($this->_value_,$strCharset);
	}
	
	/**
	 * Converts current string to lowercase.
	 * 
	 * @return String
	 */
	public function toLowerCase() {
		$this->_value_ = strtolower($this->_value_);
		return $this;
	}
	
	/**
	 * Converts current string to uppercase.
	 *
	 * @return String
	 */
	public function toUpperCase() {
		$this->_value_ = strtoupper($this->_value_);
		return $this;
	}
	
	/**
	 * Trims current string of starting/ending spaces
	 * 
	 * @return String
	 */
	public function trim() {
		$this->_value_ = trim($this->_value_);
		return $this;
	}
	
	/**
	 * Replaces occurrence of old value with new value in current string.
	 * 
	 * @param string|array(string) $mixOldValue
	 * @param string|array(string) $mixNewValue
	 * @return String
	 */
	public function replace($mixOldValue, $mixNewValue) {
		$this->_value_ = str_replace($mixOldValue, $mixNewValue,$this->_value_);
		return $this;
	}

	/**
	 * Splits string by string.
	 *
	 * @param string $strString
	 * @return string[]
	 */
	public function split($strString) {
		return explode($strString, $this->_value_);
	}
	
	/**
	 * Cuts current string by positions. For double-bytes characters, it is mandatory to provide charset.
	 * 
	 * @param integer $intPositionStart
	 * @param integer $intPositionEnd
	 * @param string $strCharset
	 * @throws DataTypeException
	 * @return String
	 */
	public function substring($intPositionStart, $intPositionEnd=0, $strCharset="") {
		$strOutput = "";
		if($intPositionEnd==0) {
			if(!$strCharset) $strOutput = substr($this->_value_,$intPositionStart); 
			else $strOutput = mb_substr($this->_value_,$intPositionStart, $strCharset);
		} else if($intPositionStart>=0 && $intPositionEnd > 0) {
			if($intPositionEnd<$intPositionStart) throw new DatatypeException("Index out of bounds!");
			if(!$strCharset) $strOutput = substr($this->_value_,$intPositionStart, ($intPositionEnd-$intPositionStart));
			else $strOutput = mb_substr($this->_value_,$intPositionStart, ($intPositionEnd-$intPositionStart), $strCharset); 
		} else {
			throw new DatatypeException("Negative indexes are not allowed!");
		}
		$this->_value_ = $strOutput;
		return $this;
	}
	
	/**
	 * Checks if current string matches a regular expression.
	 * 
	 * @param regex $strREGEX
	 * @return boolean
	 */
	public function matchesRegex($strREGEX) {
		$mixResponse = preg_match($strREGEX, $this->_value_);
		return ($mixResponse==1?true:false);
	}

	/**
	 * Splits string by REGEX.
	 * 
	 * @param string $strREGEX
	 * @return string[]
	 */
	public function splitRegex($strREGEX) {
		return preg_split($strREGEX, $this->_value_);
	}
	
	/**
	 * Replaces occurrence of old value with new value in current string.
	 * 
	 * @param string|array(string) $mixPattern
	 * @param string|array(string) $mixReplacement
	 * @return String
	 */
	public function replaceRegex($mixPattern, $mixReplacement) {
		$this->_value_ = preg_replace($mixPattern,$mixReplacement,$this->_value_);
		return $this;
	}
}