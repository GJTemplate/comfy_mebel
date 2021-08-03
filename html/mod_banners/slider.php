<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_banners
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::register('BannerHelper', JPATH_ROOT . '/components/com_banners/helpers/banner.php');
$baseurl = JUri::base();
?>

<div class="about_slider owl-carousel owl-theme">
	<?php foreach ($list as $item) : ?>
		<?php 
		$imgsrc = $item->params->get('imageurl');
		if ($imgsrc)
		{
			$h = 230; 
			$w = 310; 
			$path_parts = pathinfo($imgsrc);
			$dirname = $path_parts['dirname'].'/resize';
			if(!is_dir($dirname)){
				mkdir($dirname, 0777, true);
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
		<a href="<?=$item->params->get('imageurl');?>" class="fancybox" data-fancybox="about"><img src="<?=$file_thumb?>" class="no_image"></a>
	<?php endforeach; ?>
</div>