<?php 
/**
* @version      4.11.0 17.09.2015
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');

print $this->_tmp_category_html_start;
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
					<h1><?php print $this->category->name?></h1>
					<div class="filter_btn f_in">
						Фильтры
					</div>
					
					<div class="custom_text">
						<?php print $this->category->description?>
					</div>
					
					<?php print $this->_tmp_category_html_before_products;?>
						
					<?php include(dirname(__FILE__)."/products.php");?>
					
					<?php print $this->_tmp_category_html_end;?>
					<div class="custom_text">
						<?php print $this->category->description1?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>