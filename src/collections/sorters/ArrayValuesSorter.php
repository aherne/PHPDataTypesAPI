<?php
class ArrayValuesSorter extends CollectionValuesSorter {
	protected $intDirection = SORT_ASC;
	
	public function setDirection($intDirection) {
		$this->intDirection = $intDirection;
	}
	
	public function sort($tblArray) {
		array_multisort($tblArray, $this->intDirection);
		return $tblArray;
	}
}