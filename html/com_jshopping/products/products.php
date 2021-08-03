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
<div class="container">
	<div class="row">
		<div class="content">
			
			<div class="left_sidebar">
				<?php 
					$text = '{loadposition left_sidebar}';
					echo JHTML::_('content.prepare',$text);
				?>
			</div>
			
			<div class="content_wrapper">
				<div class="jshop" id="comjshop">
					<h1 class="h_jh"><?php print $this->header?></h1>
					<div class="sort_block">
						<?php include(dirname(__FILE__)."/../".$this->template_block_form_filter); ?>
					</div>
					<div class="filter_btn">
						Фильтры
					</div>
					<div class="clear"></div>
					<?php if ($this->display_list_products){ ?>
						<div class="jshop_list_product">
						<?php
							
							if (count($this->rows)){
								include(dirname(__FILE__)."/../".$this->template_block_list_product);
							}elseif($this->willBeUseFilter){
								include(dirname(__FILE__)."/../".$this->template_no_list_product);
							}
							if ($this->display_pagination){
								include(dirname(__FILE__)."/../".$this->template_block_pagination);
							}
						?>
						</div>
					<?php }?>

				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>