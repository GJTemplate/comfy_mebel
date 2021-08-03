<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$checked = JRequest::getVar("char".$filter->id);

?>
	
	<div class="filter-field-char-multi">
		
			<?php
				switch($filter->id){
					/*case 8:
						echo '<h3>Выберите свой город:</h3>';
						break;*/
					/*case 9:
						echo '';
						break;*/
					default:
					echo '<h3>' . $filter->title . '</h3>';
				}
			?>
		
		
		<div class="filter_scrol">	
		<?php
		if($char_vals) {
			foreach ($char_vals as $value) {
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
				
				switch($filter->id){
					/*case 8:
						echo '<label class="' . $active . '">' . $value->name . '<input type="checkbox" name="char' . $filter->id . '[]" value="' . $value->id . '" ' . $selected . '></label>';
						break;*/
					case 5:
						$style = "background-color:" . $value->image . ";";
						
						if($value->image == 'all'){
							$style = "background:url(images/all.jpg) center center no-repeat;";
						}
						echo '<label class="' . $active . '"><div class="filter_image" style="' . $style . '"><input id="id' . $filter->id .'" class="checkbox_f" type="checkbox" name="char' . $filter->id . '[]" value="' . $value->id . '" ' . $selected . '><div class="chek" for="id' . $filter->id .'"></div></div></label>';
						break;
					default:
						echo '<label class="' . $active . '">' . $value->name . '<input id="id' . $filter->id .'" class="checkbox_f" type="checkbox" name="char' . $filter->id . '[]" value="' . $value->id . '" ' . $selected . '><div class="chek" for="id' . $filter->id .'"></div></label>';
				}
			}
		}
		?>			
		</div>
	</div>