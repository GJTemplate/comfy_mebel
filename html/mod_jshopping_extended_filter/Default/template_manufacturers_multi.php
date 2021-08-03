<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$checked = JRequest::getVar("manufacturer");

?>
	
	<div class="filter-field-manufacturer-multi">
		<h3>
			<?php echo JText::_('MOD_JSHOP_EFILTER_FIELDS_PRODUCT_MANUFACTURER_TITLE'); ?>
		</h3>
		
		<div class="filter_scrol">
			<?php
				if($manufacturers) {
					foreach($manufacturers as $manufacturer) {
						$selected = '';
						$active = '';
						if($checked) {
							foreach ($checked as $check) {
								if ($check == $manufacturer->manufacturer_id){
									$selected = ' checked="checked"';
									$active = 'active';
								}
							}
						}
						echo '<label class="' . $active . '">' . $manufacturer->name . '<input id="id' . $manufacturer->manufacturer_id .'" class="checkbox_f" type="checkbox" name="manufacturer[]" value="' . $manufacturer->manufacturer_id . '" ' . $selected . '><div class="chek" for="id' . $manufacturer->manufacturer_id .'"></div></label>';
						//echo "<option value='".$manufacturer->manufacturer_id."'".$selected.">".$manufacturer->name."</option>";
					}
				}
			?>		
		</div>	
	</div>
	
	
