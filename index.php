<?php

/**
 * @copyright	
 * 
 * Template made with the joomla component Template Creator CK - http://www.template-creator.com
 * marketprofil
 * @license 
 * @version 
 * */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?
function isMobile() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
$not_mobile = !(isMobile());


/**
 * START - Изменение canonical для результатов фильтрации -- скопировать на продакшн
 */
$app = \Joomla\CMS\Factory::getApplication();
$doc = \Joomla\CMS\Factory::getDocument();
$option = $app->input->get('option' , false );

if ( $option == 'com_customfilters'){
    foreach ($doc->_links as $url => $link)
    {
        if ($link['relation'] == 'canonical')   unset( $doc->_links[$url] ); #END IF

    }#END FOREACH
    $docBase  = preg_replace('/start=\d+\/$/', '', $doc->base );
    $canUrl = '<link href="' . $docBase . '" rel="canonical" />';
    $doc->addCustomTag($canUrl);
}
/**
 * END - Изменение canonical для результатов фильтрации -- скопировать на продакшн
 */








//
//
//


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	<jdoc:include type="head" />




	<?php JHtml::_('jquery.framework'); ?>
	<link href='https://fonts.googleapis.com/css?family=' rel='stylesheet' type='text/css'>
	<?php JHtml::_('bootstrap.framework'); ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.css" type="text/css" />
	<?php JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction); ?>
	<?php if ($this->direction == 'rtl') { ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template_rtl.css" type="text/css" />
	<?php } else { ?>
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
	<?php } ?>
	<?php if ($this->params->get('useresponsive','1')) { ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php } ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/8.3.1/js/autoComplete.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tarekraafat-autocomplete.js/8.3.1/css/autoComplete.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/mobile.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/custom.css" type="text/css" />
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery.maskedinput.min.js"></script>
	<?php
	$app             = JFactory::getApplication();
// Detecting Active Variables
	$option   = $app->input->getCmd('option', '');
	$view     = $app->input->getCmd('view', '');
	$layout   = $app->input->getCmd('layout', '');
	$task     = $app->input->getCmd('task', '');
	$itemid   = $app->input->getCmd('Itemid', '');
	$tckedition   = $app->input->getCmd('tckedition', '');
	$tckeditionclass = $tckedition ? 'tck-edition' : '';
	?><?php
	$mainclass = "";
	$mainclass .= " noleft";
	$mainclass .= " noright";
	$mainclass = trim($mainclass); ?>
	<?
	if (class_exists('VmModel')){
		$productModel = VmModel::getModel('product');
		if (!empty($app->input->getCmd('virtuemart_product_id', ''))) {
			$prod = $productModel->getProduct($app->input->getCmd('virtuemart_product_id', ''));

		}
	}

	$emoji_code = array('U+1F4F1', 'U+2705', 'U+1F449', 'U+1F537', 'U+1F528', 'U+FE0F', 'U+1F4A7','U+1F60D', 'U+2692',  'U+1F3D7','U+1F9F0', 'U+1F9F1', 'U+1F477');
	$emoji = array('☎️','✅', '➡️', '🧱', '➡️', '1️⃣','💧', '😍', '⚒️','🏗','🧰', '🧱', '🏗');
	?>

	<meta property="og:title" content="<?=str_replace($emoji_code, $emoji, $this->title); ?>">
	<meta property="og:url" content="<?=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>">
	<meta property="og:site_name" content="<?=$_SERVER['SERVER_NAME']?>">
	<meta property="og:description" content="<?=str_replace($emoji_code, $emoji, $this->description); ?>">
	<meta property="og:type" content="website">
	<?if(!empty($prod->file_url)){
		?>
		<meta property="og:image" content="<?=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/'.$prod->file_url;?>">	
		<?
	}
	else{?>
		<meta property="og:image" content="https://www.marketprofil.ru/images/logo-mp.png">	
		<?}
		?>

	<!--[if lt IE 9]>
		<script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
	<![endif]-->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/custom.js">	</script>
		<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(49747456, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true }); </script><!-- /Yandex.Metrika counter -->
	</head>
<?php

/**
 *  Исправляем для страницы результатов фильтрации
 */
