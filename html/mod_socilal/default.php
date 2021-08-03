<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="social_block <?php echo $moduleclass_sfx ?>">
	<?php if($params['icon1']){ ?>
		<a href="<?=$params['link1']?>" target="_blank"><img src="<?=$params['icon1']?>"></a>
	<?php } ?>
	<?php if($params['icon2']){ ?>
		<a href="<?=$params['link2']?>" target="_blank"><img src="<?=$params['icon2']?>"></a>
	<?php } ?>
	<?php if($params['icon3']){ ?>
		<a href="<?=$params['link3']?>" target="_blank"><img src="<?=$params['icon3']?>"></a>
	<?php } ?>
	<?php if($params['icon4']){ ?>
		<a href="<?=$params['link4']?>" target="_blank"><img src="<?=$params['icon4']?>"></a>
	<?php } ?>
	<?php if($params['icon5']){ ?>
		<a href="<?=$params['link5']?>" target="_blank"><img src="<?=$params['icon5']?>"></a>
	<?php } ?>
	<?php if($params['icon6']){ ?>
		<a href="<?=$params['link6']?>" target="_blank"><img src="<?=$params['icon6']?>"></a>
	<?php } ?>
</div>