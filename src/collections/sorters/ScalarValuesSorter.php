<?php
class ScalarValuesSorter implements CollectionValuesSorter
{
    protected $intDirection = SORT_ASC;
    
    public function setDirection($intDirection)
    {
        $this->intDirection = $intDirection;
    }
    
    public function sort($tblArray)
    {
        if ($this->blnMaintainKeys) {
            if ($this->intDirection == SORT_ASC) {
                asort($tblArray);
            } else {
                arsort($tblArray);
            }
        } else {
            if ($this->intDirection == SORT_ASC) {
                sort($tblArray);
            } else {
                rsort($tblArray);
            }
        }
        return $tblArray;
    }
}
