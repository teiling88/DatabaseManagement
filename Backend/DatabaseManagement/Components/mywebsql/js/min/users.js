/*
  (c) 2008-2012 Samnan ur Rehman
 @web        http://mywebsql.net
 @license    http://mywebsql.net/license
*/
function selectUser(){user=$("#userlist").val();""!=user&&(setMessage(__("Please wait...")),$("#popup_overlay").removeClass("ui-helper-hidden"),wrkfrmSubmit("usermanager","","",user))}function setError(a,b){$("#grid-messages").html(b).addClass("error");$(selectedRow).length&&($(selectedRow).removeClass("sel"),selectedRow=null);$(a).each(function(){$(this).addClass("error")});setTimeout(function(){$(a).each(function(){$(this).removeClass("error")})},2E3)}
function selectAll(){check=$(this).prop("checked");n=$("#grid-tabs").tabs("option","selected");cls="";1==n?cls=".prv":2==n&&(cls=".dbprv");""!=cls&&$(cls).prop("checked",check);$(cls).each(1==n?updatePrivilege:updateDbPrivilege)}function setMessage(a){$("#grid-messages").html(a).removeClass("error")}
function cancelOperation(){$("#grid-tabs").tabs("enable",1).tabs("enable",2);$("#userlist").removeAttr("disabled");$("#button-list").animate({"margin-top":"0px"});$("#btn_cancel,#btn_add2").hide();$("#btn_submit").show();loadUserData()}
function loadUserData(){$("#username").val(USER_INFO.username);$("#hostname").val(USER_INFO.host);currentDb=null;$("#tab-global").html("");html="";for(var a in PRIVILEGE_NAMES)html+='<div class="input float" style="width:160px"><input class="prv" type="checkbox" id="'+a+'" name="'+a+'" ',-1!=$.inArray(a,PRIVILEGES)&&(html+=' checked="checked"'),html+='/><label class="right" for="'+a+'">'+PRIVILEGE_NAMES[a]+"</label></div>";$("#tab-global").html(html);$("#tab-global .prv").click(updatePrivilege);showDbList();
$("#checkboxes").hide();$("#popup_overlay").hide();$("#popup_wrapper").css("display","block");setTimeout(function(){$("#username").focus()},50)}
function showDbList(){html='<div class="padded float" style="width:190px"><select name="db_names" id="db_names" size="13" style="width:170px">';list=DATABASES;for(i=0;i<list.length;i++)cls="",db=list[i],db_privileges=DB_PRIVILEGES[db]||[],0<db_privileges.length&&(cls=' class="used"'),name=htmlchars(db),html+='<option name="'+name+'" value="'+name+'" '+cls+">"+name+"</option>";html+='</select></div><div class="padded float" id="db_privileges" style="width:330px">'+__("Select a database to view privileges for the user")+
"</div>";$("#tab-db").html(html);$("#db_names").change(showDbPrivileges);$("#db_names .used").css("font-weight","bold");$("#db_names").children("option").each(function(a){if($(this).hasClass("used"))return $("#db_names").prop("selectedIndex",a),$("#db_names").trigger("change"),!1})}
function showDbPrivileges(){$("#checkboxes").show();db=$("#db_names").val();currentDbPrivileges=DB_PRIVILEGES[db]||[];html="";for(var a in DB_PRIVILEGE_NAMES)html+='<div class="input float" style="width:140px"><input class="dbprv" type="checkbox" id="db_'+a+'" name="db_'+a+'" ',-1!=$.inArray(a,currentDbPrivileges)&&(html+=' checked="checked"'),html+='/><label class="right" for="db_'+a+'">'+DB_PRIVILEGE_NAMES[a]+"</label></div>";$("#db_privileges").html(html);$("#tab-db .dbprv").click(updateDbPrivilege);
$("#selectall").prop("checked",0==$("#tab-db .dbprv").not(":checked").length)}function updatePrivilege(){prv=$(this).attr("id");if(checked=$(this).prop("checked"))-1==$.inArray(prv,PRIVILEGES)&&PRIVILEGES.push(prv);else for(i=0;i<PRIVILEGES.length;i++)if(PRIVILEGES[i]==prv){PRIVILEGES.splice(i,1);break}}
function updateDbPrivilege(){prv=$(this).attr("id").substr(3);db=$("#db_names").val();if(checked=$(this).prop("checked"))-1==$.inArray(prv,DB_PRIVILEGES[db])&&DB_PRIVILEGES[db].push(prv);else for(i=0;i<DB_PRIVILEGES[db].length;i++)if(DB_PRIVILEGES[db][i]==prv){DB_PRIVILEGES[db].splice(i,1);break}fw=0<DB_PRIVILEGES[db].length?"bold":"normal";$("#db_names option:selected").css("font-weight",fw)}
function addUser(){$("#grid-messages").html("");$("#grid-tabs").tabs("select",0).tabs("disable",1).tabs("disable",2);$("#username,#hostname,#userpass,#userpass2").val("");$("#userlist").attr("disabled","disabled");height="-"+$("#button-list").outerHeight()+"px";$("#button-list").animate({"margin-top":height});$("#btn_submit").hide();$("#btn_cancel,#btn_add2").show()}
function deleteUser(){user=$("#userlist").val();""==user?jAlert(__("Select a User"),__("User Manager")):optionsConfirm(__("Are you sure you want to delete this user account?"),"users.delete",function(a,b,c){a&&(c&&optionsConfirmSave(b),data=JSON.stringify(USER_INFO),wrkfrmSubmit("usermanager","delete","",data))})}
function addNewUser(){username=$("#username").val();hostname=$("#hostname").val();password=$("#userpass").val();password2=$("#userpass2").val();if(""==username||""==hostname||""==password)return jAlert(__("User information is incomplete or invalid"),__("User Manager")),!1;if(password!=password2)return jAlert(__("Passwords do not match"),__("User Manager")),!1;json={username:username,hostname:hostname,pwd:password};query=JSON.stringify(json);setMessage(__("Please wait..."));$("#popup_overlay").removeClass("ui-helper-hidden");
wrkfrmSubmit("usermanager","add","",query)}
function updateUser(){user=$("#userlist").val();if(""==user)return jAlert(__("Select a User"),__("User Manager")),!1;username=$("#username").val();hostname=$("#hostname").val();password=$("#userpass").val();password2=$("#userpass2").val();removepass=$("#nopass").prop("checked")?"1":"0";"1"==removepass&&(password=password2="");if(""==username||""==hostname)return jAlert(__("User information is incomplete or invalid"),__("User Manager")),!1;if(password!=password2)return jAlert(__("Passwords do not match"),__("User Manager")),
!1;json={oldusername:USER_INFO.username,oldhostname:USER_INFO.host,username:username,hostname:hostname,password:password,removepass:removepass,privileges:PRIVILEGES,db_privileges:DB_PRIVILEGES};query=JSON.stringify(json);$("#popup_wrapper").css("display","none");setMessage(__("Please wait..."));wrkfrmSubmit("usermanager","update","",query)};