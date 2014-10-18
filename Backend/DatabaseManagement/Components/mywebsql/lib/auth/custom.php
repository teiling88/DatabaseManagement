<?php

/**
 * This file is a part of MyWebSQL package
 *
 * @file           lib/auth/custom.sample.php
 * @author         Samnan ur Rehman
 * @copyright  (c) 2008-2012 Samnan ur Rehman
 * @web        http://mywebsql.net
 * @license        http://mywebsql.net/license
 */
class MyWebSQL_Auth_Custom
{
    private $error;

    /* implement main authentication mechanism here */
    public function authenticate($userid, $password, $server)
    {
        /*
         * $server = array(0 => <<display name of server>>, 1 => <<Server information array>>)
         */
        $apiKey = $_GET['apiKey'];
        $includeDir = realpath(getcwd() . '/../../../../../../../../');
        $dbConfig = include($includeDir . '/config.php');
        set_include_path($includeDir . '/engine/Library/');
        include($includeDir . '/engine/Library/Zend/Db.php');
        $db = Zend_Db::factory('Pdo_Mysql', $dbConfig['db']);

        $data = $db->fetchOne('SELECT id FROM s_core_auth WHERE apiKey = ? AND active = ? AND roleID = ?', array($apiKey, 1, 1));

        // CHANGE THE FOLLOWING FOR PROPER AUTHENTICATION BEHAVIOUR */
        if ($data > 0) {

            $includeDir = realpath(getcwd() . '/../../../../../../../../');
            $dbConfig = include($includeDir . '/config.php');

            // the following is required for proper functionality after authentication
            Session::set('auth', 'valid', true);
            Session::set('auth', 'server_name', 'Localhost MySQL', true);
            Session::set('auth', 'host', $dbConfig['db']['host'], true);
            Session::set('db', 'driver', 'mysqli');
            Session::set('auth', 'user', $dbConfig['db']['username'], true);
            Session::set('auth', 'pwd', $dbConfig['db']['password'], true);
            Session::set('auth', 'ShopwareSessionId', $sessionId);

            header('Location: ' . EXTERNAL_PATH);

            return true;
        } else {
            $this->setError(__('Invalid Credentials'));
        }

        return false;
    }

    /* return true or false from this function to show or hide the server list on login page */
    public static function showServerList()
    {
        return false;
    }

    /* this function should return the basic auth parameters if auth is successful */
    public function getParameters()
    {
        $param = array(
            'host' => Session::get('auth', 'host', true),
            'driver' => Session::get('db', 'driver'),
            'username' => Session::get('auth', 'user', true),
            'password' => Session::get('auth', 'pwd', true)
        );

        return $param;
    }

    /* leave the following functions unchanged */

    public function getError()
    {
        return $this->error;
    }

    private function setError($str)
    {
        $this->error = $str;

        return false;
    }
}

?>