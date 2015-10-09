<?php
/**
 * This file is a part of MyWebSQL package
 *
 * @file:      modules/backup.php
 * @author     Samnan ur Rehman
 * @copyright  (c) 2008-2014 Samnan ur Rehman
 * @web        http://mywebsql.net
 * @license    http://mywebsql.net/license
 */

	function processRequest(&$db) {
		$object_list = $db->getObjectList();
		include_once(BASE_PATH . "/config/backups.php");

		$filename = isset($_REQUEST['filename']) ? v($_REQUEST['filename']) : BACKUP_FILENAME_FORMAT;
		$message = is_dir( BACKUP_FOLDER ) && is_writable( BACKUP_FOLDER ) ?
			'<div class="message ui-state-default">'.__('Select objects to include in backup').'</div>' :
			'<div class="message ui-state-error">'.__('WARNING').': '.__('Backup folder does not exist or is not writable').'</div>';
		$replace = array(
			'MESSAGE' => $message,
			'FILENAME' => htmlspecialchars($filename)
		);

		$folder = $db->name();

		echo view( array($folder.'/backup', 'backup'), $replace, $object_list);
	}

?>