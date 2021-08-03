<?php
/**
* @version      4.10.5 09.12.2015
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/ 
defined('_JEXEC') or die('Restricted access');
$product = $this->product;
include(dirname(__FILE__)."/load.js.php");

$document = JFactory::getDocument();
$document->setTitle("" . $this->product->name . " купить в Минске, цены в рассрочку на 36 месяцев");
$document->setDescription("Купить " . $this->product->name . " в Минске ✅ Бесплатный 3D-проект и консультация дизайнера ✅ Рассрочка до 36 мес. ➤ Гарантия 24 месяца ➤ Цены и фото в каталоге интернет-магазина Comfy");
?>
<div class="container">
	<div class="row">
		<div class="content">
			<div class="content_wrapper">
				<div class="jshop productfull" id="comjshop">
					<form name="product" method="post" action="<?php print $this->action?>" enctype="multipart/form-data" autocomplete="off">
					
						
						
						<?php print $this->_tmp_product_html_start;?>
						
						<?php if ($this->config->display_button_print) print printContent();?>

						<div class="product">
							<div class="left_product">
								<div class="image_middle">
								
									<?php print $this->_tmp_product_html_before_image;?>
									
									<?php if ($product->label_id){?>
										<div class="product_label">
											<?php if ($product->_label_image){?>
												<img src="<?php print $product->_label_image?>" alt="<?php print htmlspecialchars($product->_label_name)?>" />
											<?php } ?>
										</div>
									<?php }?>
									

									<span id='list_product_image_middle'>
										<?php print $this->_tmp_product_html_body_image?>
										
										<?php if(!count($this->images)){?>
											<img id = "main_image" src = "<?php print $this->image_product_path?>/<?php print $this->noimage?>" alt = "<?php print htmlspecialchars($this->product->name)?>" />
										<?php }?>
										
										<?php foreach($this->images as $k=>$image){?>
											<a class="fancybox" data-fancybox="gallery" id="main_image_full_<?php print $image->image_id?>" href="<?php print $this->image_product_path?>/<?php print $image->image_full;?>" <?php if ($k!=0){?>style="display:none"<?php }?> title="<?php print htmlspecialchars($image->_title)?>">
												<img id = "main_image_<?php print $image->image_id?>" src = "<?php print $this->image_product_path?>/<?php print $image->image_name;?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" />
											</a>
										<?php }?>
									</span>
									
									<?php print $this->_tmp_product_html_after_image;?>

									<?php if ($this->config->product_show_manufacturer_logo && $this->product->manufacturer_info->manufacturer_logo!=""){?>
									<div class="manufacturer_logo">
										<a href="<?php print SEFLink('index.php?option=com_jshopping&controller=manufacturer&task=view&manufacturer_id='.$this->product->product_manufacturer_id, 2);?>">
											<img src="<?php print $this->config->image_manufs_live_path."/".$this->product->manufacturer_info->manufacturer_logo?>" alt="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" title="<?php print htmlspecialchars($this->product->manufacturer_info->name);?>" border="0" />
										</a>
									</div>
									<?php }?>
								</div>
								
								<div class = "span8 jshop_img_description">
									<?php print $this->_tmp_product_html_before_image_thumb;?>
									
									<span id='list_product_image_thumb'>
										<?php if ( (count($this->images)>1) || (count($this->videos) && count($this->images)) ) {?>
											<?php $i = 1; foreach($this->images as $k=>$image){?>
												<img class="jshop_img_thumb <?=$i%3 == 0 ? 'mr':''?>" src="<?php print $this->image_product_path?>/<?php print $image->image_thumb?>" alt="<?php print htmlspecialchars($image->_title)?>" title="<?php print htmlspecialchars($image->_title)?>" onclick="showImage(<?php print $image->image_id?>)" />
											<?php $i++; }?>
										<?php }?>
									</span>
									
									<?php print $this->_tmp_product_html_after_image_thumb;?>
									
									
									<?php print $this->_tmp_product_html_after_video;?>                
								</div>
							</div>
							<div class="right_product">
								<h1> <?php print $this->product->name?></h1>
								<?php
									if($this->product->product_ean){
										echo '<div class="extra_fields_el"><span class="extra_fields_name">Артикул</span>: <span class="extra_fields_value">' . $this->product->product_ean . '</span></div>';
									}
								?>
								<?php if (is_array($this->product->extra_field)){?>
									<div class="extra_fields">
									<?php foreach($this->product->extra_field as $extra_field){?>
										<?php if ($extra_field['grshow']){?>
											<div class='block_efg'>
											<div class='extra_fields_group'><?php print $extra_field['groupname']?></div>
										<?php }?>
										
										<div class="extra_fields_el">
											<span class="extra_fields_name"><?php print $extra_field['name'];?></span><?php if ($extra_field['description']){?> 
												<span class="extra_fields_description">
													<?php print $extra_field['description'];?>
												</span><?php } ?>:
											<span class="extra_fields_value">
												<?php print $extra_field['value'];?>
											</span>
										</div>
														
										<?php if ($extra_field['grshowclose']){?>
											</div>
										<?php }?>
									<?php }?>
									</div>
								<?php }?>
								
								<div class="price">
									<?php if ($this->product->product_old_price > 0){?>
										<div class="old_price">
											от 
											<?php print formatprice($this->product->product_old_price)?>
											<?php print $this->product->_tmp_var_old_price_ext;?>
										</div>
									<?php }?>

									<?php if ($this->product->product_price_default > 0 && $this->config->product_list_show_price_default){?>
										<div class="default_price"><?php print _JSHOP_DEFAULT_PRICE?>: <span id="pricedefault"><?php print formatprice($this->product->product_price_default)?></span></div>
									<?php }?>
									
									<?php print $this->_tmp_product_html_before_price;?>

									<?php if ($this->product->_display_price){?>
										<div class="block_price">
											от 
											<?php print formatprice($this->product->getPriceCalculate())?>
											<?php print $this->product->_tmp_var_price_ext;?>
										</div>
									<?php }?>
								</div>
								
								<div>
									<button type="button" class="zakaz_btn" data-toggle="modal" data-target="#zakaz">Рассчитать стоимость на мои замеры</button>
								</div>
								<div class="more_prod">
									<a href="javascript:void(0)" class="more_link"><span>Подробнее</span><img src="images/morel.png"></a>
								</div>
								
						<?php print $this->_tmp_product_html_before_buttons;?>
						
							<!--<?php if (!$this->hide_buy){?>                         
								<div class="prod_buttons" style="<?php print $this->displaybuttons?>">
									
									<div class="prod_qty">
										<?php print _JSHOP_QUANTITY?>:
									</div>
									
									<div class="prod_qty_input">
										<input type="text" name="quantity" id="quantity" onkeyup="reloadPrices();" class="inputbox" value="<?php print $this->default_count_product?>" /><?php print $this->_tmp_qty_unit;?>
									</div>
											
									<div class="buttons">            
										<input type="submit" class="btn btn-primary button" value="<?php print _JSHOP_ADD_TO_CART?>" onclick="jQuery('#to').val('cart');" />
										
										<?php if ($this->enable_wishlist){?>
											<input type="submit" class="btn button" value="<?php print _JSHOP_ADD_TO_WISHLIST?>" onclick="jQuery('#to').val('wishlist');" />
										<?php }?>
										
										<?php print $this->_tmp_product_html_buttons;?>
									</div>
									
									<div id="jshop_image_loading" style="display:none"></div>
								</div>
							<?php }?>-->
							
							<?php print $this->_tmp_product_html_after_buttons;?>
							</div>
							<div class="clear"></div>
						</div>

						<?php if ($this->product->product_url!=""){?>
							<div class="prod_url">
								<a target="_blank" href="<?php print $this->product->product_url;?>"><?php print _JSHOP_READ_MORE?></a>
							</div>
						<?php }?>

						<?php if ($this->config->product_show_manufacturer && $this->product->manufacturer_info->name!=""){?>
							<div class="manufacturer_name">
								<?php print _JSHOP_MANUFACTURER?>: <span><?php print $this->product->manufacturer_info->name?></span>
							</div>
						<?php }?>
						
						<?php print $this->_tmp_product_html_before_atributes;?>

						<?php if (count($this->attributes)) : ?>
							<div class="jshop_prod_attributes jshop">
								<?php foreach($this->attributes as $attribut) : ?>
									<?php if ($attribut->grshow){?>
										<div>
											<span class="attributgr_name"><?php print $attribut->groupname?></span>
										</div>
									<?php }?>               
									<div class = "row-fluid">
										<div class="span2 attributes_title">
											<span class="attributes_name"><?php print $attribut->attr_name?>:</span>
											<span class="attributes_description"><?php print $attribut->attr_description;?></span>
										</div>
										<div class = "span10">
											<span id='block_attr_sel_<?php print $attribut->attr_id?>'>
												<?php print $attribut->selects?>
											</span>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						
						<?php print $this->_tmp_product_html_after_atributes;?>

						<?php if (count($this->product->freeattributes)){?>
							<div class="prod_free_attribs jshop">
								<?php foreach($this->product->freeattributes as $freeattribut){?>
									<div class = "row-fluid">
										<div class="span2 name">
											<span class="freeattribut_name"><?php print $freeattribut->name;?></span>
											<?php if ($freeattribut->required){?><span>*</span><?php }?>
											<span class="freeattribut_description"><?php print $freeattribut->description;?></span>
										</div>
										<div class="span10 field">
											<?php print $freeattribut->input_field;?>
										</div>
									</div>
								<?php }?>
								<?php if ($this->product->freeattribrequire) {?>
									<div class="requiredtext">* <?php print _JSHOP_REQUIRED?></div>
								<?php }?>
							</div>
						<?php }?>
						
						<?php print $this->_tmp_product_html_after_freeatributes;?>


						
						<?php print $this->product->_tmp_var_bottom_price;?>

						<?php if ($this->config->show_tax_in_product && $this->product->product_tax > 0){?>
							<span class="taxinfo"><?php print productTaxInfo($this->product->product_tax);?></span>
						<?php }?>
						
						<?php if ($this->config->show_plus_shipping_in_product){?>
							<span class="plusshippinginfo"><?php print sprintf(_JSHOP_PLUS_SHIPPING, $this->shippinginfo);?></span>
						<?php }?>
						
						<?php if ($this->product->delivery_time != ''){?>
							<div class="deliverytime" <?php if ($product->hide_delivery_time){?>style="display:none"<?php }?>><?php print _JSHOP_DELIVERY_TIME?>: <?php print $this->product->delivery_time?></div>
						<?php }?>
						
						<?php if ($this->config->product_show_weight && $this->product->product_weight > 0){?>
							<div class="productweight"><?php print _JSHOP_WEIGHT?>: <span id="block_weight"><?php print formatweight($this->product->getWeight())?></span></div>
						<?php }?>

						<?php if ($this->product->product_basic_price_show){?>
							<div class="prod_base_price"><?php print _JSHOP_BASIC_PRICE?>: <span id="block_basic_price"><?php print formatprice($this->product->product_basic_price_calculate)?></span> / <?php print $this->product->product_basic_price_unit_name;?></div>
						<?php }?>
						
						<?php print $this->product->_tmp_var_bottom_allprices;?>


						
						<?php print $this->_tmp_product_html_after_ef;?>

						<?php if ($this->product->vendor_info){?>
							<div class="vendorinfo">
								<?php print _JSHOP_VENDOR?>: <?php print $this->product->vendor_info->shop_name?> (<?php print $this->product->vendor_info->l_name." ".$this->product->vendor_info->f_name;?>),
								( 
								<?php if ($this->config->product_show_vendor_detail){?><a href="<?php print $this->product->vendor_info->urlinfo?>"><?php print _JSHOP_ABOUT_VENDOR?></a>,<?php }?> 
								<a href="<?php print $this->product->vendor_info->urllistproducts?>"><?php print _JSHOP_VIEW_OTHER_VENDOR_PRODUCTS?></a> )
							</div>
						<?php }?>

						<?php if (!$this->config->hide_text_product_not_available){ ?>
							<div class = "not_available" id="not_available"><?php print $this->available?></div>
						<?php }?>

						<?php if ($this->config->product_show_qty_stock){?>
							<div class="qty_in_stock">
								<?php print _JSHOP_QTY_IN_STOCK?>: 
								<span id="product_qty"><?php print sprintQtyInStock($this->product->qty_in_stock);?></span>
							</div>
						<?php }?>



						<input type="hidden" name="to" id='to' value="cart" />
						<input type="hidden" name="product_id" id="product_id" value="<?php print $this->product->product_id?>" />
						<input type="hidden" name="category_id" id="category_id" value="<?php print $this->category_id?>" />
					</form>


					<?php print $this->_tmp_product_html_before_demofiles; ?>
					
					<div id="list_product_demofiles"><?php include(dirname(__FILE__)."/demofiles.php");?></div>
					
					<?php if ($this->config->product_show_button_back){?>
						<div class="button_back">
							<input type="button" class="btn button" value="<?php print _JSHOP_BACK;?>" onclick="<?php print $this->product->button_back_js_click;?>" />
						</div>
					<?php }?>
					

					
					<?php print $this->_tmp_product_html_end;?>
				</div>
			</div>
		</div>
	</div>
</div>
<section class="product_description">
	<div class="container">
		<div class="row">
			<div class="description_top">
				<div class="infografic_item variant_top">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 descr_hear">
						Наши преимущества
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 descr_inf">
						<div class="infografic_block">
							<div class="info_image">
								<img src="images/icon_quarantee1.png">
							</div>
							<div class="info_name">
								Гарантия<br> 24 месяца
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 descr_inf">
						<div class="infografic_block">
							<div class="info_image">
								<img src="images/icon_doc1.png">
							</div>
							<div class="info_name">
								Рассрочка<br> без переплат
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2 descr_inf">
						<div class="infografic_block">
							<div class="info_image">
								<img src="images/icon_pig1.png">
							</div>
							<div class="info_name">
								Экономия<br> до 30%
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="content">
				<div class="description_left">
					<div class="descr_head">Описание</div>
					<div class="descr_text"><?php print $this->product->description; ?></div>
				</div>
				<div class="description_right">
					<?php if (count($this->videos)){?>
						<?php foreach($this->videos as $k=>$video){?>
							<?php if ($video->video_code){ ?>
								<?php echo $video->video_code?>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="product_all">
	<div class="container">
		<div class="row">
			<div class="feat_head">
				<div class="featured_head">Смотрите также</div>
				<a href="/catalog" class="feat_all">Все товары</a>
			</div>
			<div class="featured_products">
				<?php        
					print $this->_tmp_product_html_before_related;
					include(dirname(__FILE__)."/related.php");
				?>
			</div>
		</div>
	</div>
</section>