<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset='utf-8';" />
<title>MyWebSQL</title>
<link rel="stylesheet" type="text/css" href="cache.php?css=default" />
<link rel="SHORTCUT ICON" href="favicon.ico" />
</head>
<body style="background-color:white">
<div id="results" style="border:none;position:absolute;left:0px;top:0px;width:100%;height:100%;background-color:white;display:block">
	<table border="0" cellpadding="10" width="100%" style="height:100%">
		<tr><td height="100%" valign="middle" align="center" style="text-align:center;font-size:13px;line-height:30px;">
			<?php echo __('It appears that your browser session has expired'); ?>.<br />
			<?php echo __('Please refresh the webpage to re-login again'); ?>.
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript" language="javascript">
	if (window.parent)
		parent.transferInfoMessage();
</script>
</body></html>
