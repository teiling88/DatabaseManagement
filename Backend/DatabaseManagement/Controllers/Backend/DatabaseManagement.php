<?php

/**
 * Class Shopware_Controllers_Backend_DatabaseManagement
 */
class Shopware_Controllers_Backend_DatabaseManagement extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $userId = Shopware()->Auth()->getIdentity()->id;
        $apiKey = Shopware()->Db()->fetchOne('SELECT apiKey FROM s_core_auth WHERE id=?',array($userId));
        header('Location: http://'.$this->getBasePath().'/engine/Shopware/Plugins/Community/Backend/DatabaseManagement/Components/mywebsql/?apiKey=' . $apiKey);
        die();
    }

    /**
     * @return mixed
     */
    public function getBasePath(){
        return Shopware()->Plugins()->Backend()->DatabaseManagement()->getBasePath();
    }

}