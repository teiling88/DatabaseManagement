<link href='cache.php?css=theme,default,grid,alerts,editor' rel="stylesheet" />

<div id="popup_wrapper">
	<div id="popup_contents">
		<table border="0" cellspacing="1" cellpadding="2" id="table_grid"><tbody>
			<tr id='fhead'>
				<th style="width:120px"><?php echo __('Table'); ?></th>
				<th style="width:100px"><?php echo __('Status'); ?></th>
				<th style="width:350px"><?php echo __('Message'); ?></th>
			</tr>
		</tbody></table>
	</div>
</div>

<script type="text/javascript" language='javascript' src="cache.php?script=common,jquery,ui,position,query"></script>
<script type="text/javascript" language="javascript">

var results = {{RESULTS}};

$(function() {
	for(var table in results) {
		data = results[table];
		html = $('<tr><td></td><td></td><td></td></tr>');
		html.children('td').each(function(index) {
			switch(index) {
				case 0: $(this).text(table); break;
				case 1: $(this).text(data['type']); break;
				case 2: $(this).text(data['msg']); break;
			}
		});
		$('#table_grid tbody').append(html);
	};
});
</script>