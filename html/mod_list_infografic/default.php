<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$params['name']?></div>
	<div class="infografic_list">
		<?php if($params['image1'] && $params['text1']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image1']?>">
				</div>
				<div class="info_name">
					<?=$params['text1']?>
				</div>
			</div>
		<?php } ?>
		<?php if($params['image2'] && $params['text2']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image2']?>">
				</div>
				<div class="info_name">
					<?=$params['text2']?>
				</div>
			</div>
		<?php } ?>
		<?php if($params['image3'] && $params['text3']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image3']?>">
				</div>
				<div class="info_name">
					<?=$params['text3']?>
				</div>
			</div>
		<?php } ?>
		<?php if($params['image4'] && $params['text4']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image4']?>">
				</div>
				<div class="info_name">
					<?=$params['text4']?>
				</div>
			</div>
		<?php } ?>
		<?php if($params['image5'] && $params['text5']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image5']?>">
				</div>
				<div class="info_name">
					<?=$params['text5']?>
				</div>
			</div>
		<?php } ?>
		<?php if($params['image6'] && $params['text6']){?>
			<div class="infografic_block">
				<div class="info_image">
					<img src="<?=$params['image6']?>">
				</div>
				<div class="info_name">
					<?=$params['text6']?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

