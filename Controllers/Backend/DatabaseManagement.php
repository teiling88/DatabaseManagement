<?php

/**
 * Class Shopware_Controllers_Backend_DatabaseManagement
 */
class Shopware_Controllers_Backend_DatabaseManagement extends Enlight_Controller_Action
{
    /**
     *
     */
    public function indexAction()
    {
        $url = Shopware()->Router()->Assemble().'
        /../../engine/Shopware/Plugins/Community/Backend/DatabaseManagement/vendor/mywebsql';
        $this->View()->url = $url;
    }
}