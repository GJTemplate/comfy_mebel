<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$checked = JRequest::getVar("attr".$filter->id);

?>
	
	<div class="filter-field-char-multi">
		
			<?php
				echo '<h3>' . $filter->title . '</h3>';
			?>
		
		
		<div class="filter_scrol">	
		<?php
		if($attr_vals) {
			foreach ($attr_vals as $value) {
				$selected = '';
				$active = '';
				if($checked) {
					foreach ($checked as $check) {
						if ($check == $value->id) {
							$selected = ' checked="checked"';
							$active = 'active';
						}
					}
				}				
				
				echo '<label class="' . $active . '">' . $value->name . '<input id="id' . $filter->id .'" class="checkbox_f" type="checkbox" name="char' . $filter->id . '[]" value="' . $value->id . '" ' . $selected . '><div class="chek" for="id' . $filter->id .'"></div></label>';
			}
		}
		?>			
		</div>
	</div>