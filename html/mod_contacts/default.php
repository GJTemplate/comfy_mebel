<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$module->title?></div>
	<div class="contact_block">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="contact_item">
				<div class="info_name"> 
					<?=$params['block1']?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="contact_item">
				<div class="info_name">
					<?=$params['block2']?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="contact_item">
				<div class="info_name">
					<?=$params['block3']?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

