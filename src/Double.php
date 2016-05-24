<?php
/**
 * Encapsulates a PHP double primitive.
 */
final class Double extends Object implements Comparable {
	/**
	 * Constructs an object from a double primitive.
	 * 
	 * @param 	double 		$dblInput
	 * @throws 	DataTypeException
	 * 			If input parameter is not a double primitive.
	 */
	public function __construct($dblInput=0.0) {
		if(!is_float($dblInput)) throw new DataTypeException("Variable is not double: ".$dblInput);
		$this->_value_ = (double) $dblInput;
	}
	
	/**
	 * Rounds value contained up.
	 * Example: IF $this->_value_ = 1.51 AND $intPrecision = 1 THEN $this->_value_ = 1.6
	 * 
	 * @param	integer		$intPrecision
	 * @return Double
	 */
	public function roundUp($intPrecision) {
		$this->_value_ = round($this->_value_, $intPrecision, PHP_ROUND_HALF_UP);
		return $this;
	}

	/**
	 * Rounds value contained down.
	 * Example: IF $this->_value_ = 1.51 AND $intPrecision = 1 THEN $this->_value_ = 1.5
	 *
	 * @param	integer		$intPrecision
	 * @return Double
	 */
	public function roundDown($intPrecision) {
		$this->_value_ = round($this->_value_, $intPrecision, PHP_ROUND_HALF_DOWN);
		return $this;
	}

	/**
	 * Gets value contained rounded to integer.
	 * Example: IF $this->_value_ = 1.23 THEN returned value is 1
	 * 
	 * @return integer
	 */
	public function toInteger() {
		return round($this->_value_);
	}

	/**
	 * Gets value contained ceiled to integer.
	 * Example: IF $this->_value_ = 1.23 THEN returned value is 2
	 *
	 * @return integer
	 */
	public function toIntegerUp() {
		return ceil($this->_value_);
	}
	
	/**
	 * Gets value contained floored to integer.
	 * Example: IF $this->_value_ = 1.73 THEN returned value is 1
	 *
	 * @return integer
	 */
	public function toIntegerDown() {
		return floor($this->_value_);
	}
	/**
	 * (non-PHPdoc)
	 * @see Comparable::compareTo()
	 */
	public function compareTo($objDouble) {
		if(!($objDouble instanceof Double)) throw new DataTypeException("Compared argument must be of Double type!");
		$dblA = $this->_value_;
		$dblB = $objDouble->toValue();
		if($dblA==$dblB) 			return 0;
		else if($dblA<$dblB)		return -1;
		else						return 1;
	}
}