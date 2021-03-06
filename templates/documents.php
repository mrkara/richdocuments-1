<script>
	 var rd_instanceId = '<?php p($_['instanceId']) ?>';
	 var rd_version = '<?php p($_['version']) ?>';
	 var rd_sessionId = '<?php p($_['sessionId']) ?>';
	 var rd_permissions = '<?php p($_['permissions']) ?>';
	 var rd_title = '<?php p($_['title']) ?>';
	 var rd_fileId = '<?php p($_['fileId']) ?>';
	 var rd_token = '<?php p($_['token']) ?>';
	 var rd_urlsrc = '<?php p($_['urlsrc']) ?>';
	 var rd_path = '<?php p($_['path']) ?>';
	 var rd_canonical_webroot = '<?php p($_['canonical_webroot']) ?>';
</script>

<?php
style('richdocuments', 'style');
script('richdocuments', 'documents');
script('files', 'file-upload');
script('files', 'jquery.fileupload');
?>

<?php if ($_['show_custom_header']): ?>
	<div id="notification-container">
		<div id="notification"></div>
	</div>
	<header role="banner">
		<div id="header">
			<a href="<?php print_unescaped(link_to('', 'index.php')); ?>" id="owncloud" tabindex="1">
				<h1 class="logo-icon">
					<?php print_unescaped($theme->getHTMLName()); ?>
				</h1>
			</a>
			<div id="logo-claim" style="display:none;"><?php print_unescaped($theme->getLogoClaim()); ?></div>
		</div>
	</header>
<?php endif; ?>

<div id="documents-content">
	<ul class="documentslist">
		<li class="add-document">
			<a class="icon-add add-<?php p($_['doc_format'] === 'ooxml' ? 'docx' : 'odt') ?> svg" target="_blank" href="">
				<label><?php p($l->t('New Document')) ?></label>
			</a>
			<a class="icon-add add-<?php p($_['doc_format'] === 'ooxml' ? 'xlsx' : 'ods') ?> svg" target="_blank" href="">
				<label><?php p($l->t('New Spreadsheet')) ?></label>
			</a>
			<a class="icon-add add-<?php p($_['doc_format'] === 'ooxml' ? 'pptx' : 'odp') ?> svg" target="_blank" href="">
				<label><?php p($l->t('New Presentation')) ?></label>
			</a>
			<div id="upload" title="<?php p($l->t('Upload (max. %s)', [$_['uploadMaxHumanFilesize']])) ?>">
				<form data-upload-id="1"
					  id="data-upload-form"
					  class="file_upload_form"
					  action="<?php print_unescaped(link_to('files', 'ajax/upload.php')); ?>"
					  method="post"
					  enctype="multipart/form-data"
					  target="file_upload_target_1">
					<?php if ($_['uploadMaxFilesize'] >= 0):?>
					<input type="hidden" name="MAX_FILE_SIZE" id="max_upload"
						   value="<?php p($_['uploadMaxFilesize']) ?>" />
					<?php endif;?>
					<!-- Send the requesttoken, this is needed for older IE versions
						 because they don't send the CSRF token via HTTP header in this case -->
					<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>" id="requesttoken" />
					<input type="hidden" class="max_human_file_size"
						   value="(max <?php p($_['uploadMaxHumanFilesize']); ?>)" />
					<input type="file" id="file_upload_start" name='files[]' />
					<a href="#" class="icon-upload upload svg">
					<label><?php p($l->t('Upload')) ?></label></a>
				</form>
			</div>
		</li>
		<li class="progress icon-loading"><div><?php p($l->t('Loading documents...')); ?></div></li>
		<li class="document template" data-id="" style="display:none;">
			<a target="_blank" href=""><label></label></a>
		</li>
	</ul>
</div>
<input type="hidden" id="wopi-url" name="wopi-url" value="<?php p($_['wopi_url']) ?>" />
<?php if ($_['enable_previews']): ?>
<input type="hidden" id="previews_enabled" value="<?php p($_['enable_previews']) ?>" />
<?php endif; ?>