if ( $view == 'products')
{
    $view = 'category' ;
}#END IF



?>
	<body class="<?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
?> <?php echo $this->direction; ?>">
<? if($not_mobile){ ?>
	<?php if($this->countModules('logo') || $this->countModules('head-center') || $this->countModules('head-right') || $tckedition) : ?>
	<div id="wrapper1" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row1" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row1column1" style="width:calc(33.333333333333336 / 100 * (100% - (2 * 0px)));">
						<?php if ($this->countModules('logo') || $tckedition) : ?>
							<div id="block1" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="logo">
									<jdoc:include type="modules" name="logo" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="flexiblecolumn " id="row1column2" style="width:calc(33.333333333333336 / 100 * (100% - (2 * 0px)));">
						<?php if ($this->countModules('head-center') || $tckedition) : ?>
							<div id="block2" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="head-center">
									<jdoc:include type="modules" name="head-center" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="flexiblecolumn " id="row1column3" style="width:calc(33.333333333333336 / 100 * (100% - (2 * 0px)));">
						<?php if ($this->countModules('head-right') || $tckedition) : ?>
							<div id="block3" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="head-right">
									<jdoc:include type="modules" name="head-right" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>

<?php endif; ?>
<?php if($this->countModules('top-menu') || $this->countModules('search') || $tckedition) : ?>
<div id="wrapper2" class="tck-wrapper">
	<div class="tck-container inner ">

		<section id="row2" >
			<div class="inner clearfix">
				<div class="flexiblecolumn " id="row2column1" style="width:calc(70 / 100 * (100% - (1 * 0px)));">
					<?php if ($this->countModules('top-menu') || $tckedition) : ?>
						<div id="block4" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="top-menu">
								<jdoc:include type="modules" name="top-menu" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="flexiblecolumn " id="row2column2" style="width:calc(30 / 100 * (100% - (1 * 0px)));">
					<?php if ($this->countModules('search') || $tckedition) : ?>
						<div id="block5" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="search">
								<jdoc:include type="modules" name="search" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="clr"></div>
			</div>
		</section>

	</div>
	<a href="tel:+7 (495) 259-24-19" class="mgo-MOS mobile_phone">
		<span class="mgo-MOS">+7 (495) 259-24-19</span>
	</a>
</div>

<?php endif; ?>
<?php if($this->countModules('menu') || $tckedition) : ?>
	<div id="wrapper3" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row3" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row3column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('menu') || $tckedition) : ?>
							<div id="block6" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="menu">
									<jdoc:include type="modules" name="menu" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('banner') || $tckedition) : ?>
	<div id="wrapper4" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row4" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row4column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('banner') || $tckedition) : ?>
							<div id="block7" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="banner">
									<jdoc:include type="modules" name="banner" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('menu-bottom') || $tckedition) : ?>
	<div id="wrapper5" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row5" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row5column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('menu-bottom') || $tckedition) : ?>
							<div id="block8" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="menu-bottom">
									<jdoc:include type="modules" name="menu-bottom" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<div id="wrapper" class="tck-wrapper">
	<div class="inner  tck-container">

		<div id="maincontent" class="maincontent <?php echo $mainclass ?>">
			<div class="inner clearfix">
				<?php if ($this->countModules('position-7') || $tckedition) : ?>
					<aside id="left" class="column column1">
						<?php if ($this->countModules('position-7')) : ?>
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="position-7">
								<jdoc:include type="modules" name="position-7" style="htmlck" />
							</div>
						<?php endif; ?>
					</aside>
				<?php endif; ?>
				<div id="main" class="column main row-fluid">
					<div class="inner clearfix">
						<jdoc:include type="message" />
						<jdoc:include type="component" />

					</div>
				</div>
				<div class="clr"></div>
			</div>
		</div>


	</div>
