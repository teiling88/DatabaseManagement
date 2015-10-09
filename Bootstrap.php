<?php

/**
 * @author Thomas Eiling teiling88@gmail.com
 * @copyright  (c) 2015 Thomas Eiling
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
        $this->registerController(
            'Backend',
            'DatabaseManagement',
            'getDatabaseManagementControllerPath'
        );

        $this->createMenuItem(
            array(
                'label' => 'Database Management',
                'class' => 'sprite-ui-scroll-pane-detail',
                'onclick' => 'createSimpleModule("DatabaseManagement", { "title": "Database Management" })',
                'active' => 1,
                'parent' => $this->Menu()->findOneBy('label', 'Einstellungen'),
            )
        );

        return true;
    }

    public function getDatabaseManagementControllerPath()
    {
        $this->Application()->Template()->addTemplateDir($this->Path().'Views/');
        return $this->Path().'Controllers/Backend/DatabaseManagement.php';

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
        return '2.0.0';
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
            'copyright' => 'Copyright &copy; 2015, Thomas Eiling',
            'support' => 'http://www.thomas-eiling.de',
            'link' => 'http://www.thomas-eiling.de',
            'description' => ''
        );
    }
}