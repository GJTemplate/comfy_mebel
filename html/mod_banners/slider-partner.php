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

<div class="owl-carousel owl-theme">
	<?php foreach ($list as $item) : ?>
		<a href="<?=$item->clickurl ? $item->clickurl : 'javascript:void(0)'?>" <?=$item->clickurl ? 'target="_blank"':''?>><img src="<?=$imgsrc = $item->params->get('imageurl');?>"></a>
	<?php endforeach; ?>
</div>