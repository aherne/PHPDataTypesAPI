<?php
/**
 * Abstract class covering encapsulation.
 */
abstract class Object
{
    protected $_value_;
    
    /**
     * Encapsulates a value inside an object.
     *
     * @param 	mixed	$mixValue
     */
    public function __construct($mixValue=null)
    {
        $this->_value_ = $mixValue;
    }
    
    /**
     * Verifies if encapsulated value equals input value.
     *
     * @param	mixed	$mixValue
     * @return	boolean
     */
    public function equals($mixValue)
    {
        return ($this->_value_==$mixValue);
    }
    
    /**
     * Gets encapsulated value.
     *
     * @return	mixed
     */
    public function toValue()
    {
        return $this->_value_;
    }
}
