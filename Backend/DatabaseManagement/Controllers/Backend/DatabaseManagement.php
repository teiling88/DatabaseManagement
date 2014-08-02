<?php

/**
 * Class Shopware_Controllers_Backend_DatabaseManagement
 */
class Shopware_Controllers_Backend_DatabaseManagement extends Enlight_Controller_Action
{
    public function indexAction()
    {
        $userId = Shopware()->Auth()->getIdentity()->id;
        $sessionId = Shopware()->Db()->fetchOne('SELECT sessionID FROM s_core_auth WHERE id=?',array($userId));
        header('Location: http://'.$this->getBasePath().'/engine/Shopware/Plugins/Community/Backend/DatabaseManagement/Components/mywebsql/?sessionId=' . $sessionId);
        die();
    }

    /**
     * @return mixed
     */
    public function getBasePath(){
        return Shopware()->Plugins()->Backend()->DatabaseManagement()->getBasePath();
    }

}