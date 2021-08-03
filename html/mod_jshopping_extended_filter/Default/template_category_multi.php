<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$checked = JRequest::getVar("category");

?>
	
	<div class="filter-field-category-multi">
		<h3>
			<?php echo JText::_('MOD_JSHOP_EFILTER_FIELDS_PRODUCT_CATEGORY_TITLE'); ?>
		</h3>
		
		<select name="category[]" multiple="multiple">		
		<?php
			if($categories) {
				foreach($categories as $category) {
					$selected = '';
					if($checked) {
						foreach ($checked as $check) {
							if ($check == $category->category_id) $selected = ' selected="selected"';
						}
					}
					echo "<option value='".$category->category_id."'".$selected.">".$category->name."</option>";
				}
			}
		?>		
		</select>		
	</div>