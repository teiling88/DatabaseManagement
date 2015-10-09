<link href='cache.php?css=theme,default,grid,alerts,editor' rel="stylesheet" />

<style type="text/css">
	#indexlist	{ width:200px; padding:5px }
	#indexlist option	{ padding:5px; font-family:arial; font-size: 12px; }
	#dialog-list label { margin: 5px 10px; }
	#dialog-list input[type="text"] { width: 100px; float: right }
</style>

<div id="popup_wrapper">
	<div id="popup_contents">
	<div class="padded"><?php echo __('For tables with large dataset, it is recommended to modify and save indexes one by one'); ?></div>
		<div id="grid-tabs">
		<div id="grid-messages">{{MESSAGE}}</div>
			<ul>
				<li><a href="#tab-indexes"><?php echo __('Table Indexes'); ?></a></li>
				<li><a href="#tab-messages"><?php echo __('Messages'); ?></a></li>
			</ul>
			<div class="ui-corner-bottom">
				<div id="tab-indexes">
					<div style="width:210px;float:left;padding:10px">
						<select name="indexlist" id="indexlist" size="10"><option name="dummy" value=""></option></select>
					</div>
					<div style="float:left; padding:10px">
						<div id="indextype" style="text-align:right; padding:5px 0">
							<input type='checkbox' id="chk_primary" name="chk_primary"><label class="right" for="chk_primary"><?php echo __('Primary'); ?></label>
							&nbsp;&nbsp;&nbsp;<input type='checkbox' id="chk_unique" name="chk_unique"><label class="right" for="chk_unique"><?php echo __('Unique'); ?></label>
							&nbsp;&nbsp;&nbsp;<input type='checkbox' id="chk_fulltext" name="chk_fulltext"><label class="right" for="chk_fulltext"><?php echo __('Full Text'); ?></label>
						</div>
						<table border="0" cellspacing="1" cellpadding="2" id="table_grid" width="100%"><tbody>
							<tr id='fhead'>
								<th style="width:30px">&nbsp;</th>
								<th style="width:200px"><?php echo __('Field Name'); ?></th>
								<th style="width:130px"><?php echo __('Data Type'); ?></th>
							</tr>
						</tbody></table>
						<div style="text-align:right; padding:5px 0">
							<input type='button' id='btn_addfield' value='<?php echo __('Add Field'); ?>' />
							<input type='button' id='btn_delfield' value='<?php echo __('Delete Selected Field(s)'); ?>' />
						</div>
					</div>
				</div>
				<div id="tab-messages">
					<?php echo __('Waiting for index information to be submitted'); ?>
				</div>
			</div>
		</div>
	</div>

	<div id="popup_footer">
		<div id="popup_buttons">
			<input type='button' id='btn_add' value='<?php echo __('Add Index'); ?>' />
			<input type='button' id='btn_edit' value='<?php echo __('Edit Index'); ?>' />
			<input type='button' id='btn_save' value='<?php echo __('Done'); ?>' />
			<input type='button' id='btn_del' value='<?php echo __('Delete Selected Index'); ?>' />
			<input type='button' id='btn_cancel' value='<?php echo __('Cancel'); ?>' />
			<input type='button' id='btn_submit' value='<?php echo __('Save All Changes'); ?>' tabindex="1" />
		</div>
	</div>

</div>

<div id="dialog-list" title="<?php echo __('Field List'); ?>">
	<div class="padded">
		<div>
			<select size="8" name="list-items" id="list-items"></select>
		</div>
		<div>
			<label><?php echo __('Field Length'); ?>:</label><input type="text" name="flength" id="flength" class="text ui-widget-content" />
		</div>
	</div>
</div>

<script type="text/javascript" language='javascript' src="cache.php?script=common,jquery,ui,indexes,position,query,cookies,settings,alerts,hotkeys"></script>
<script type="text/javascript" language="javascript">
window.title = "<?php echo __('Index Manager'); ?>";
var tableName = "{{TABLE_NAME}}";
var fieldInfo = {{FIELDS}};
var indexInfo = {{INDEXES}};

$(function() {
	setupIndexes();
});
</script>