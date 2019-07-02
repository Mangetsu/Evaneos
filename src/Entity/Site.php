<?php

class Site
{
    public $_id;
    public $_url;

    public function __construct($id, $url)
    {
        $this->_id = $id;
        $this->_url = $url;
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
     * @return Site
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param mixed $url
     * @return Site
     */
    public function setUrl($url)
    {
        $this->_url = $url;
        return $this;
    }


}
