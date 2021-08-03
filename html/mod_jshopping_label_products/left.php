
<div class="module_content product_news <?php echo $moduleclass_sfx ?>">
	<div class="text-center product_news_head"><?=$module->title?></div>
	<div class="news_products">
		<?php foreach($rows as $product){ ?>
			<div class="news_block_item">
				<div class="label_block_left">
					<a href="<?php print $product->product_link?>" class="img_block">
						<?php if($product->_label_image){?><img class="label_img" src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" /><?php } ?>
						<img class="jshop_img" src="<?php print $product->image ? $product->image : $noimage;?>" alt="<?php print htmlspecialchars($product->name);?>" />
					</a>
				</div>
				<div class="label_block_right">	
					<div class="prod_bg">
						<div class="pdoduct_name"><?php print htmlspecialchars($product->name);?></div>
						<div class="product_more text-center">
							<a href="<?php print $product->product_link?>" class="btn_link">Подробнее</a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="clear"></div>
	</div>
</div>