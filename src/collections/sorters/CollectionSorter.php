<?php
/**
 * Defines a blueprint for sorting collections.
 *
 * @author Aherne
 */
interface CollectionSorter
{
    /**
     * Sorts array and returns results.
     *
     * @param array $tblArray
     * @return array
     */
    public function sort($tblArray);
}
