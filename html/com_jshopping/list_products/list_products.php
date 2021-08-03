<?php 
/**
* @version      4.9.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>

<div class="custom_text">
	<?php print $this->description?>
</div>
<div class="jshop " id="comjshop_list_product">
	<?php print $this->_tmp_list_products_html_start?>
	
	<div class="label_products">
		<?php $i = 1; foreach ($this->rows as $k=>$product) : ?>
			<?php include(dirname(__FILE__)."/".$product->template_block_product);?> 
		<?php $i++; endforeach; ?>
	</div>
	
	<?php print $this->_tmp_list_products_html_end;?>
</div>
<div class="custom_text">
	<?php print $this->description1?>
</div>