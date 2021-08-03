<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;


    if( $_SERVER['HTTP_X_REAL_IP'] == '178.209.70.115')
    {
      /*  $this->db = JFactory::getDbo();
        $Query = $this->db->getQuery(true) ;
        $Query->select('*')
            ->from( $this->db->quoteName('#__user_usergroup_map'));
//        $where = [];
//        $Query->where($where);
        $this->db->setQuery( $Query ) ;

        $res = $this->db->loadObjectList();


        $query = $this->db->getQuery(true);
        // Условия обновления
        $conditions = array(
            $this->db->quoteName('user_id') . ' = '  . $this->db->quote( '177' ),
            $this->db->quoteName('group_id') . ' = '  . $this->db->quote( '7' ),
        );

        $quoteProduct_quantity = $this->db->quoteName('product_quantity') ;

        $query->update($this->db->quoteName('#__user_usergroup_map'))
            ->set( $this->db->quoteName('group_id') . '=' . $this->db->quote( '8' )   )
            ->where($conditions);
//  echo $query->dump();

// Устанавливаем и выполняем запрос
        $this->db->setQuery($query);
        $this->db->execute();



echo'<pre>';print_r( $res );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
die(__FILE__ .' '. __LINE__ );*/


    }#END IF











// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');





//$pageClassSuffix = JSite::getMenu()->getActive()? JSite::getMenu()->getActive()->params->get('pageclass_sfx', '') : '';

    $menuActive =  JFactory::getApplication()->getMenu('site')->getActive();
    $Params = $menuActive->getParams();
    $pageClassSuffix = $Params->get('pageclass_sfx' , '' ) ;
//    echo'<pre>';print_r( $Params );echo'</pre>'.__FILE__.' '.__LINE__ . PHP_EOL;
//
//    die(__FILE__ . ' ' . __LINE__);






    // Output as HTML5
$doc->setHtml5(true);

/*Отключаем стандартные скрипты*/
$headlink = $this->getHeadData();
unset($headlink['scripts']['/media/system/js/caption.js']);
unset($headlink['scripts']['/media/system/js/validate.js']);
unset($headlink['scripts']['/media/system/js/mootools-core.js']);
unset($headlink['scripts']['/media/system/js/mootools-more.js']);
unset($headlink['scripts']['/media/system/js/core.js']);
unset($headlink['scripts']['/media/jui/js/bootstrap.min.js']);
unset($headlink['scripts']['/media/jui/js/jquery-noconflict.js']);
$this->setHeadData($headlink);

/*Вызываем модуль с настройками*/
$header = JModuleHelper::getModule('mod_header');
$mod_params = new JRegistry($header->params);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="/templates/<?=$this->template ?>/css/main.min.css">
	<link rel="stylesheet" href="/templates/<?=$this->template ?>/css/bootstrap.css">
	<link rel="stylesheet" href="/templates/<?=$this->template ?>/css/style.css?v=<?=time()?>">
	<link rel="stylesheet" href="/templates/<?=$this->template ?>/css/media.css">

	<link href="/templates/<?=$this->template ?>/js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link href="/templates/<?=$this->template ?>/js/owl-carousel/owl.theme.css" rel="stylesheet">


	<!--<script src="/templates/<?=$this->template ?>/js/jquery-1.11.1.min.js"></script>-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	<script src="/templates/<?=$this->template ?>/js/owl-carousel/owl.carousel.min.js"></script>
	<script src="/templates/<?=$this->template ?>/js/bootstrap.js"></script>
	<script src="/templates/<?=$this->template ?>/libs/jq-mask/jquery.maskedinput.min.js"></script>
	<script src="/templates/<?=$this->template ?>/libs/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
	<script src="/templates/<?=$this->template ?>/js/main.js"></script>
	<script src="/templates/<?=$this->template ?>/js/common.js"></script>


	<script type="text/javascript" src="/templates/<?=$this->template ?>/js/fancybox3/jquery.fancybox.js"></script>
	<link href="/templates/<?=$this->template ?>/js/fancybox3/jquery.fancybox.css" rel="stylesheet" type="text/css"  media="screen" />

</head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154242519-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-154242519-1');
</script>

