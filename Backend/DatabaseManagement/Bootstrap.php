<?php
/**
 * @author Thomas Eiling teiling88@gmail.com
 * @copyright  (c) 2014 Thomas Eiling
 * @web        http://www.thomas-eiling.de
 */
class Shopware_Plugins_Backend_DatabaseManagement_Bootstrap extends Shopware_Components_Plugin_Bootstrap
{
    /**
     * Install plugin method
     *
     * @return bool
     */
    public function install()
    {
        $this->createEvents();

        return true;
    }

    /**
     * getLabel function returns the label
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Database Management';
    }

    /**
     * returns the actual version
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * function which subscribe all needed events
     */
    private function createEvents()
    {
        $this->registerController('Backend', 'DatabaseManagement');
        $this->createMenuItem(
            array(
                'label'      => 'Database Management',
                'class'      => 'sprite-ui-scroll-pane-detail',
                'active'     => 1,
                'onClick'     => "window.open('http://".$this->getBasePath()."/backend/DatabaseManagement','Database Management','width=800,height=550,scrollbars=yes')",
                'parent'     => $this->Menu()->findOneBy('label', 'Einstellungen'),
                'style'      => 'background-position: 5px 5px;'
            )
        );
    }

    /**
     * returns
     *
     * @return array
     */
    public function getInfo()
    {
        return array(
            'version' => $this->getVersion(),
            'label' => $this->getLabel(),
            'autor' => 'Thomas Eiling',
            'copyright' => 'Copyright &copy; 2014, Thomas Eiling',
            'support' => 'http://www.thomas-eiling.de',
            'link' => 'http://www.thomas-eiling.de',
            'description' => ''
        );
    }

    /**
     * function to get the shop basepath
     *
     * @return string
     */
    public function getBasePath()
    {
        if (Shopware()->Bootstrap()->issetResource('Shop')) {
            $shopId = Shopware()->Shop()->getId();
        } else {
            $sql = Shopware()->Db()->select()
                ->from('s_core_shops', 'id')
                ->where('main_id IS NULL')
                ->order('id ASC')
                ->limit(1);
            $shopId = Shopware()->Db()->fetchOne($sql);
        }

        $sql = '
          SELECT concat(host,IF(base_path IS NULL,"",base_path), IF(base_url IS NULL,"",base_url)) as url
          FROM s_core_shops
          WHERE id=:id';
        $params = array(':id' => $shopId);
        $url = Shopware()->Db()->fetchOne($sql,$params);

        return $url;
    }
}