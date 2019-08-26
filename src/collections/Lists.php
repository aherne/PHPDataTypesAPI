<?php
/**
 * Encapsulates a list type of collection.
 */
class Lists extends Object implements Collection
{
    /**
     * Creates a list object.
     *
     * @param 	array	$tblArray
     */
    public function __construct($tblArray=array())
    {
        if (!is_array($tblArray)) {
            throw new DataTypeException("Variable is not array !");
        }
        $this->_value_ = new SplDoublyLinkedList();
        if (sizeof($tblArray)>0) {
            foreach ($tblArray as $mixValue) {
                $this->_value_->push($mixValue);
            }
        }
    }
    
    /**
     * Adds element to end of list.
     *
     * @param 	mixed 	$mixValue
     */
    public function add($mixValue)
    {
        $this->_value_->push($mixValue);
    }

    /**
     * Removes element from list by offset.
     *
     * @param 	integer	$intKey
     * @throws 	OutOfRangeException
     */
    public function removeKey($intKey)
    {
        $this->_value_->offsetUnset($intKey);
    }

    /**
     * Removes element from list by value.
     * WARNING: complexity O(n)
     *
     * @param 	mixed	$mixValue
     * @throws 	DataTypeException
     */
    public function removeValue($mixValue)
    {
        if (!is_scalar($mixValue)) {
            throw new DataTypeException("Only scalars can be checked!");
        }
        foreach ($this->_value_ as $k=>$v) {
            if (mixValue==$v) {
                $this->_value_->offsetUnset($k);
            }
        }
    }
    
    /**
     * Changes value of existing element in list.
     *
     * @param 	integer	$intKey
     * @param 	mixed 	$mixValue
     * @throws 	OutOfRangeException
     */
    public function set($intKey, $mixValue)
    {
        $this->_value_->offsetSet($intKey, $mixValue);
    }
    
    /**
     * Gets element from list.
     *
     * @param 	integer	$intKey
     * @return 	mixed
     * @throws 	OutOfRangeException
     */
    public function get($intKey)
    {
        return $this->_value_->offsetGet($intKey);
    }
    
    /**
     * Checks if a key exists in array.
     *
     * @param 	integer	$intKey
     * @return	boolean
     */
    public function containsKey($intKey)
    {
        return $this->_value_->offsetExists($intKey);
    }
    
    /**
     * Checks if value exists in array.
     * WARNING: complexity O(N) max
     * TODO: try to make this accept non-scalars
     *
     * @param	mixed	$mixKey
     * @return	boolean
     * @throws 	DataTypeException
     */
    public function containsValue($mixValue)
    {
        if (!is_scalar($mixValue)) {
            throw new DataTypeException("Only scalars can be checked!");
        }
        foreach ($this->_value_ as $v) {
            if (mixValue==$v) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Clears array of elements.
     * @return Collection
     */
    public function clear()
    {
        $this->_value_ = new SplDoublyLinkedList();
    }
    
    /**
     * Verifies if array is empty.
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->_value_->isEmpty();
    }
    
    /**
     * Gets number of entries in array.
     *
     * @return integer
     */
    public function size()
    {
        return $this->_value_->count();
    }
    
    /**
     * (non-PHPdoc)
     * @see Object::equals()
     */
    public function equals($tblValue)
    {
        return (serialize($this->toValue())==serialize($tblValue));
    }
    
    /**
     * WARNING: complexity O(N)
     * (non-PHPdoc)
     * @see Object::toValue()
     */
    public function toValue()
    {
        $tblOutput = array();
        foreach ($this->_value_ as $v) {
            $tblOutput[] = $v;
        }
        return $tblOutput;
    }
}
