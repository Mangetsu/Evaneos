<?php

class Template
{
    public $_id;
    public $_subject;
    public $_content;

    public function __construct($id, $subject, $content)
    {
        $this->_id = $id;
        $this->_subject = $subject;
        $this->_content = $content;
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
     * @return Template
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * @param mixed $subject
     * @return Template
     */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @param mixed $content
     * @return Template
     */
    public function setContent($content)
    {
        $this->_content = $content;
        return $this;
    }


}