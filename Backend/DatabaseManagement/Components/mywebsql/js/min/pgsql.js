/*
  (c) 2008-2014 Samnan ur Rehman
 @web        http://mywebsql.net
 @license    http://mywebsql.net/license
*/
var db_pgsql={quote:function(a){return-1==a.indexOf(".")?'"'+a+'"':'"'+a.replace(".",'"."')+'"'},escape:function(a){return"'"+a.replace(/\'/g,"''")+"'"}};
