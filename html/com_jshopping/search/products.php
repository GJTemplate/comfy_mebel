<?php 
/**
* @version      4.3.1 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<div class="search_jshop jshop list_product jshop_list_product " id="comjshop_list_product">
	<h1><?php print _JSHOP_SEARCH_RESULT?> <?php if ($this->search) print '"'.$this->search.'"';?></h1>
	<?php 
		$text = '{loadposition search_jshop}';
		echo JHTML::_('content.prepare',$text);
	?>
	<?php if (count($this->rows)){ ?>
		<div class="label_products">
		<?php
			include(dirname(__FILE__)."/../".$this->template_block_form_filter);
			if (count($this->rows)){
				include(dirname(__FILE__)."/../".$this->template_block_list_product);
			}
			if ($this->display_pagination){
				include(dirname(__FILE__)."/../".$this->template_block_pagination);
			}
		?>
		</div>
	<?php }?>
</div>