</div>
<?php if($this->countModules('news') || $tckedition) : ?>
	<div id="wrapper6" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row6" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row6column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('news') || $tckedition) : ?>
							<div id="block9" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="news">
									<jdoc:include type="modules" name="news" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('new-item') || $tckedition) : ?>
	<div id="wrapper7" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row7" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row7column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('new-item') || $tckedition) : ?>
							<div id="block11" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="new-item">
									<jdoc:include type="modules" name="new-item" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('popular-goods') || $tckedition) : ?>
	<div id="wrapper8" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row8" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row8column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('popular-goods') || $tckedition) : ?>
							<div id="block10" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="popular-goods">
									<jdoc:include type="modules" name="popular-goods" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('rewiews') || $tckedition) : ?>
	<div id="wrapper9" class="tck-wrapper">
		<div class="tck-container inner ">

			<section id="row9" >
				<div class="inner clearfix">
					<div class="flexiblecolumn " id="row9column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
						<?php if ($this->countModules('rewiews') || $tckedition) : ?>
							<div id="block12" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="rewiews">
									<jdoc:include type="modules" name="rewiews" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="clr"></div>
				</div>
			</section>

		</div>
	</div>
<?php endif; ?>
<?php if($this->countModules('footer-1') || $this->countModules('footer-2') || $this->countModules('footer-3') || $this->countModules('footer-4') || $tckedition) : ?>
<div id="wrapper10" class="tck-wrapper">
	<div class="tck-container inner ">

		<section id="footer-1" >
			<div class="inner clearfix">
				<div class="flexiblecolumn " id="footer-1column1" style="width:25%;">
					<?php if ($this->countModules('footer-1') || $tckedition) : ?>
						<div id="block13" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-1">
								<jdoc:include type="modules" name="footer-1" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="flexiblecolumn " id="footer-1column2" style="width:25%;">
					<?php if ($this->countModules('footer-2') || $tckedition) : ?>
						<div id="block14" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-2">
								<jdoc:include type="modules" name="footer-2" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="flexiblecolumn " id="footer-1column3" style="width:25%;">
					<?php if ($this->countModules('footer-3') || $tckedition) : ?>
						<div id="block15" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-3">
								<jdoc:include type="modules" name="footer-3" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="flexiblecolumn " id="footer-1column4" style="width:25%;">
					<?php if ($this->countModules('footer-4') || $tckedition) : ?>
						<div id="block16" >
							<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-4">
								<jdoc:include type="modules" name="footer-4" style="htmlck" />
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="clr"></div>
			</div>
		</section>

	</div>
