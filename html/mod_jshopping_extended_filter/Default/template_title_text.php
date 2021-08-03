<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
	
	<div class="filter-field-title-text">
		<h3>
			<?php echo JText::_('MOD_JSHOP_EFILTER_FIELDS_PRODUCT_TITLE_TITLE'); ?>
		</h3>
		
		<input class="inputbox" style="width: 100%; max-width: 218px; text-align: left;" name="title" type="text" <?php if (JRequest::getVar('title')) echo ' value="'.JRequest::getVar('title').'"'; ?> />
	</div>