<?php
/**
 * Defines the blueprint of a comparable object
 */
interface Comparable
{
    /**
     * Compares this object with the specified object for order.
     *
     * @param	Object				$objObject
     * 			Object to compare to. Must be of same type as encapsulated object.
     * @throws 	DataTypeException
     * 			If input class is not of same type as current class.
     * @return	integer
     * 			1	if current object is greater than input object
     * 			0	if current object equals input object
     * 			-1	if current object is smaller than input object
     */
    public function compareTo($objObject);
}
