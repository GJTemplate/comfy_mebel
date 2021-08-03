<?php 
/**
* @version      4.9.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

$in_row = $this->config->product_count_related_in_row;
?>
<?php if (count($this->related_prod)){?>    
    <div class="label_products">
		<?php foreach($this->related_prod as $k=>$product) : ?>    
			<?php include(dirname(__FILE__)."/../".$this->folder_list_products."/".$product->template_block_product);?>
		<?php endforeach; ?> 
    </div> 
<?php }?>