</div>
<?php endif; ?>
<jdoc:include type="modules" name="debug" />
<div id="catalog">
	<ul style="width: 1110px;">
		<div class="col-md-4 float-left">
			<li class="nav-item-sub   icon_01 ">
				<a class="nav-link-sub" href="/catalog/krovlya/" title="">КРОВЕЛЬНЫЕ МАТЕРИАЛЫ</a>
				<ul>
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/metalocherepitsa/" title="">Металлочерепица</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/gibkaya-cherepitsa/" title="">Гибкая черепица Docke</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/krovelnyy-profnastil/" title="">Кровельный профнастил</a>
					</li>			
				</ul>
			</li>	
			<li class="nav-item-sub   icon_02 ">
				<a class="nav-link-sub" href="/catalog/sendvich-paneli/" title="">СЭНДВИЧ-ПАНЕЛИ</a>
				<ul>
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/trekhsloynye-sendvich-paneli/" title="">Трехслойные сэндвич-панели</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/sendvich-paneli-polielementnoy-sborki/" title="">Сэндвич-панели поэлементной сборки</a>
					</li>			
				</ul>
			</li>	
			<li class="nav-item-sub   icon_03 ">
				<a class="nav-link-sub" href="/catalog/vodostochnye-sistemy/" title="">ВОДОСТОЧНЫЕ СИСТЕМЫ</a>
				<ul>
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/mp-prestizh-d125/" title="">МП Престиж</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/vs-modern/" title="">МП Модерн</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/vs-proekt/" title="">МП Проект</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/mp-grandsystem/" title="">МП Grandsystem</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/docke-premium/" title="">Docke Premium</a>
					</li>			
					<li class="nav-item-sub   icon_0 ">
						<a class="nav-link-sub" href="/catalog/docke-lux/" title="">Docke Lux</a>
					</li>			
				</ul>
			</li></div>	
			<div class="col-md-4 float-left">
				<li class="nav-item-sub   icon_04 columns_2">
					<a class="nav-link-sub" href="/catalog/profnastily/" title="">ПРОФНАСТИЛЫ</a>
					<ul>
						<div>
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-c-8/" title="">С-8</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-mp-10/" title="">МП-10</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-mp-18/" title="">МП-18</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-mp-20/" title="">МП-20</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-s-21/" title="">С-21</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-ns-35/" title="">НС-35</a>
							</li>
						</div>			
						<div>
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-s-44/" title="">НС-44</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-n-60/" title="">Н-60</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-n-75/" title="">Н-75</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-n-114kh750/" title="">Н-114х750</a>
							</li>			

							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-n-153kh900/" title="">Н-153</a>
							</li>			
							<li class="nav-item-sub   icon_0 ">
								<a class="nav-link-sub" href="/catalog/profnastily/profnastil-n-157kh800/" title="">Н-157</a>
							</li>
						</div>			
					</ul>
				</li>	
				<li class="nav-item-sub   icon_05 ">
					<a class="nav-link-sub" href="/catalog/fasad/" title="">ФАСАДНЫЕ МАТЕРИАЛЫ</a>
					<ul>
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/metallicheskiy-sayding/" title="">Металлический сайдинг</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/lineynye-paneli/" title="">Линеарные панели</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/fasadnye-kasety/" title="">Фасадные кассеты</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/fasadnye-paneli-d-cke/" title="">Фасадные панели Docke</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/aksessuary-dlya-saydinga-dyeke/" title="">Аксессуары для сайдинга Docke</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/vinilovyy-sayding-dyeke/" title="">Виниловый сайдинг Docke</a>
						</li>			
					</ul>
				</li>	
				<li class="nav-item-sub   icon_06 ">
					<a class="nav-link-sub" href="/catalog/metallokonstruktsii-i-lstk/" title="">МЕТАЛЛОКОНСТРУКЦИИ</a>
					<ul>
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/geodezicheskie-raboty/" title="">Геодезия/геология</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/zdaniya-i-metallokonstruktsii-lstk/" title="">Здания и сооружения ЛСТК</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/montazh/" title="">Монтаж</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/proektirovanie/" title="">Проектирование</a>
						</li>			
					</ul>
				</li>
			</div>	
			<div class="col-md-4 float-left">
				<li class="nav-item-sub   icon_07 ">
					<a class="nav-link-sub" href="/catalog/zabory-i-ograzhdeniya/" title="">ЗАБОРЫ И ОГРАЖДЕНИЯ</a>
					<ul>
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/zabory-iz-profnastila/" title="">Заборы из профнастила</a>
						</li>			 
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/evroshtaketnik/" title="">Евроштакетник</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/panelnye-ograzhdeniya/" title="">Панельные ограждения</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/modulnye-ograzhdeniya/" title="">Модульные ограждения</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/rulonnaya-setka/" title="">Рулонная сетка</a>
						</li>			
					</ul>
				</li>	
				<li class="nav-item-sub   icon_08 ">
					<a class="nav-link-sub" href="/catalog/komplektuyushchie/" title="">КОМПЛЕКТУЮЩИЕ</a>
					<ul>
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/krepezh/" title="">Крепеж</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/krovelnaya-ventilyatsiya/" title="">Кровельная вентиляция</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/mansardnye-okna-i-cherdachnye-lestnitsy/" title="">Мансардные окна, лестницы</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/mp20-k/" title="">Элементы безопасности</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/elementy-otdelki-krovli/" title="">Элементы отделки кровли</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/sofity/" title="">Софиты</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/n114-k/" title="">Мембраны и пленки</a>
						</li>									
					</ul>
				</li>	
				<li class="nav-item-sub   icon_09 ">
					<a class="nav-link-sub" href="/catalog/rulony/" title="">РУЛОНЫ</a>
				</li>			
				<li class="nav-item-sub   icon_05 ">
					<a class="nav-link-sub" href="/catalog/fazenda/" title="">ФАЗЕНДА</a>
					<ul>
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/teplitsa/" title="">Теплицы</a>
						</li>			
						<li class="nav-item-sub   icon_0 ">
							<a class="nav-link-sub" href="/catalog/aksessuary-dlya-teplits-/" title="">Аксессуары для теплицы</a>
						</li>			
					</ul>
				</li>
			</div>
		</ul>
	</div>
	<script type="text/javascript">
		jQuery( document ).ready(function(){
			jQuery("li.item-121, #catalog").hover(function(){
				jQuery("#catalog").addClass('active');
			}, function(){ 
				jQuery("#catalog").removeClass('active');
			});
		});
		
		jQuery(document).ready(function(){
			var i = 1;
			jQuery('#myTab li a').each(function(){
				if (i == 1) {
					console.log(jQuery(this).attr('href'));
					jQuery(this).addClass('active');
					jQuery(jQuery(this).attr('href')).addClass('show active');
				}
				i++;
			})
		})
	</script>
	
	
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
(function(){ document.jivositeloaded=0;var widget_id = 'CiUEfu6DeV';var d=document;var w=window;function l(){var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}//эта строка обычная для кода JivoSite
	function zy(){
    //удаляем EventListeners
    if(w.detachEvent){//поддержка IE8
    	w.detachEvent('onscroll',zy);
    	w.detachEvent('onmousemove',zy);
    	w.detachEvent('ontouchmove',zy);
    	w.detachEvent('onresize',zy);
    }else {
    	w.removeEventListener("scroll", zy, false);
    	w.removeEventListener("mousemove", zy, false);
    	w.removeEventListener("touchmove", zy, false);
    	w.removeEventListener("resize", zy, false);
    }
    //запускаем функцию загрузки JivoSite
    if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}
    //Устанавливаем куку по которой отличаем первый и второй хит
    var cookie_date = new Date ( );
    cookie_date.setTime ( cookie_date.getTime()+60*60*28*1000); //24 часа для Москвы
    d.cookie = "JivoSiteLoaded=1;path=/;expires=" + cookie_date.toGMTString();
}
if (d.cookie.search ( 'JivoSiteLoaded' )<0){//проверяем, первый ли это визит на наш сайт, если да, то назначаем EventListeners на события прокрутки, изменения размера окна браузера и скроллинга на ПК и мобильных устройствах, для отложенной загрузке JivoSite.
    if(w.attachEvent){// поддержка IE8
    	w.attachEvent('onscroll',zy);
    	w.attachEvent('onmousemove',zy);
    	w.attachEvent('ontouchmove',zy);
    	w.attachEvent('onresize',zy);
    }else {
    	w.addEventListener("scroll", zy, {capture: false, passive: true});
    	w.addEventListener("mousemove", zy, {capture: false, passive: true});
    	w.addEventListener("touchmove", zy, {capture: false, passive: true});
    	w.addEventListener("resize", zy, {capture: false, passive: true});
    }
}else {zy();}
})();</script>
<!-- {/literal} END JIVOSITE CODE -->	

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("input[name=nomer]").mask("MRR99999999");
		if (jQuery('#colors_link a').length) {
			jQuery('#colors_link').show();
		}
		else{
			jQuery('#colors_link').hide();
		}
		if (jQuery('#tolshchina a').length) {
			jQuery('#tolshchina').show();
		}
		else{
			jQuery('#tolshchina').hide();
		}
		jQuery('a.geo-link').on('click', function (e) {
			e.preventDefault();   
			if (jQuery(jQuery(this).attr('href')).hasClass('show')) {
				jQuery(jQuery(this).attr('href')).removeClass('show');
			}
			else{
				jQuery(jQuery(this).attr('href')).addClass('show');
			}
			
		});
	})
