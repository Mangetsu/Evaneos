<?php

class Quote
{
    private $_id;
    private $_siteId;
    private $_destinationId;
    private $_dateQuoted;

    public function __construct($id, $siteId, $destinationId, $dateQuoted)
    {
        $this->_id = $id;
        $this->_siteId = $siteId;
        $this->_destinationId = $destinationId;
        $this->_dateQuoted = $dateQuoted;
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
     * @return Quote
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSiteId()
    {
        return $this->_siteId;
    }

    /**
     * @param mixed $siteId
     * @return Quote
     */
    public function setSiteId($siteId)
    {
        $this->_siteId = $siteId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDestinationId()
    {
        return $this->_destinationId;
    }

    /**
     * @param mixed $destinationId
     * @return Quote
     */
    public function setDestinationId($destinationId)
    {
        $this->_destinationId = $destinationId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateQuoted()
    {
        return $this->_dateQuoted;
    }

    /**
     * @param mixed $dateQuoted
     * @return Quote
     */
    public function setDateQuoted($dateQuoted)
    {
        $this->_dateQuoted = $dateQuoted;
        return $this;
    }



}