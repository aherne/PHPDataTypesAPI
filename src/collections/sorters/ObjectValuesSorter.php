<?php
class ObjectValuesSorter extends CollectionValuesSorter {
	public function sort($tblArray) {
		if($this->blnMaintainKeys) {
			uasort($tblArray, function ($a, $b) {
				return $a->compareTo($b);
			});
		} else {
			usort($tblArray, function ($a, $b) {
				return $a->compareTo($b);
			});
		}
		return $tblArray;
	}
}