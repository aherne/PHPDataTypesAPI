<?php
/**
 * Encapsulates a calendar timestamp of YYYY-MM-DD HH:MM:SS format.
 */
final class TimeStamp extends Object implements Comparable
{
    /**
     * Constructs an object from a date.
     *
     * @param 	string	$strDate
     * @throws 	DataTypeException
     * 			If input is not a valid date of YYYY-MM-DD HH:MM:SS format.
     */
    public function __construct($strDateTime)
    {
        if ($strDateTime!=null && !self::isValid($strDateTime)) {
            throw new DataTypeException("Invalid timestamp: ".$strTime."! Accepted format is: YYYY-MM-DD HH:MM:SS");
        }
        $this->_value_ = $strDateTime;
    }

    /**
     * Adds years to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intYears
     * @return 	TimeStamp
     */
    public function addYears($intYears)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." +".$intYears." years"));
        return $this;
    }


    /**
     * Adds months to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intMonths
     * @return 	TimeStamp
     */
    public function addMonths($intMonths)
    {
        $this->_value_ =  date('Y-m-d H:i:s', strtotime($this->_value_." +".$intMonths." months"));
        return $this;
    }

    /**
     * Adds days to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intDays
     * @return 	TimeStamp
     */
    public function addDays($intDays)
    {
        $this->_value_ =  date('Y-m-d H:i:s', strtotime($this->_value_." +".$intDays." days"));
        return $this;
    }

    /**
     * Adds hours to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intHours
     * @return 	TimeStamp
     */
    public function addHours($intHours)
    {
        $this->_value_ =  date('Y-m-d H:i:s', strtotime($this->_value_." +".$intHours." hours"));
        return $this;
    }

    /**
     * Adds minutes to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intMinutes
     * @return 	TimeStamp
     */
    public function addMinutes($intMinutes)
    {
        $this->_value_ =  date('Y-m-d H:i:s', strtotime($this->_value_." +".$intMinutes." minutes"));
        return $this;
    }

    /**
     * Adds seconds to encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intSeconds
     * @return 	TimeStamp
     */
    public function addSeconds($intSeconds)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." +".$intSeconds." seconds"));
        return $this;
    }

    /**
     * Subtracts years from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intYears
     * @return 	TimeStamp
     */
    public function subYears($intYears)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intYears." years"));
        return $this;
    }

    /**
     * Subtracts months from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intMonths
     * @return 	TimeStamp
     */
    public function subMonths($intMonths)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intMonths." months"));
        return $this;
    }

    /**
     * Subtracts days from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intDays
     * @return 	TimeStamp
     */
    public function subDays($intDays)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intDays." days"));
        return $this;
    }

    /**
     * Subtracts hours from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intHours
     * @return 	TimeStamp
     */
    public function subHours($intHours)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intHours." hours"));
        return $this;
    }

    /**
     * Subtracts minutes from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intMinutes
     * @return 	TimeStamp
     */
    public function subMinutes($intMinutes)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intMinutes." minutes"));
        return $this;
    }

    /**
     * Subtracts seconds from encapsulated timestamp and returns new date.
     *
     * @param 	integer	$intSeconds
     * @return 	string
     */
    public function subSeconds($intSeconds)
    {
        $this->_value_ = date('Y-m-d H:i:s', strtotime($this->_value_." -".$intSeconds." seconds"));
        return $this;
    }

    /**
     * Calculates how many seconds differ between encapsulated and input timestamp.
     *
     * @param 	string	$strDateTime
     * @throws 	DataTypeException
     * @return 	integer
     */
    public function diff($objTimeStamp)
    {
        if (!($objTimeStamp instanceof TimeStamp)) {
            throw new DataTypeException("Argument must be of TimeStamp type!");
        }
        return strtotime($this->_value_)-strtotime($objTimeStamp->toValue());
    }

    /**
     * (non-PHPdoc)
     * @see Comparable::compareTo()
     */
    public function compareTo($objTimeStamp)
    {
        if (!($objTimeStamp instanceof TimeStamp)) {
            throw new DataTypeException("Compared argument must be of TimeStamp type!");
        }
        $intValue = strtotime($this->_value_) - strtotime($objTimeStamp->toValue());
        if ($intValue>0) {
            return 1;
        } elseif ($intValue<0) {
            return -1;
        } else {
            return 0;
        }
    }
    
    /**
     * Gets UNIX timestamp for encapsulated timestamp.
     *
     * @return integer
     */
    public function getUnixTime()
    {
        return strtotime($this->_value_);
    }
    
    /**
     * Verifies if input timestamp is valid and respecting YYYY-MM-DD HH:II:SS format.
     *
     * @param 	string	$strDateTime
     * @return 	boolean
     */
    public static function isValid($strDateTime)
    {
        if (preg_match("/(\d{4})-(\d{2})-(\d{2})\ (\d{2}):(\d{2}):(\d{2})/", $strDateTime)==1 && strtotime($strDateTime)!=false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets current timestamp.
     *
     * @return integer
     */
    public static function getCurrent()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * Gets current UNIX timestamp.
     *
     * @return integer
     */
    public static function getCurrentUnixTime()
    {
        return time();
    }
}
