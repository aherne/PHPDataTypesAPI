<?php
/**
 * Encapsulates an array of associative type, mapping keys to values.
*/
class Maps extends Object implements Collection
{
    /**
     * Creates an  map object.
     *
     * @param 	array	$tblArray
     */
    public function __construct($tblArray=array())
    {
        if (!is_array($tblArray)) {
            throw new DataTypeException("Variable is not array !");
        }
        $this->_value_ = $tblArray;
    }
    
    /**
     * Adds element to map.
     *
     * @param 	mixed	$mixKey
     * @param 	mixed 	$mixValue
     */
    public function set($mixKey, $mixValue)
    {
        $this->_value_[$mixKey] = $mixValue;
    }
    
    /**
     * Gets element from map.
     *
     * @param 	mixed	$mixKey
     * @throws 	DataTypeException
     * @return 	mixed
     */
    public function get($mixKey)
    {
        if (!isset($this->_value_[$mixKey])) {
            throw new DataTypeException("Key not found: ".$mixKey);
        }
        return $this->_value_[$mixKey];
    }
    
    /**
     * Removes element from map by key.
     *
     * @param 	mixed	$mixKey
     * @throws 	DataTypeException
     */
    public function removeKey($mixKey)
    {
        if (!isset($this->_value_[$mixKey])) {
            throw new DataTypeException("Key not found: ".$mixKey);
        }
        unset($this->_value_[$mixKey]);
    }


    /**
     * Removes element from map by value.
     * WARNING: complexity O(n)
     *
     * @param 	mixed	$mixValue
     * @throws 	DataTypeException
     */
    public function removeValue($mixValue)
    {
        $this->_value_ = array_filter($this->_value_, function ($value) use ($mixValue) {
            return ($value!=$mixValue);
        });
    }
    
    /**
     * Checks if a key exists in map.
     *
     * @param	mixed	$mixKey
     * @return	boolean
     */
    public function containsKey($mixKey)
    {
        return isset($this->_value_[$mixKey]);
    }
    
    /**
     * Checks if a value exists in map.
     *
     * @param	mixed	$mixKey
     * @return	boolean
     */
    public function containsValue($mixValue)
    {
        return in_array($mixValue, $this->_value_, true);
    }
    
    /**
     * Clears array of elements.
     */
    public function clear()
    {
        $this->_value_ = array();
    }
    
    /**
     * Verifies if array is empty.
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->_value_);
    }
    
    /**
     * Gets number of entries in array.
     *
     * @return integer
     */
    public function size()
    {
        return count($this->_value_);
    }
    
    /**
     * Gets all keys in map.
     *
     * @return	array
     */
    public function getKeys()
    {
        return array_keys($this->_value_);
    }

    /**
     * Gets all values in map.
     *
     * @return	array
     */
    public function getValues()
    {
        return array_values($this->_value_);
    }
    
    /**
     * (non-PHPdoc)
     * @see Object::equals()
     */
    public function equals($tblValue)
    {
        return (serialize($this->_value_)===serialize($tblValue));
    }
}
