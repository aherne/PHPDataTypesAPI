<?php
/**
 * Defines a blueprint of sorting of collections by values.
 * 
 * @author Aherne
 */
abstract class CollectionValuesSorter implements CollectionSorter {
	protected $blnMaintainKeys = false;
	
	/**
	 * Signals sort to maintain key values in result.
	 * 
	 * @param boolean $blnValue
	 */
	public function setMaintainKeys($blnValue) {
		$this->blnMaintainKeys = $blnValue;
	}
}