<?php
class ScalarKeysSorter implements CollectionSorter
{
    protected $intDirection = SORT_ASC;
    
    public function setDirection($intDirection)
    {
        $this->intDirection = $intDirection;
    }
    
    public function sort($tblArray)
    {
        if ($this->intDirection == SORT_ASC) {
            ksort($tblArray);
        } else {
            krsort($tblArray);
        }
        return $tblArray;
    }
}
