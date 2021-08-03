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

<div class="brand_slider owl-carousel owl-theme">
	<?php foreach ($list as $item) : ?>
		<div class="brand_item" style="background:#fff url('<?=$item->params->get('imageurl');?>') 50% 50% no-repeat;"></div>
	<?php endforeach; ?>
</div>