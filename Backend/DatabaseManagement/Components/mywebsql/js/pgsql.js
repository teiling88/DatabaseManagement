/**
 * This file is a part of MyWebSQL package
 *
 * @file:      js/pgsql.js
 * @author     Samnan ur Rehman
 * @copyright  (c) 2008-2014 Samnan ur Rehman
 * @web        http://mywebsql.net
 * @license    http://mywebsql.net/license
 */

var db_pgsql = {

	quote: function(name) {
		if(name.indexOf(".") == -1)
			return "\"" + name + "\"";
		return "\"" + name.replace(".", "\".\"") + "\"";
	},

	escape: function(name) {
		return "'" + name.replace(/\'/g, "''") + "'";
	}

}