</script>
<style type="text/css">
	.collapse.mt-3.show{
		height: 550px;
	}
</style>
<? } 
else{
	?>
	<div id="head-mobile">
		<div class="row row_mob_1">
			<div class="col-md-7 col-sm-7 col-7 float-left">
				<div class="row">
					<div class="col-4" id="menu_img"><img src="/images/Меню.png"></div>
					<div class="col-4" id="search_img"><img src="/images/Поиск.png"></div>
					<div class="flexiblecolumn " id="row1column2" >
						<?php if ($this->countModules('head-center') || $tckedition) : ?>
							<div id="block2" >
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="head-center">
									<jdoc:include type="modules" name="head-center" style="htmlck" />
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-4" id="cart_img"><a href="/korzina/"><img src="/images/Карзина.png"></a></div>
				</div>
			</div>
			<div class="col-md-5 col-sm-5 col-5 float-left"><a href="/"><img src="/images/logo (1).png" id="logo_mob"></a></div>
		</div>

		<div class="row row_mob_2">
			<div class="col-md-5 col-sm-5 col-5 float-left">
				<?php if ($this->countModules('menu') || $tckedition) : ?>
					<div id="block6" >
						<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="menu">
							<jdoc:include type="modules" name="menu" style="htmlck" />
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-7 col-sm-7 col-7 float-left">
				<div id="mob_head_phone"><img src="/images/Звонок ICO (1).png"><span class="phone"><a href="tel:+74952592419">+7 (495) 259-24-19</a></span></div>
			</div>
		</div>
	</div>

	<div id="wrapper" class="tck-wrapper">
		<div class="inner  tck-container">

			<div id="maincontent" class="maincontent <?php echo $mainclass ?>">
				<div class="inner clearfix">
					<?php if ($this->countModules('position-7') || $tckedition) : ?>
						<aside id="left" class="column column1">
							<?php if ($this->countModules('position-7')) : ?>
								<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="position-7">
									<jdoc:include type="modules" name="position-7" style="htmlck" />
								</div>
							<?php endif; ?>
						</aside>
					<?php endif; ?>
					<div id="main" class="column main row-fluid">
						<div class="inner clearfix">
							<jdoc:include type="message" />
							<jdoc:include type="component" />

						</div>
					</div>
					<div class="clr"></div>
				</div>
			</div>


		</div>
	</div>
	<?php if($this->countModules('news') || $tckedition) : ?>
		<div id="wrapper6" class="tck-wrapper">
			<div class="tck-container inner ">

				<section id="row6" >
					<div class="inner clearfix">
						<div class="flexiblecolumn " id="row6column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
							<?php if ($this->countModules('news') || $tckedition) : ?>
								<div id="block9" >
									<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="news">
										<jdoc:include type="modules" name="news" style="htmlck" />
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="clr"></div>
					</div>
				</section>

			</div>
		</div>
	<?php endif; ?>
	<?php if($this->countModules('new-item') || $tckedition) : ?>
		<div id="wrapper7" class="tck-wrapper">
			<div class="tck-container inner ">

				<section id="row7" >
					<div class="inner clearfix">
						<div class="flexiblecolumn " id="row7column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
							<?php if ($this->countModules('new-item') || $tckedition) : ?>
								<div id="block11" >
									<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="new-item">
										<jdoc:include type="modules" name="new-item" style="htmlck" />
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="clr"></div>
					</div>
				</section>

			</div>
		</div>
	<?php endif; ?>
	<?php if($this->countModules('popular-goods') || $tckedition) : ?>
		<div id="wrapper8" class="tck-wrapper">
			<div class="tck-container inner ">

				<section id="row8" >
					<div class="inner clearfix">
						<div class="flexiblecolumn " id="row8column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
							<?php if ($this->countModules('popular-goods') || $tckedition) : ?>
								<div id="block10" >
									<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="popular-goods">
										<jdoc:include type="modules" name="popular-goods" style="htmlck" />
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="clr"></div>
					</div>
				</section>

			</div>
		</div>
	<?php endif; ?>
	<?php if($this->countModules('rewiews') || $tckedition) : ?>
		<div id="wrapper9" class="tck-wrapper">
			<div class="tck-container inner ">

				<section id="row9" >
					<div class="inner clearfix">
						<div class="flexiblecolumn " id="row9column1" style="width:calc(100 / 100 * (100% - (0 * 0px)));">
							<?php if ($this->countModules('rewiews') || $tckedition) : ?>
								<div id="block12" >
									<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="rewiews">
										<jdoc:include type="modules" name="rewiews" style="htmlck" />
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="clr"></div>
					</div>
				</section>

			</div>
		</div>
	<?php endif; ?>
	<div id="footer">
		<div class="row_mob_footer_1">
			<div class="col-md-5 col-sm-5 col-5 float-left">
				<a href="/"><img src="/images/logo (1).png" id="logo_mob"></a>
			</div>
			<div class="col-md-7 col-sm-7 col-7 float-left">
				<div id="mob_footer_phone"><img src="/images/Звонок ICO (2).png"><span class="phone"><a href="tel:+74952592419">+7 (495) 259-24-19</a></span></div>
			</div>
		</div>
		<div class="row_mob_footer_2">
			<div class="flexiblecolumn " id="footer-1column2" style="width:50%;">
				<?php if ($this->countModules('footer-2') || $tckedition) : ?>
					<div id="block14" >
						<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-2">
							<jdoc:include type="modules" name="footer-2" style="htmlck" />
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="flexiblecolumn " id="footer-1column4" style="width:50%;">
				<?php if ($this->countModules('footer-4') || $tckedition) : ?>
					<div id="block16" >
						<div class="inner clearfix <?php echo $tckeditionclass ?>" data-position="footer-4">
							<jdoc:include type="modules" name="footer-4" style="htmlck" />
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div style="clear: both;"></div>
		</div>
		<div class="row_mob_footer_3">
			<div class="row">
				<div class="col-6 max-width-45"><a href="mailto:zakaz@marketprofil.ru"><img src="/images/mail_outline_24px.png">zakaz@marketprofil.ru</a></div>
				<div class="col-6 max-width-55">
					<a href="https://wa.me/79267803008" target="_blank"><img src="/images/watsapp-icon.png"></a>
					<a href="https://t.me/MarketP" target="_blank"><img src="/images/telegram-icon.png"></a>
					<a href="javascript: void();" class="ba-click-lightbox-form-1"><img src="/images/call-icon.png"></a>
<!-- 					<a href=""><img src="/images/vk.png"></a>
	<a href=""><img src="/images/ok.png"></a> -->
</div>
</div>
</div>
</div>
<div class="offcanvas_menu">
	<div class="row">
		<div class="col-12 text-right">
			<a href="tel:+74952592419"><img src="/images/Звонок ICO.png"><span class="phone_canvas">+7 (495) 259-24-19</span></a>
		</div>
		<div class="col-12 it_canvas_menu"><a href="/"><img src="/images/home_24px.png">Главная</a></div>
		<div class="col-12 it_canvas_menu"><a href="/catalog/"><img src="/images/list_24px.png">Каталог</a></div>
		<div class="col-12 it_canvas_menu parent"><a href="/servis/"><img src="/images/settings_24px.png">Сервис</a>
			<ul class="nav-child unstyled small">
				<li class="item-423"><a href="/servis/oplata/">Оплата на сайте</a></li>
				<li class="item-209"><a href="/servis/dostavka/">Доставка</a></li>
				<li class="item-210"><a href="/servis/proektirovanie/">Проектирование</a></li>
				<li class="item-211"><a href="/servis/montazh-ili-stroitelstvo/">Монтаж</a></li>
			</ul>
			<span class="after"></span>
		</div>
		<div class="col-12 it_canvas_menu parent"><a href="/o-kompanii/"><img src="/images/chrome_reader_mode_24px.png">О компании</a>
			<ul class="nav-child unstyled small">
				<li class="item-275"><a href="/o-kompanii/novosti/">Новости</a></li>
				<li class="item-322"><a href="/information/aktsii/">Акции</a></li>
				<li class="item-277"><a href="/o-kompanii/realizovannye-proekty/">Реализованные проекты</a></li>
				<li class="item-486"><a href="/o-kompanii/partnery/">Партнеры</a></li>
			</ul>
			<span class="after"></span>
		</div>
		<div class="col-12 it_canvas_menu parent"><a href="/information/"><img src="/images/info_outline_24px.png">Информация</a>
			<ul class="nav-child unstyled small">
				<li class="item-278"><a href="/information/guarantees/">Гарантии</a></li>
				<li class="item-280"><a href="/information/dokumenty/sertifikaty-sootvetstviya/">Сертификаты</a></li>
				<li class="item-281"><a href="/information/articles/">Статьи</a></li>
				<li class="item-282"><a href="/information/videos/">Видео</a></li>
				<li class="item-422"><a href="/information/pokrytiya/">Покрытия</a></li>
				<li class="item-446 parent"><a href="/information/dokumenty/">Документы</a></li>
			</ul>
			<span class="after"></span>
		</div>
		<div class="col-12 it_canvas_menu parent"><a href="/gde-kupit/"><img src="/images/contact_phone_24px.png">Контакты</a>
			<ul class="nav-child unstyled small">
				<li class="item-302"><a href="/gde-kupit/">Москва</a></li>
				<li class="item-303"><a href="/gde-kupit/#vladimir">Владимир</a></li>
				<li class="item-304"><a href="/gde-kupit/#kaluga">Калуга</a></li>
				<li class="item-305"><a href="/gde-kupit/#kovrov">Ковров</a></li>
				<li class="item-307"><a href="/gde-kupit/#istra">Истра</a></li>
				<li class="item-306"><a href="/gde-kupit/#podolsk">Подольск</a></li>
				<li class="item-309"><a href="/gde-kupit/#murom">Муром</a></li>
				<li class="item-466"><a href="/gde-kupit/#novgorod">Нижний Новгород</a></li>
				<li class="item-310"><a href="/gde-kupit/#smolensk">Смоленск</a></li>
				<li class="item-308"><a href="/gde-kupit/#tula">Тула</a></li>
			</ul>
			<span class="after"></span>
		</div>
	</div>
</div>
<?
}?>
<script type="text/javascript">
	jQuery(window).scroll(function(){
		if (jQuery(window).scrollTop() > 100) {
			jQuery('#head-mobile').addClass('header-fixed');
		}
		else {
			jQuery('#head-mobile').removeClass('header-fixed');
		}
	});
	jQuery(document).ready(function () {
		jQuery('.catalog_mod .rights, .fa.fa-times-circle').on('click', function(){
			jQuery('#jf_mmpro_2_panel').click();
		})
		jQuery('#search_img').on('click', function(){
			if (jQuery(this).hasClass('active')) {
				jQuery(this).removeClass('active');
				jQuery('.row_mob_1').removeClass('active');
				jQuery('#menu_img img').attr('src', '/images/Меню.png');
			}
			else if (jQuery(this).hasClass('active1')) {

			}
			else{
				jQuery(this).addClass('active');
				jQuery('#menu_img, .row_mob_1').addClass('active');
				jQuery('#menu_img img').attr('src', '/images/Закрыть.png');
			}
		})
		jQuery(document).on('click', '#menu_img',function(){
			if (jQuery(this).hasClass('active')) {
				jQuery(this).removeClass('active');
				jQuery('#search_img, .row_mob_1,#logo_mob, .offcanvas_menu').removeClass('active');
				jQuery('#menu_img img').attr('src', '/images/Меню.png');
			}
			else{
				jQuery(this).addClass('active');
				jQuery(' .row_mob_1, .offcanvas_menu, #logo_mob').addClass('active');
				jQuery('#menu_img').addClass('active');
				jQuery('#menu_img img').attr('src', '/images/Закрыть.png');
			}
		})
		jQuery(document).on('click', 'span.after',function(){
			if (jQuery(this).hasClass('active')) {
				jQuery(this).removeClass('active');
				jQuery('.it_canvas_menu.parent').removeClass('active');
			}
			else{
				jQuery(this).addClass('active');
				jQuery(this).parent().addClass('active');
			}
		})


	})
</script>
<script>
	(function(w, d, u, i, o, s, p) {
		if (d.getElementById(i)) { return; } w['MangoObject'] = o;
		w[o] = w[o] || function() { (w[o].q = w[o].q || []).push(arguments) }; w[o].u = u; w[o].t = 1 * new Date();
		s = d.createElement('script'); s.async = 1; s.id = i; s.src = u;
		p = d.getElementsByTagName('script')[0]; p.parentNode.insertBefore(s, p);
	}(window, document, '//widgets.mango-office.ru/widgets/mango.js', 'mango-js', 'mgo'));
	mgo({calltracking: {id: 27020, elements: [{"selector":".mgo-number"}], domain: 'www.marketprofil.ru'}});
</script>
</body>
</html>