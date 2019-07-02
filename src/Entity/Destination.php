<?php

class Destination
{
    private $_id;
    private $_countryName;
    private $_conjunction;
    private $_computerName;

    public function __construct($id, $countryName, $conjunction, $computerName)
    {
        $this->_id = $id;
        $this->_countryName = $countryName;
        $this->_conjunction = $conjunction;
        $this->_computerName = $computerName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     * @return Destination
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryName()
    {
        return $this->_countryName;
    }

    /**
     * @param mixed $countryName
     * @return Destination
     */
    public function setCountryName($countryName)
    {
        $this->_countryName = $countryName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConjunction()
    {
        return $this->_conjunction;
    }

    /**
     * @param mixed $conjunction
     * @return Destination
     */
    public function setConjunction($conjunction)
    {
        $this->_conjunction = $conjunction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComputerName()
    {
        return $this->_computerName;
    }

    /**
     * @param mixed $computerName
     * @return Destination
     */
    public function setComputerName($computerName)
    {
        $this->_computerName = $computerName;
        return $this;
    }


}
