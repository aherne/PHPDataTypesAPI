<?php
/**
 * Encapsulates a set type of collection.
 * Observation: SPLObjectStorage wasn't wrapped because it doesn't support scalars
 */
class Sets extends Object implements Collection {
	/**
	 * Creates a set object.
	 * 
	 * @param 	array	$tblArray
	 */
	public function __construct($tblArray=array()) {
		if(!is_array($tblArray)) throw new DataTypeException("Variable is not array !");
		$this->_value_ = array();
		if(sizeof($tblArray)>0) {
			foreach($tblArray as $mixValue) {
				$this->_value_[$this->getHash($mixValue)]=$mixValue;
			}
		}
	}
	
	/**
	 * Adds element to set.
	 * 
	 * @param 	mixed 	$mixValue
	 */
	public function add($mixValue) {
		$this->_value_[$this->getHash($mixValue)]=$mixValue;
	}
	
	/**
	 * Checks if a value exists in set.
	 * 
	 * @param	mixed	$mixKey
	 * @return	boolean
	 */
	public function containsValue($mixValue) {
		return isset($this->_value_[$this->getHash($mixValue)]);
	}

	/**
	 * Removes element from set by value.
	 *
	 * @param 	mixed	$mixValue
	 * @throws 	DataTypeException
	 */
	public function removeValue($mixValue) {
		unset($this->_value_[$this->getHash($mixValue)]);
	}
	
	/**
	 * Clears set of elements.
	 */
	public function clear() {
		$this->_value_ = array();
	}
	
	/**
	 * Verifies if set is empty.
	 *
	 * @return boolean
	 */
	public function isEmpty() {
		return empty($this->_value_);
	}
	
	/**
	 * Gets number of entries in set.
	 *
	 * @return integer
	 */
	public function size() {
		return count($this->_value_);
	}
	
	/**
	 * WARNING: complexity O(N)
	 * (non-PHPdoc)
	 * @see Object::toValue()
	 */
	public function toValue() {
		return array_values($this->_value_);
	}

	/**
	 * (non-PHPdoc)
	 * @see Object::equals()
	 */
	public function equals($tblValue) {
		return (serialize($this->_value_)==serialize($tblValue));
	}
	
	/**
	 * Gets hash of value.
	 *  
	 * @param mixed $mixValue
	 * @throws DataTypeException
	 * @return string
	 */
	private function getHash($mixValue) {
		if(is_object($mixValue)) return spl_object_hash($mixValue);
		else if(is_scalar($mixValue)) return $mixValue;
		else throw new DataTypeException("Only objects and scalars are hashable!");
	}
}