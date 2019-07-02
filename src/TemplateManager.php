<?php

class TemplateManager
{
    /**
     * @var ApplicationContext
     */
    private $context;

    /**
     * @var Quote
     */
    private $_quote;

    /**
     * @var Destination
     */
    private $_destination;

    /**
     * @var User
     */
    private $_user;

    /**
     * @var Site
     */
    private $_site;

    /**
     * @param Template $tpl
     * @param array $data
     * @return Template
     */
    public function getTemplateComputed(Template $tpl, array $data) {
        if (!$tpl) {
            throw new \RuntimeException('no tpl given');
        }

        $this->initTemplateObjects($data);

        $replaced = clone($tpl);
        $replaced->subject = $this->_computeText($replaced->subject, $data);
        $replaced->content = $this->_computeText($replaced->content, $data);

        return $replaced;
    }

    private function _computeText($text) {
        preg_match_all("/\[[^\]]*\]/", $text, $matches);

        foreach ($matches[0] as $match) {
            $text = str_replace($match, $this->getFieldValue($match), $text);
        }

        return $text;
    }

    /**
     * Init all objects needed by a TemplateManager instance
     *
     * @param $data array Data Array used as a parameter bag (From getTemplateComputed)
     */
    private function initTemplateObjects($data) {
        $this->context = ApplicationContext::getInstance();

        if (!(isset($data['quote']) || !($data['quote'] instanceof Quote))) {
            throw new \RuntimeException('no object of type Quote is found in arguments');
        }

        $this->_user        = (isset($data['user']) and ($data['user'] instanceof User)) ? $data['user'] : $this->context->getCurrentUser();
        $this->_quote       = $data['quote'];
        $this->_site        = SiteRepository::getInstance()->getById($this->_quote->siteId);
        $this->_destination = DestinationRepository::getInstance()->getById($this->_quote->destinationId);
    }

    /**
     * Function to map the placeholder to a getter method,
     * this will allow a dynamic replacement of the placeholder string from the text
     *
     * for each placeholder (ex: [quote:destination_link]) a private function with a camelCase name must be created
     * inside the TemplateManager(ex: getQuoteDestinationLink() ) this method will call it dynamically
     *
     *
     * @param $placeholder string   The placeholder text used in the template text
     * @return string
     */
    private function getFieldValue($placeholder) {
        $placeholder = str_replace(['[', ']'], '', $placeholder);
        $field = explode(':', $placeholder);
        $getter = 'get'.$field[0] . str_replace('_', '', ucwords($field[1], '_'));

        return $this->$getter();
    }

    //Getters and Entity Association mapping
    //TODO: Update Entities with mapped associations instead of object ID and move Getters to entities or a service

    /**
     * Returns the Quote Summary string in HTML
     *
     * @return string
     */
    private function getQuoteSummaryHtml() {
        return $this->renderHtml($this->_quote->id);
    }

    /**
     * Returns the Quote Summary as a simple string
     *
     * @return string
     */
    private function getQuoteSummary() {
        return $this->_quote->id;
    }

    /**
     * Return the user firstname as string
     *
     * @return string
     */
    private function getUserFirstName() {
        return ucfirst(mb_strtolower($this->_user->firstname));
    }

    /**
     * Create the destination link as string
     *
     * @return string
     */
    private function getQuoteDestinationLink() {
        $link = $this->_site->url . '/' . $this->_destination->countryName . '/quote/' . $this->_quote->id;
        return $link;
    }

    /**
     * Return the destination name as string
     *
     * @return string
     */
    private function getQuoteDestinationName() {
        return $this->_destination->countryName;
    }

    /**
     * Renders a string inside an HTML paragraph tag
     *
     * @param $string
     * @return string
     */
    private function renderHtml($string)
    {
        return '<p>'.$string.'</p>';
    }
}
