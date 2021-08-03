<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
	
	<div class="filter-field-char-text">
		<h3>
			<?php echo $filter->title; ?>
		</h3>
		
		<input class="inputbox" style="width: 100%; max-width: 218px; text-align: left;" name="char<?php echo $filter->id; ?>" type="text" <?php if (JRequest::getVar('char'.$filter->id)) echo ' value="'.JRequest::getVar('char'.$filter->id).'"'; ?> />
	</div>