<body class="<?=$pageClassSuffix?>">
	<div class="hidden_form">
		<?php echo JHTML::_('content.prepare', '{chronoforms5}hidden_form{/chronoforms5}');?>
	</div>

    <section class="header">
		<div class="container">
			<div class="row">
				<header>
					<div class="header_top">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 header_left">
							<div class="logo_block">
								<a href="/" class="logo"><img src="/templates/<?=$this->template?>/images/logo.png"></a>
								<div class="logo_text">Фабричное производство <br>кухонь в Минске</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 text-right header_right">
							<div class="header_inline header_time">
								<img src="/templates/<?=$this->template?>/images/icon_clock.png">
								10.00-20.00, без выходных
							</div>
							<div class="header_inline header_address">
								г. Минск, ТЦ Ленинград, павильон 70
							</div>
							<div class="header_inline header_tel">
								<a href="tel:+375297734509" class="head_tel f_tel"><img src="/templates/<?=$this->template?>/images/mts.png">+375 (29) 773-45-09</a>
								<a href="tel:+375293734509" class="head_tel"><img src="/templates/<?=$this->template?>/images/velcom.png">+375 (29) 373-45-09</a>
								<a href="javascript:void(0)" class="call_btn" data-toggle="modal" data-target="#callback">Заказать звонок</a>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="header_bottom">
						<div class="main_menu">
							<a href="#menu" id="toggle">
								<div class="toggle_menu"><span></span></div>
							</a>
							<div class="menu_block" id="menu">
								<jdoc:include type="modules" name="menu" />
								<div class="menu_info">
									<div class="header_inline header_time">
										<img src="/templates/<?=$this->template?>/images/icon_clock.png">
										10.00-20.00, без выходных
									</div>
									<div class="header_inline header_address">
										ТЦ Ленинград, павильон 70
									</div>
									<div class="header_inline header_tel h_tel">
										<a href="tel:+375297734509" class="head_tel f_tel"><img src="/templates/<?=$this->template?>/images/mts.png">+375 (29) 773-45-09</a>
										<a href="tel:+375293734509" class="head_tel"><img src="/templates/<?=$this->template?>/images/velcom.png">+375 (29) 373-45-09</a>
									</div>
									<div class="header_inline header_tel">
										<a href="javascript:void(0)" class="call_btn" data-toggle="modal" data-target="#callback">Заказать звонок</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>
			</div>
		</div>
	</section>

	<div class="wrap">

		<?php if ($this->countModules('breadcrumbs')) { ?>
			<div class="container">
				<div class="row">
					<jdoc:include type="modules" name="breadcrumbs" />
				</div>
			</div>
		<?php } ?>

		<jdoc:include type="message" />
		<jdoc:include type="component" />

		<?php if (JUri::base() === JUri::current()) {?>
			<section class="slider">
				<div class="container">
					<div class="row">
						<div class="slide_info">
							<div class="slider_head">Производим надежные фабричные <br>кухни с 2011 года в Минске</div>
							<div class="slider_content">
								<div class="slider_item">
									<img src="/templates/<?=$this->template?>/images/icon_quarantee.png">
									<span>Гарантия 24 месяца</span>
								</div>
								<div class="slider_item">
									<img src="/templates/<?=$this->template?>/images/icon_doc.png">
									<span>Рассрочка без переплат</span>
								</div>
								<div class="slider_item">
									<img src="/templates/<?=$this->template?>/images/icon_pig.png">
									<span>Экономия до 30%</span>
								</div>
							</div>
							<div class="slider_link">
								<a href="javascript:void(0)" class="get_price" data-toggle="modal" data-target="#getPrice">Узнать стоимость</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_tabs">
				<div class="container">
					<div class="row">
						<div class="tabs_block">
							<ul class="nav nav-tabs">
								<li class="active">
									<a data-toggle="tab" href="#tab1">
										<img src="/templates/<?=$this->template?>/images/tab1.png">
										<span class="desktop">Акционные предложения</span>
										<span class="mobile">Акции</span>
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab2">
										<img src="/templates/<?=$this->template?>/images/tab2.png">
										<span class="desktop">Новинки в каталоге</span>
										<span class="mobile">Новинки</span>
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#tab3">
										<img src="/templates/<?=$this->template?>/images/tab3.png">
										<span class="desktop">Хит продаж</span>
										<span class="mobile">Хит продаж</span>
									</a>
								</li>
							</ul>

							<div class="tabs_content">
								<div id="tab1" class="tab-pane fade in active">
									<jdoc:include type="modules" name="sale" />
								</div>
								<div id="tab2" class="tab-pane fade">
									<jdoc:include type="modules" name="new" />
								</div>
								<div id="tab3" class="tab-pane fade">
									<jdoc:include type="modules" name="hit" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_download">
				<div class="container">
					<div class="row">
						<div class="download_block">
							<div class="download_left">
								<img src="/templates/<?=$this->template?>/images/download_image.png" class="desktop">
								<img src="/templates/<?=$this->template?>/images/download_image_mobile.png" class="mobile">
							</div>
							<div class="download_right">
								<div class="download_head">
									Скачайте наш полный <br>
									каталог кухонь с фотографиями,<br>
									описаниями и ценами
								</div>
								<div class="download_form">
									<?php echo JHTML::_('content.prepare', '{chronoforms5}download{/chronoforms5}');?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_about">
				<div class="container">
					<div class="row">
						<div class="about_block">
							<div class="header_name">
								Специализируемся на надежных <br>и уютных кухнях
							</div>
							<div class="infografic_item variant_top">
								<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/about_icon1.png">
										</div>
										<div class="info_name">
											8 лет на рынке <br>мебели
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/about_icon2.png">
										</div>
										<div class="info_name">
											914 сделанных <br>кухонь
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/about_icon3.png">
										</div>
										<div class="info_name">
											94% довольных <br>клиентов
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/about_icon4.png">
										</div>
										<div class="info_name">
											24 месяца <br>гарантия
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="about_info">
								<div class="about_left">
									<div class="about_author">Дмитрий Устинов</div>
									<div class="about_spec">Директор компании</div>
									<div class="about_descr">
									С 2011 года мы делаем мебель для наших клиентов. В настоящее время наше производство расположено на мебельной фабрике Мебель Холл, что позволяет нам воплощать любые ваши пожелания.
Мы хотим делать кухни, которые будут радовать вас каждый день. Слоган нашей компании "Кухни, которые вам улыбаются" и мы всеми силами стараемся, что бы у вас был повод улыбнуться им в ответ.
<br><br>
Приезжайте к нам если ваши приоритеты: качество, внимание к деталям и хорошее настроение.

									</div>
									<div class="about_link">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#konsult">Получить личную консультацию</a>
									</div>
								</div>
								<div class="about_right">
									<img src="/templates/<?=$this->template?>/images/about_author.png" class="desktop">
									<img src="/templates/<?=$this->template?>/images/about_author_mobile.png" class="mobile">
								</div>
							</div>

							<div class="about_slider_block">
								<jdoc:include type="modules" name="about_slider" />
							</div>

						</div>
					</div>
				</div>
			</section>

			<section class="slider get_design">
				<div class="container">
					<div class="row">
						<div class="slide_info">
							<div class="slider_head">Получить подбор дизайнов <br>кухонь под мою планировку</div>
							<div class="slider_link">
								<a href="javascript:void(0)" class="get_price" data-toggle="modal" data-target="#getDesing">
									<img src="/templates/<?=$this->template?>/images/icon_download.png">
									<span>Получить дизайн</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_time">
				<div class="container">
					<div class="row">
						<div class="time_block">
							<div class="header_name">
								Как мы работаем?
							</div>
							<div class="infografic_item variant_top">
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon1.png">
										</div>
										<div class="info_name">
											Выезд замерщика
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon2.png">
										</div>
										<div class="info_name">
											Разработка дизайна
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon3.png">
										</div>
										<div class="info_name">
											Заключение договора
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon4.png">
										</div>
										<div class="info_name">
											Производство
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon5.png">
										</div>
										<div class="info_name">
											Доставка
										</div>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<div class="infografic_block">
										<div class="info_image">
											<img src="/templates/<?=$this->template?>/images/t_icon6.png">
										</div>
										<div class="info_name">
											Монтаж, установка
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="time_links">
								<a href="javascript:void(0)" class="time_btn1" data-toggle="modal" data-target="#getZamer">Вызвать замерщика</a>
								<a href="javascript:void(0)" class="time_btn2" data-toggle="modal" data-target="#konsultDesing">Проконсультироваться с дизайнером</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_brand">
				<div class="container">
					<div class="row">
						<div class="brand_block">
							<div class="header_name">
								Используем только <br> качественную фурнитуру европейских <br>производителей
							</div>
							<div class="brand_slider_block">
								<jdoc:include type="modules" name="brand_slider" />
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_video">
				<div class="container">
					<div class="row">
						<div class="video_block">
							<div class="header_name">
								Видеоотзывы наших клиентов
							</div>
							<div class="video_slider_block">
								<jdoc:include type="modules" name="video_slider" />
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="s_contact">
				<div class="container">
					<div class="row">
						<div class="contact_block">
							<div class="contact_left">
								<div class="contact_head">Контакты</div>
								<div class="contact_des">
									<strong>Тел.:</strong> +375 (29) 773-45-09<br><br>
									<strong>Время работы:</strong> 10.00-20.00, без выходных<br><br>
									<strong>Адрес:</strong> г. Минск, ТЦ «Ленинград», павильон 70<br><br><br>
									<a href="javascript:void(0)" class="call_btn_foot" data-toggle="modal" data-target="#callback">Заказать звонок</a>
								</div>
							</div>
							<div class="contact_right">
								<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Adf13523c2b666558039bac06465d91db80ea08a97ce5af08b866c28bb37731d8&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
							</div>
						</div>
					</div>
				</div>
			</section>

		<?php } ?>

		<jdoc:include type="modules" name="content_bottom" />

		<footer>
			<div class="container">
				<div class="row">
					<div class="footer_block">
						<div class="footer_left">
							<a href="/" class="logo_footer"><img src="/templates/<?=$this->template?>/images/logo_footer.png"></a>
							<div class="footer_text">Фабричное производство <br>кухонь в Минске</div>
						</div>

						<div class="footer_center">
							<?php

                            /*<jdoc:include type="modules" name="menu" />*/
                            ?>
							<jdoc:include type="modules" name="menu-footer" />
						</div>

						<div class="footer_right" style="text-align:left;">
							<a href="http://adena.by" target="blank" style="font-size:12px;">Разработка и продвижение сайта - Adena</a>
						</div>
					</div>
					<div class="copyright">
						<div class="header_inline header_tel inst inst_foot" style="text-align:center;">
							<a href="https://www.instagram.com/comfy_mebel.by/" class="head_tel" target="_blank"><img src="/templates/<?=$this->template?>/images/instagram.png"></a>
							<a href="https://www.facebook.com/comfy.mebel/" class="head_tel" target="_blank"><img src="/images/facebook.png"></a>
							<a href="https://ok.ru/group/54033860460702" class="head_tel" target="_blank"><img src="/images/ok.png"></a>
							<a href="https://www.youtube.com/channel/UC74VVWUawotYUuocudXynjg" class="head_tel" target="_blank"><img src="/images/youtube.png"></a>
						</div>
						<div class="header_inline header_tel h_tel foot_tel">
							<a href="tel:+375297734509" class="head_tel f_tel"><img src="/templates/protostar/images/mts.png">+375 (29) 773-45-09</a>
							<a href="tel:+375293734509" class="head_tel"><img src="/templates/protostar/images/velcom.png">+375 (29) 373-45-09</a>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!--Форма обратного звонка-->
	<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Заявка на обратный звонок</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}callback{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<!--Форма консультации-->
	<div class="modal fade" id="konsult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Получить личную консультацию</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}konsult{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<!--Форма консультации-->
	<div class="modal fade" id="getPrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Узнать стоимость</h4>
				</div>
				<div class="modal-body">
					<div class="wrapper-modal-question modal-question-show">
					  <div class="wrapper-modal-question-content">
						<span class="progress-text">Выполнено на <span class="total">0</span>%</span>
						<div class="wrap-progress-bar">
						  <div class="progress"></div>
						</div>
						<div class="wrap-questions">
						  <div class="question question-1 question-current">
							<div class="title-group"><span class="subtitle">Вопрос 1 из 6.</span><span class="title">Выберите планировку кухни:</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box type type-1 answer-box-img">
								  <div class="wrap-img"><img data-src="img/img-q-1-1-size.png" src="img/img-q-1-1.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">Прямая</span></div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box type type-2 answer-box-img">
								  <div class="wrap-img"><img data-src="img/img-q-1-3-size.png" src="img/img-q-1-3.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">Угол слева</span></div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box type type-2 answer-box-img">
								  <div class="wrap-img"><img data-src="img/img-q-1-2-size.png" src="img/img-q-1-2.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">Угол справа</span></div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box type type-3 answer-box-img">
								  <div class="wrap-img"><img data-src="img/img-q-1-4-size.png" src="img/img-q-1-4.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">П-образная</span></div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question question-select-sizes">
							<div class="title-group"><span class="subtitle">Вопрос 2 из 6.</span><span class="title">Выберите размеры кухни:</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box-custom answer-box-img">
								  <div class="wrap-text"><span class="title">Тип вашей кухни - <span></span></span></div>
								  <div class="wrap-img"><img src="img/img-q-1-1.png" alt=""></div>
								</div>
							  </div>
							  <div class="answer-box-fields">
								<div class="answer-box-field-price input-1">
								  <div class="answer-box-custom"><span>Длина кухни X:</span>
									<div class="wrap-field">
									  <input type="text" placeholder="Например: 350">
									</div><span>см</span>
								  </div>
								</div>
								<div class="answer-box-field-price input-2">
								  <div class="answer-box-custom"><span>Длина кухни Y:</span>
									<div class="wrap-field">
									  <input type="text" placeholder="Например: 350">
									</div><span>см</span>
								  </div>
								</div>
								<div class="answer-box-field-price input-3">
								  <div class="answer-box-custom"><span>Длина кухни Z:</span>
									<div class="wrap-field">
									  <input type="text" placeholder="Например: 350">
									</div><span>см</span>
								  </div>
								</div>
								<div class="answer-box-radio-wrap">
								  <div class="answer-box answer-box-radio">
									<div class="radio-circle"><span></span></div><span class="wrap-text value">Не знаю размеров</span>
								  </div>
								</div>
								<div class="answer-box wrap-btn btn-active">
								  <div class="btn">Далее</div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question question-3">
							<div class="title-group"><span class="subtitle">Вопрос 3 из 6.</span><span class="title">Выберите материал фасадов:</span></div>
							<div class="question-3__arrow"></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-2.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">ЛДСП Egger</span>
									<ul class="list">
									  <li class="list-item">низкая стоимость</li>
									  <li class="list-item">хит продаж</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-3.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Пластик Arpa</span>
									<ul class="list">
									  <li class="list-item">эконом</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-1.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">ЛДСП Cleaf</span>
									<ul class="list">
									  <li class="list-item">премиум</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-5.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Пластик-нано Fenix</span>
									<ul class="list">
									  <li class="list-item">премиум</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-6.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Акриловый пластик S-line</span>
									<ul class="list">
									  <li class="list-item">средняя стоимость</li>
									  <li class="list-item">хит продаж</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-2-4.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Крашенный МДФ</span>
									<ul class="list">
									  <li class="list-item">средняя стоимость</li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question">
							<div class="title-group"><span class="subtitle">Вопрос 4 из 6.</span><span class="title">Выберите столешницу:</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-4-1.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Egger</span>
									<ul class="list">
									  <li class="list-item">лучшая цена</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-4-4.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Кварц</span>
									<ul class="list">
									  <li class="list-item">искусственный камень</li>
									  <li class="list-item">премиум</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-4-3.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Juan</span>
									<ul class="list">
									  <li class="list-item">низкая цена</li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question">
							<div class="title-group"><span class="subtitle">Вопрос 5 из 6.</span><span class="title">Выберите тип фурнитуры:</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-5-2.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">Эконом</span>
									<ul class="list">
									  <li class="list-item">шариковые направляющее с доводчиками</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-5-3.png" alt=""></div>
								  <div class="wrap-text"><span class="title value">Стандарт</span>
									<ul class="list">
									  <li class="list-item">GTV Польша</li>
									  <li class="list-item">система Модернбокс</li>
									  <li class="list-item">система Модернслайд</li>
									</ul>
								  </div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/img-q-5-4.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Премиум</span>
									<ul class="list">
									  <li class="list-item">Австрийская фурнитура BLUM</li>
									</ul>
								  </div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question">
							<div class="title-group"><span class="subtitle">Вопрос 6 из 6.</span><span class="title">В какой бюджет Вы планируете уложиться?</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-radio-wrap">
								<div class="answer-box answer-box-radio">
								  <div class="radio-circle"><span></span></div><span class="wrap-text value">до 2 500 руб</span>
								</div>
							  </div>
							  <div class="answer-box-radio-wrap">
								<div class="answer-box answer-box-radio">
								  <div class="radio-circle"><span></span></div><span class="wrap-text value">2 500 - 5 000 руб</span>
								</div>
							  </div>
							  <div class="answer-box-radio-wrap">
								<div class="answer-box answer-box-radio">
								  <div class="radio-circle"><span></span></div><span class="wrap-text value">5 000 - 7 000 руб</span>
								</div>
							  </div>
							  <div class="answer-box-radio-wrap">
								<div class="answer-box answer-box-radio">
								  <div class="radio-circle"><span></span></div><span class="wrap-text value">от 7 000 руб</span>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question question-present">
							<div class="title-group"><span class="title">Благодарим за ответы!</span><span class="subtitle">Выберите Ваш персональный подарок:</span></div>
							<div class="wrap-answers">
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/present-1.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Мойка каменная</span><span class="text">стоимость в магазине:</span><span class="price">215 руб</span></div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/present-3.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Скидка на кухню</span><span class="text">от стоимости: </span><span class="price">-25%</span></div>
								</div>
							  </div>
							  <div class="answer-box-img-wrap">
								<div class="answer-box answer-box-img">
								  <div class="wrap-img"><img src="img/present-4.jpg" alt=""></div>
								  <div class="wrap-text"><span class="title value">Вытяжка EXITEG</span><span class="text">стоимость в магазине: </span><span class="price">299 руб</span></div>
								</div>
							  </div>
							</div>
						  </div>
						  <div class="question question-massager">
							<div class="title-group"><span class="title">Данные для предварительного расчёта приняты!</span><span class="subtitle">Введите номер телефона, мы Вышлем на него стоимость и дизайн-проект</span></div>
							<div class="box"><span class="send-to">Выслать на:</span>
							  <div class="massager-row">
								<div class="wrap-massager">
								  <div class="massager">
									<div class="wrap-img"><img src="img/whatsapp.jpg" alt=""></div><span class="text value">WhatsApp</span>
								  </div>
								</div>
								<div class="wrap-massager">
								  <div class="massager">
									<div class="wrap-img"><img src="img/viber.png" alt=""></div><span class="text value">Viber</span>
								  </div>
								</div>
								<div class="wrap-massager">
								  <div class="massager">
									<div class="wrap-img"><img src="img/telegram.svg" alt=""></div><span class="text value">Telegram</span>
								  </div>
								</div>
							  </div>
							  <form class="form form-result">
								<div class="wrap-field">
								  <input class="input phone" id="callback-phone" required="required" type="tel" placeholder="+375 ( 99 ) 999 - 99 - 99">
								</div>
								<div class="wrap-btn">
								  <div class="wrap-img img-play"><img src="img/btn-play.png" alt=""></div><span class="btn">Получить стоимость →</span>
								  <div class="wrap-img img-arrow"><img src="img/arrow-resalt-btn.png" alt=""></div>
								</div>
								<div class="w-100"></div><span class="file-title">Есть свой проект? Загружайте</span>
								<label class="wrap-field-file" for="field-file">
								  <input class="field-file" type="file" name="field-file" id="field-file"><span class="file-text"></span><span class="file-placeholder">Загрузите файл</span>
								  <div class="img-file"><svg width="30" height="39" viewBox="0 0 30 39" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M28.8108 7.06225L22.5249 1.12287C21.869 0.502937 20.5991 0 19.6906 0H1.64595C0.736565 0 0 0.728 0 1.625V37.375C0 38.272 0.736565 39 1.64595 39H28.354C29.2626 39 30 38.272 30 37.375V9.81094C30.0008 8.91394 29.4684 7.683 28.8108 7.06225ZM26.4966 33.3872C26.4966 34.2842 25.7592 35.0122 24.8506 35.0122H4.96502C4.05646 35.0122 3.31907 34.2842 3.31907 33.3872V4.69219C3.31907 3.79519 4.05646 3.06719 4.96502 3.06719H18.5598C19.4684 3.06719 20.2057 3.79519 20.2057 4.69219V7.3905C20.2057 8.28831 20.9431 9.0155 21.8517 9.0155H24.8515C25.76 9.0155 26.4974 9.7435 26.4974 10.6405V33.3872H26.4966Z" fill="#DADCE4"/>
				<path d="M5.26847 20H23.7315C24.4309 20 25 19.5513 25 19C25 18.4487 24.4309 18 23.7315 18H5.26847C4.56912 18 4 18.4487 4 19C4 19.5513 4.56828 20 5.26847 20Z" fill="#DADCE4"/>
				<path d="M23.7315 23H5.26847C4.56912 23 4 23.673 4 24.5C4 25.327 4.56912 26 5.26847 26H23.7315C24.4309 26 25 25.327 25 24.5C25 23.673 24.4317 23 23.7315 23Z" fill="#DADCE4"/>
				<path d="M20.8072 29H8.19205C7.53483 29 7 29.673 7 30.5C7 31.327 7.53483 32 8.19205 32H20.8079C21.466 32 22 31.327 22 30.5C22 29.673 21.4652 29 20.8072 29Z" fill="#DADCE4"/>
				<path d="M10.5 15C13.5325 15 16 12.5325 16 9.5C16 6.46745 13.5325 4 10.5 4C7.46745 4 5 6.46745 5 9.5C5 12.5325 7.46745 15 10.5 15ZM10.5 6.47488C12.1681 6.47488 13.5251 7.83193 13.5251 9.5C13.5251 11.1681 12.1681 12.5251 10.5 12.5251C8.83193 12.5251 7.47488 11.1681 7.47488 9.5C7.47488 7.83193 8.83193 6.47488 10.5 6.47488Z" fill="#DADCE4"/>
				</svg>
								  </div>
								  <div class="btn-clear"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M8.23814 7.00015L13.7435 1.49459C14.0855 1.15283 14.0855 0.598303 13.7435 0.256541C13.4014 -0.0855136 12.8475 -0.0855136 12.5055 0.256541L7.00015 5.7621L1.49453 0.256541C1.15249 -0.0855136 0.59857 -0.0855136 0.25653 0.256541C-0.08551 0.598303 -0.08551 1.15283 0.25653 1.49459L5.76215 7.00015L0.25653 12.5057C-0.08551 12.8475 -0.08551 13.402 0.25653 13.7438C0.42755 13.9145 0.651685 14 0.875529 14C1.09937 14 1.32351 13.9145 1.49453 13.7435L7.00015 8.2379L12.5055 13.7435C12.6765 13.9145 12.9006 14 13.1245 14C13.3483 14 13.5724 13.9145 13.7435 13.7435C14.0855 13.4017 14.0855 12.8472 13.7435 12.5054L8.23814 7.00015Z" fill="white"/>
				</svg>
								  </div>
								</label>
							  </form><span class="bottom-text">*Подарок и скидку забронируем за Вашим номером телефона</span>
							</div>
						  </div>
						  <div class="question last-screen"><span class="text">Спасибо за ответы. Результат вышлем в течение двух часов в рабочее <br> время. Пн-Вс 9.00 - 20.00</span></div>
						  <div class="preloader"><span class="text">Данные приняты</span>
							<div class="wrap-img"><img src="img/preloader.gif" alt=""></div>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Форма Получить дизайн-->
	<div class="modal fade" id="getDesing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Получить дизайн</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}getDesing{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<!--Форма Вызвать замерщика-->
	<div class="modal fade" id="getZamer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Вызвать замерщика</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}getZamer{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<!--Форма Проконсультироваться с дизайнером-->
	<div class="modal fade" id="konsultDesing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Проконсультироваться с дизайнером</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}konsultDesing{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<!--Форма заказа товара-->
	<div class="modal fade" id="zakaz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Заказать</h4>
				</div>
				<div class="modal-body">
					<?php echo JHTML::_('content.prepare', '{chronoforms5}zakaz{/chronoforms5}');?>
				</div>
			</div>
		</div>
	</div>

	<div id="top-bottom"></div>

	<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '440760103254842');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=440760103254842&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    try {
        (function(m,e,t,r,i,k,a){
            m[i]=m[i]||function(){
                (m[i].a=m[i].a||[]).push(arguments)
            };
            m[i].l=1*new Date();
            k=e.createElement(t),
                a=e.getElementsByTagName(t)[0],
                k.async=1,
                k.src=r,
                a.parentNode.insertBefore(k,a)
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(56593702, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
        });
    } catch {
       console.log('index.php >>> ' , 'mc.yandex.ru/metrika/tag.js - не загружен' );

    }

</script>
<noscript><div><img src="https://mc.yandex.ru/watch/56593702" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


	<!--Счётчии-->
	<jdoc:include type="modules" name="metrika" />

	<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.by/b11245434/crm/site_button/loader_2_o1vj4p.js');
    </script>



</body>
</html>
