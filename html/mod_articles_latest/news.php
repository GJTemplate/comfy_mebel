<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$header = JModuleHelper::getModule('mod_header');
$params = new JRegistry($header->params);

$class = '';
if($params['news'] == 0){
	$class = "news_left";
	$height = 229;
	$width = 224;
	$class_news = 'col-xs-12 col-sm-12 col-md-6 col-lg-6'; 
}else{
	$class = "news_top";
	$height = 300;
	$width = 570;
	$class_news = 'col-xs-12 col-sm-6 col-md-6 col-lg-6'; 
}
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$module->title;?></div>
	<div class="news <?=$class?>">
		<?php foreach ($list as $item) { ?>
				<?php //Вставляем в файл blog_item.php. Не забываем переопределять на уровне своего шаблона
				$imgsrc = json_decode($item->images)->image_intro;
				if ($imgsrc)
				{
					$h = $height; //Новая высота изображения
					$w = $width; //Новая ширина изображения
					$path_parts = pathinfo($imgsrc);
					$dirname = $path_parts['dirname'].'/resize';
					if(!is_dir($dirname)){
						mkdir($dirname, 0700, true);
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
					$day = date('d', strtotime($item->created));
					$mes = date('m', strtotime($item->created));
					$year = date('Y', strtotime($item->created));
					$date = $day . ' ' . $dateArr[$mes] . ' ' . $year;
				?>
			<div class="<?=$class_news?> news_item">
				<div class="news_img">
					<a href="<?php echo $item->link; ?>"><img src="<?=$file_thumb;?>"></a>
				</div>
				<div class="news_info">
					<div class="news_name"><?php echo $item->title; ?></div>
					<div class="news_date"><?php echo $date; ?></div>
					<div class="news_text"><?php echo $item->introtext; ?></div>
					<div class="news_more"><a href="<?php echo $item->link; ?>">Подробнее</a></div>
				</div>
			</div>	
		<?php } ?>
		<div class="clear"></div>
	</div>
	<div class="news_all text-center"><a href="/news" class="btn_link">Читать все новости</a></div>
</div>