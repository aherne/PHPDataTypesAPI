<?php
/**
 * Encapsulates a PHP integer primitive.
 */
final class Integer extends Object implements Comparable  {
	/**
	 * Constructs an object from an integer primitive.
	 * 
	 * @param 	integer 	$intInput
	 * @throws 	DataTypeException
	 * 			If input parameter is not an integer primitive.
	 */
	public function __construct($intInput=0) {
		if(!is_int($intInput)) throw new DataTypeException("Variable is not integer: ".$intInput);
		$this->_value_ = (integer) $intInput;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see Comparable::compareTo()
	 */
	public function compareTo($objInteger) {
		if(!($objInteger instanceof Integer)) throw new DataTypeException("Compared argument must be of Integer type!");
		$intA = $this->_value_;
		$intB = $objInteger->toValue();
		if($intA==$intB) 			return 0;
		else if($intA<$intB)		return -1;
		else						return 1;
	}
}