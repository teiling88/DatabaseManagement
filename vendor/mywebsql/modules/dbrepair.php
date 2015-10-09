<?php
/**
 * This file is a part of MyWebSQL package
 *
 * @file:      modules/dbrepair.php
 * @author     Samnan ur Rehman
 * @copyright  (c) 2008-2014 Samnan ur Rehman
 * @web        http://mywebsql.net
 * @license    http://mywebsql.net/license
 */
	function processRequest(&$db) {

		if (isset($_POST['optype']) && is_array(v($_POST['tables'])) ) {
			checkTables($db);
		}
		else {
			$replace = array();
			echo view('dbrepair', $replace, $db->getTables());
		}
	}

	function checkTables(&$db) {
		$type = v($_POST['optype']);

		$options = array('skiplog' => v($_POST['skiplog']) == 'on' ? TRUE : FALSE);
		$options['checktype'] = v($_POST['checktype']);
		$options['repairtype'] = is_array(v($_POST['repairtype'])) ? v($_POST['repairtype']) : array();

		include(BASE_PATH . "/lib/tablechecker.php");
		$checker = new tableChecker($db);
		$checker->setOperation($type);
		$checker->setTables(v($_POST['tables']));
		$checker->setOptions($options);

		$results = array();
		if ($checker->runCheck())
			$results = $checker->getResults();

		$replace = array('RESULTS' => json_encode($results)
							);

		echo view('dbrepair_results', $replace);
	}

?>