<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

$height = 364;
$width = 560;
$img = json_decode($this->item->images);

?>

<?php //Вставляем в файл blog_item.php. Не забываем переопределять на уровне своего шаблона
$imgsrc = (isset($img->image_intro)) ?  $img->image_intro: '';
if ($imgsrc)
{
	$h = $height; //Новая высота изображения
	$w = $width; //Новая ширина изображения
	$path_parts = pathinfo($imgsrc);
	$dirname = $path_parts['dirname'].'/resize';
	if(!is_dir($dirname)){
		mkdir($dirname, 0755, true);
	}
	$file_thumb = $dirname . '/' .$path_parts['filename'].'_'.$h.'_'.$w.'.'.$path_parts['extension'];
	if (!file_exists($file_thumb) || filemtime($file_thumb) <= filemtime($imgsrc))
	{

	
		$image = new JImage($imgsrc);
		$prop = $image->getWidth()/$image->getHeight();
		$new_image = $image->resize($w, $h, false, JImage::SCALE_OUTSIDE );
		$new_image = $image->crop($w, $h, 0, 0, true);
		$properties = $image->getImageFileProperties($imgsrc);
		switch ($properties->mime)
		{
			case 'image/jpeg':
			$type = IMAGETYPE_JPEG;
			break;
			case 'image/png':
			$type = IMAGETYPE_PNG;
			break;
			case 'image/gif':
			$type = IMAGETYPE_GIF;
			break;
		}
		$new_image->toFile($file_thumb, $type);
	}
	$attr = getimagesize(JURI::base().$file_thumb);
}
?>
<?php
	$dateArr = array(
		'01' => 'Января',
		'02' => 'Февраля',
		'03' => 'Марта',
		'04' => 'Апреля',
		'05' => 'Мая',
		'06' => 'Июня',
		'07' => 'Июля',
		'08' => 'Августа',
		'09' => 'Сентября',
		'10' => 'Октября',
		'11' => 'Ноября',
		'12' => 'Декабря'
	);
	$day = date('d', strtotime($this->item->created));
	$mes = date('m', strtotime($this->item->created));
	$year = date('Y', strtotime($this->item->created));
	$date = $day . ' ' . $dateArr[$mes] . ' ' . $year;
?>
<?php 
if ($params->get('access-view')) :
	$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
else :
	$menu = JFactory::getApplication()->getMenu();
	$active = $menu->getActive();
	$itemId = $active->id;
	$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
	$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
endif; ?>


                  
<div class="block202__col col text_left ">
	<a class="block202__link" href="<?=$link?>">
		<div class="block202__imgbox">
			<div class="block202__img imgBlock" style="background-image: url('<?=$file_thumb?>');"></div>
			<div class="block202__separator"></div>            
		</div>
		<div class="block202__textwrapper ">
			<div class="block202__title heading_name heading_name_xs" style="height: 25px;"><?=$this->item->title?></div>
			<div class="block202__descr description description_xs" style="height: 62px;"><?=$this->item->introtext?></div>            
		</div>
	</a>
</div>						
