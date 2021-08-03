<?php
// No direct access
defined( '_JEXEC' ) or die;
?>

<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 header_left">
	<div class="logo_block">
		<a href="/" class="logo"><img src="<?=$params['logo']?>"></a>
		<a href="/" class="logo_small"><img src="<?=$params['logo_small']?>"></a>
		<?php if($params['logo_text']){?><div class="logo_text"><?=$params['logo_text']?></div><?php } ?>
	</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right header_right">
	<div class="phone_block">
		<?php if($params['phone1']){?>
			<div class="phone phone_one">
				<div <?=$params['phone1_img'] ? 'class="icon_phone" style="background-image:url('.$params['phone1_img'].')"':''?>><?=$params['phone1']?></div>
			</div>
		<?php } ?>
		<?php if($params['phone2']){?>
			<div class="phone phone_two">
				<div <?=$params['phone2_img'] ? 'class="icon_phone" style="background-image:url('.$params['phone2_img'].')"':''?>><?=$params['phone2']?></div>
			</div>
		<?php } ?>
	</div>
	<div class="info_block">
		<?php if($params['search_block']){?>
			<div class="search_block">
				<?php 
					$text = '{loadposition search}';
					echo JHTML::_('content.prepare',$text);
				?>
			</div>
		<?php } ?>
		<button type="button" class="call_btn btn btn-lg" data-toggle="modal" data-target="#callback" <?=$params['callback_events']?>><?=$params['callback']?></button>
	</div>
</div>

