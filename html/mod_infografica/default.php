<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$params['name']?></div>
	<div class="infografic_item <?=$params['variant'] == 0 ? 'variant_left':'variant_top'?>">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image1']?>">
				</div>
				<div class="info_name">
					<?=$params['name1']?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image2']?>">
				</div>
				<div class="info_name">
					<?=$params['name2']?>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image3']?>">
				</div>
				<div class="info_name">
					<?=$params['name3']?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

