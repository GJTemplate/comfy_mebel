<?php
// No direct access
defined( '_JEXEC' ) or die;
?>
<div class="module_content <?php echo $moduleclass_sfx ?>">
	<div class="header_name"><?=$module->title?></div>
	<div class="uslugi">
		<div class="usluga_item usluga_1">
			<?php if($params['link1']){ ?>
				<a href="<?=$params['link1']?>">
			<?php }?>
			
			<img src="<?php echo imageResize($params['image1'], $params['height'], $params['width']); ?>">
			<div class="usluga_text"><?=$params['text1']?></div>
			
			<?php if($params['link1']){ ?>
				</a>
			<?php }?>
		</div>
		<div class="usluga_item usluga_2">
			<?php if($params['link2']){ ?>
				<a href="<?=$params['link2']?>">
			<?php }?>
			
			<img src="<?php echo imageResize($params['image2'], $params['height'], $params['width']); ?>">
			<div class="usluga_text"><?=$params['text2']?></div>
			
			<?php if($params['link2']){ ?>
				</a>
			<?php }?>
		</div>
		<div class="usluga_item usluga_3">
			<?php if($params['link3']){ ?>
				<a href="<?=$params['link3']?>">
			<?php }?>
			
			<img src="<?php echo imageResize($params['image3'], $params['height'], $params['width']); ?>">
			<div class="usluga_text"><?=$params['text3']?></div>
			
			<?php if($params['link3']){ ?>
				</a>
			<?php }?>
		</div>
		<div class="usluga_item usluga_4">
			<?php if($params['link4']){ ?>
				<a href="<?=$params['link4']?>">
			<?php }?>
			
			<img src="<?php echo imageResize($params['image4'], $params['height'], $params['width']); ?>">
			<div class="usluga_text"><?=$params['text4']?></div>
			
			<?php if($params['link4']){ ?>
				</a>
			<?php }?>
		</div>
		<div class="clear"></div>
	</div>
</div>


<?php 
function imageResize($imgsrc, $height, $width){
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
	
	return $file_thumb;
}
?>