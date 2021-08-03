<?php 
/**
* @version      4.14.3 05.11.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<?php print $product->_tmp_var_start?>


		<div class="block_item" title="<?php print htmlspecialchars($product->name);?>">
			<div class="label_block">
				<a href="<?php print $product->product_link?>" class="img_block">
					<?php if($product->_label_image){?><img class="label_img" src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" /><?php } ?>
					<img class="jshop_img" src="<?php print $product->image ? $product->image : $noimage;?>" alt="<?php print htmlspecialchars($product->name);?>" />
				</a>
				<div class="pdoduct_name"><?php print $this->category->name . ' ' . htmlspecialchars($product->name);?></div>
				<div class="price_block">
					<div class="price_old">
						<?=$product->product_old_price > 0 ? 'от '. $product->product_old_price . ' руб.':'&nbsp;'?>
					</div>
					<div class="price_new">
						от <?=$product->product_price?> руб.
					</div>
				</div>
			</div> 
		</div>


<?php print $product->_tmp_var_end?>