<?php
/**
 * Encapsulates a PHP boolean primitive.
 */
final class Boolean extends Object implements Comparable
{
    /**
     * Constructs an object from a boolean primitive.
     *
     * @param 	boolean 	$blnInput
     * @throws 	DataTypeException
     * 			If input parameter is not a boolean primitive.
     */
    public function __construct($blnInput=false)
    {
        if (!is_bool($blnInput)) {
            throw new DataTypeException("Variable is not boolean: ".$blnInput);
        }
        $this->_value_ = (boolean) $blnInput;
    }
    
    /**
     * (non-PHPdoc)
     * @see Comparable::compareTo()
     */
    public function compareTo($objBoolean)
    {
        if (!($objBoolean instanceof Boolean)) {
            throw new DataTypeException("Compared argument must be of Boolean type!");
        }
        $blnA = $this->_value_;
        $blnB = $objBoolean->toValue();
        if ($blnA==$blnB) {
            return 0;
        } elseif ($blnA<$blnB) {
            return -1;
        } else {
            return 1;
        }
    }
}
