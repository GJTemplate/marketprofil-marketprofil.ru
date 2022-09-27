<?php
/**
 *
 * Show the product details page
 *
 * @package	VirtueMart
 * @subpackage
 * @author Max Milbers, Eugen Stranz, Max Galt
 * @link https://virtuemart.net
 * @copyright Copyright (c) 2004 - 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 9821 2018-04-16 18:04:39Z Milbo $
 */
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

/* Let's see if we found the product */
if (empty($this->product)) {
	echo vmText::_('COM_VIRTUEMART_PRODUCT_NOT_FOUND');
	echo '<br /><br />  ' . $this->continue_link_html;
	return;
}

echo shopFunctionsF::renderVmSubLayout('askrecomjs',array('product'=>$this->product));


$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$doc->setTitle($this->product->product_name.' 😍 - ➡️ Интернет-магазин');

$doc->setDescription($this->product->product_name.' 😍 - ➡️ Интернет-магазин 🧱 Маркет Профиль 🧱 от Металл Профиль ✅ доступные цены ➡️ Качественный сервис ☎️ +7 (495) 259-24-19');



if(vRequest::getInt('print',false)){ ?>
	<body onload="javascript:print();">
	<?php } ?>

	<div class="product-container productdetails-view productdetails">

<!-- 	<?php
	// Product Navigation
	if (VmConfig::get('product_navigation', 1)) {
	?>
		<div class="product-neighbours">
		<?php
		if (!empty($this->product->neighbours ['previous'][0])) {
		$prev_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['previous'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $prev_link, $this->product->neighbours ['previous'][0]
			['product_name'], array('rel'=>'prev', 'class' => 'previous-page','data-dynamic-update' => '1'));
		}
		if (!empty($this->product->neighbours ['next'][0])) {
		$next_link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->neighbours ['next'][0] ['virtuemart_product_id'] . '&virtuemart_category_id=' . $this->product->virtuemart_category_id, FALSE);
		echo JHtml::_('link', $next_link, $this->product->neighbours ['next'][0] ['product_name'], array('rel'=>'next','class' => 'next-page','data-dynamic-update' => '1'));
		}
		?>
		<div class="clear"></div>
		</div>
	<?php } // Product Navigation END
?> -->

<!-- 	<?php // Back To Category Button
	if ($this->product->virtuemart_category_id) {
		$catURL =  JRoute::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id='.$this->product->virtuemart_category_id, FALSE);
		$categoryName = vmText::_($this->product->category_name) ;
	} else {
		$catURL =  JRoute::_('index.php?option=com_virtuemart');
		$categoryName = vmText::_('COM_VIRTUEMART_SHOP_HOME') ;
	}
?> -->
<!-- 	<div class="back-to-category">
		<a href="<?php echo $catURL ?>" class="product-details" title="<?php echo $categoryName ?>"><?php echo vmText::sprintf('COM_VIRTUEMART_CATEGORY_BACK_TO',$categoryName) ?></a>
	</div> -->

	<?php // Product Title   ?>
	<h1><?php echo $this->product->product_name ?></h1>
	<?php // Product Title END   ?>

	<?php // afterDisplayTitle Event
	echo $this->product->event->afterDisplayTitle ?>

	<?php
	// Product Edit Link
	echo $this->edit_link;
	// Product Edit Link END
	?>

<!-- 	<?php
	// PDF - Print - Email Icon
	if (VmConfig::get('show_emailfriend') || VmConfig::get('show_printicon') || VmConfig::get('pdf_icon')) {
	?>
		<div class="icons">
		<?php

		$link = 'index.php?tmpl=component&option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $this->product->virtuemart_product_id;

		echo $this->linkIcon($link . '&format=pdf', 'COM_VIRTUEMART_PDF', 'pdf_button', 'pdf_icon', false);
		//echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon');
		echo $this->linkIcon($link . '&print=1', 'COM_VIRTUEMART_PRINT', 'printButton', 'show_printicon',false,true,false,'class="printModal"');
		$MailLink = 'index.php?option=com_virtuemart&view=productdetails&task=recommend&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component';
		echo $this->linkIcon($MailLink, 'COM_VIRTUEMART_EMAIL', 'emailButton', 'show_emailfriend', false,true,false,'class="recommened-to-friend"');
		?>
		<div class="clear"></div>
		</div>
	<?php } // PDF - Print - Email Icon END
?> -->



<div class="vm-product-container">
	<div class="vm-product-media-container col-md-7">
		<?php
		echo $this->loadTemplate('images');
		?>
	</div>

	<div class="vm-product-details-container col-md-5 pd0">
		<div class="row proizvod_gar">
			<div class="col-md-6">
				<div class="img_manuf">
					<?php
	// Logo of Manufacturer
					JRequest::setVar('virtuemart_manufacturer_id',$this->product->virtuemart_manufacturer_id,'GET');
					$model = VmModel::getModel('manufacturer');
					if ($this->product->virtuemart_manufacturer_id !=0 ) {
						$manufacturer = $model->getManufacturer();
						$model->addImages($manufacturer,1);
						$this->manufacturerImage = $manufacturer->images[0]->displayMediaFull('class="manufacturer-image" alt="Металл Профиль"',false);
						
							//($manufacturer->images[0]);
					}
					$req = explode("/", $_SERVER['REQUEST_URI']);

					?>
					<?if($manufacturer->images[0]->virtuemart_media_id > 0){
						?>
						<a href="<?=$manufacturer->mf_url;?>" title="Металлпрофиль" >

							<?
							echo $this->manufacturerImage;
							?>
						</a>
						<?
					}
					?>
				</div>
			</div>
			<div class="col-md-6">
				<?php if(!empty($this->product->customfieldsSorted['garantiya'][0]->display)){ ?><div class="gaarntiya"><img src="/images/shchit.png"> <span>Гарантия</span> <span class="text"><?php echo $this->product->customfieldsSorted['garantiya'][0]->display; ?></span></div><? } ?>
			</div>
		</div>
		<div class="spacer-buy-area pd0">

			<div class="row">
				<div class="parametr">
					<?	echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'right'));?>
				</div>
			</div>
						<div class="row">
				<div class="parametr gibkiy_parametr">
					<?	echo shopFunctionsF::renderVmSubLayout('customfieldgibkaya',array('product'=>$this->product,'position'=>'color_gibkaya'));?>
				</div>
			</div>
			<div class="col-md-12" id="colors_link">
				<h3>Другие цвета</h3>
				<? 

				$vid = '';
				$pokr = '';
				$cvet = '';
				$tol = '';
				foreach ($this->product->customfieldsSorted['right'] as $value) {
					if ($value->virtuemart_custom_id == '9') {
						$tol = $value->customfield_value;
					}
					if ($value->virtuemart_custom_id == '10') {
						$cvet = $value->customfield_value;
					}
					if ($value->virtuemart_custom_id == '22') {
						$pokr = $value->customfield_value;
					}
				}
				foreach ($this->product->customfieldsSorted['normal'] as $value) {

					if ($value->virtuemart_custom_id == '27') {
						$vid = $value->customfield_value;
					}				
				}
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				$query->select($db->quoteName('*'));
				$query->from($db->quoteName('#__virtuemart_product_customfields'));
				$query->where($db->quoteName('virtuemart_custom_id') . ' = ' . $db->quote('27') .' AND '.$db->quoteName('customfield_value') . ' = ' . $db->quote($vid));
				$db->setQuery($query);
				$results = $db->loadObjectList();
				$mass_res = array();
				foreach ($results as $value) {
					$db_1 = JFactory::getDbo();
					$query = $db_1->getQuery(true);
					$query->select($db_1->quoteName('*'));
					$query->from($db_1->quoteName('#__virtuemart_product_customfields'));
					$query->where($db_1->quoteName('virtuemart_product_id') . ' = ' . $db_1->quote($value->virtuemart_product_id));
					$db_1->setQuery($query);
					$results_1 = $db_1->loadObjectList();

					foreach ($results_1 as $value_1) {
						if ($value_1->virtuemart_custom_id == '9') {
							$tol_1= $value_1->customfield_value;
						}
						if ($value_1->virtuemart_custom_id == '10') {
							$cvet_1 = $value_1->customfield_value;
						}
						if ($value_1->virtuemart_custom_id == '22') {
							$pokr_1 = $value_1->customfield_value;
						}
					}

					$db_name = JFactory::getDbo();
					$query = $db_name->getQuery(true);
					$query->select($db_name->quoteName('*'));
					$query->from($db_name->quoteName('#__virtuemart_products_ru_ru'));
					$query->where($db_name->quoteName('virtuemart_product_id') . ' = ' . $db_name->quote($value->virtuemart_product_id));
					$db_name->setQuery($query);
					$results_name = $db_name->loadObjectList();
					$mass_res[] = array('name'=>$results_name[0]->product_name,'id'=>$value->virtuemart_product_id, 'tolshcina'=>$tol_1, 'pokritie'=>$pokr_1, 'color'=>$cvet_1);

				}
				foreach ($mass_res as  $value) {
					$this_name = explode(" (", $this->product->product_name);
					$prod_name = explode(" (", $value['name']);

					if ($this_name[0] == $prod_name[0]) {
						if ($value['pokritie'] == $pokr && $value['tolshcina'] == $tol) {
							$link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' .$value['id'] , FALSE);
							if (floatval(preg_replace('/[^0-9]/', '', $value['color'])) > 100) {
								$text = 'Ral '.preg_replace('/[^0-9]/', '', $value['color']);
							}
							else{
								$text = 'RR '.preg_replace('/[^0-9]/', '', $value['color']);

							}
							?>
							<a href="<?= $link;?>" class="lin_color" title="<?=$value['name']?>"><div class="color_mch ral_<?=preg_replace('/[^0-9]/', '', $value['color']);?>"></div><div><?=$text;?></div></a>
							<?
						}

					}
				}
				?>

			</div>
			<div class="col-md-12" id="tolshchina">
				<h3>Другие толщины</h3>
				<?
				foreach ($mass_res as  $value) {
					$this_name = explode(" (", $this->product->product_name);
					$prod_name = explode(" (", $value['name']);
					if ($this_name[0] == $prod_name[0]) {
						if ($value['pokritie'] == $pokr && $value['color'] == $cvet) {
							$link = JRoute::_('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' .$value['id'] , FALSE);
							?>
							<a href="<?= $link;?>"><div class="tol_mch"><?= $value['tolshcina'] ?></div></a>
							<?
						}

					}
				}
				?>
			</div>
			<?php

			foreach ($this->productDisplayTypes as $type=>$productDisplayType) {

				foreach ($productDisplayType as $productDisplay) {

					foreach ($productDisplay as $virtuemart_method_id =>$productDisplayHtml) {
						?>
						<div class="<?php echo substr($type, 0, -1) ?> <?php echo substr($type, 0, -1).'-'.$virtuemart_method_id ?>">
							<?php
							echo $productDisplayHtml;
							?>
						</div>
						<?php
					}
				}
			}
			$postdate = $this->product->modified_on;
			$today = date('Y-m-d');
			$diff = strtotime($today) - strtotime($postdate);
			$days = (int)$diff/(60*60*24);
			$cats_mass = array(2947, 5178, 5180, 5179, 2942, 5159, 5163, 5160, 5166, 5165, 5167, 5162, 5168, 5169, 5170, 5164, 5133, 5134, 5132, 5135, 5136, 5131, 3078, 2932, 3092, 2931, 5181, 2921, 2913, 5193, 2926, 5177, 5176, 5175, 5152, 5158, 5153, 5150, 5155, 5156);
			$flag_cats = false;
			?>
			<? foreach ($this->product->categoryItem as $value) {
				
				if (in_array($value['virtuemart_category_id'], $cats_mass)) {
					$flag_cats = true;
				}
			} ?>
			<div class="row abs_btn">
				<div class="col-md-12 "><? echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$this->product,'currency'=>$this->currency));
				if ($this->product->product_packaging > 0 && $this->product->product_unit == 'SM') { ?><span class="ed_izm">/м<sup>2</sup></span><? }
					if ($days > 10 && $flag_cats) {echo '<span class="star_price">*</span>';	}?></div>
				<?

				if ($days > 10 && $flag_cats) {
					?>
					<div class="dop_zaps_price">* Точную цену уточняйте у менджера</div>
				<? } ?>
				<div class="col-md-12 "><? echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$this->product)); ?></div>
			</div>



			<?
			echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$this->product));

		// Ask a question about this product
			if (VmConfig::get('ask_question', 0) == 1) {
				$askquestion_url = JRoute::_('index.php?option=com_virtuemart&view=productdetails&task=askquestion&virtuemart_product_id=' . $this->product->virtuemart_product_id . '&virtuemart_category_id=' . $this->product->virtuemart_category_id . '&tmpl=component', FALSE);
				?>
				<div class="ask-a-question">
					<a class="ask-a-question" href="<?php echo $askquestion_url ?>" rel="nofollow" ><?php echo vmText::_('COM_VIRTUEMART_PRODUCT_ENQUIRY_LBL') ?></a>
				</div>
				<?php
			}
			?>



		</div>
	</div>
	<div class="clear"></div>

	<?php
	// Product Short Description
	if (!empty($this->product->product_s_desc)) {
		?>
		<div class="product-short-description">
			<?php
			/** @todo Test if content plugins modify the product description */
			echo $this->product->product_s_desc;
			?>
		</div>
		<?php
	} // Product Short Description END

	echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'ontop'));
	?>
</div>
<?php
$count_images = count ($this->product->images);
if ($count_images > 1) {
	echo $this->loadTemplate('images_additional');
}

	// event onContentBeforeDisplay
echo $this->product->event->beforeDisplayContent; ?>
<div class="row">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item"><a class="nav-link active" id="tabs8-tab" data-toggle="tab" href="#tabs8" role="tab" aria-controls="tabs8" aria-selected="false">Описание</a></li>
		<li class="nav-item"><a class="nav-link" id="tabs9-tab" data-toggle="tab" href="#tabs9" role="tab" aria-controls="tabs9" aria-selected="false">Характеристики</a></li>
		<? if ($this->product->customfieldsSorted['id_material'][0]->display) {?><li class="nav-item"><a class="nav-link " id="tabs1-tab" data-toggle="tab" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">Покрытия</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['komplect'])){ ?><li class="nav-item"><a class="nav-link" id="tabs2-tab" data-toggle="tab" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">Комплектующие</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['poleznaya_infa'])){ ?><li class="nav-item"><a class="nav-link" id="tabs3-tab" data-toggle="tab" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">Полезная информация</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['Instruction'])){ ?><li class="nav-item"><a class="nav-link" id="tabs4-tab" data-toggle="tab" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">Инструкции</a></li><? } ?>
		<? if($flag_cats){ ?><li class="nav-item"><a class="nav-link" id="tabs5-tab" data-toggle="tab" href="#tabs5" role="tab" aria-controls="tabs5" aria-selected="false">Чертеж</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['gallary'])){ ?><li class="nav-item"><a class="nav-link" id="tabs6-tab" data-toggle="tab" href="#tabs6" role="tab" aria-controls="tabs6" aria-selected="false">Галерея</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['faq'])){ ?><li class="nav-item"><a class="nav-link" id="tabs7-tab" data-toggle="tab" href="#tabs7" role="tab" aria-controls="tabs7" aria-selected="false">FAQ</a></li><? } ?>
	</ul>
	<div class="tab-content" id="myTabContent">
		<? if ($this->product->customfieldsSorted['id_material'][0]->display) {
			?>
			<div class="tab-pane fade " id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
				<?

				$db = JFactory::getDbo();

				$query = $db->getQuery(true);
				$query->select('*');
				$query->from('#__content');
				$query->where($db->quoteName('id') . ' = ' . $this->product->customfieldsSorted['id_material'][0]->display);
				
				$db->setQuery((string)$query);
				$res = $db->loadObjectList();

				foreach($res as $r){
					
					$name = $r->title;
					$intro = $r->introtext;
					$img = json_decode($r->images);
				}
				?>
				<div class="row line_ccc">
					<a href="#" class="name_pokritie"><?=$name?></a>
				</div>
				<div class="row">
					<div class="col-lg-4">
						<div class="">
							<img class="coating_img" src="<?=$img->image_intro;?>" >
						</div>
					</div>
					<div class="col-lg-8">
						<h3 class="card-page_tabs-content__item-description-title">
							<?=$name?>															
							<span>
								<img src="/images/shchit.png" alt="1" title="1"> Гарантия 5 лет								
							</span>
						</h3>
						<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start">
							<div class="d-flex flex-column justify-content-between align-items-center card-page_tabs-content__item-description-right">

								<div class="color-desc">
									<?=$intro;?>
								</div>
							</div>
						</div>
						<p class="avail_colors">Доступные цвета</p>
						<div class="avail_colors_list">

							<div class="avail_color_item">
								<img src="/upload/iblock/d2f/d2f30a53c286042ea5753cf4f1ed09d0.jpg" alt="Ламонтерра Полиэстер Ral 1014 фото" title="Ламонтерра Полиэстер Ral 1014">
								<p>Ral 1014</p>
							</div>

						</div>
					</div>
				</div>
			</div>
			<?
		} ?>

		<div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab"><?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_products','class'=> 'product-related-products','customTitle' => true ));
	?></div>
	<div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'poleznaya_infa'));
		?>
	</div>
	<div class="tab-pane fade" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfieldspdf',array('product'=>$this->product,'position'=>'Instruction'));
		?>
	</div>
	<div class="tab-pane fade" id="tabs5" role="tabpanel" aria-labelledby="tabs5-tab">
		<?
		//echo shopFunctionsF::renderVmSubLayout('customfieldschertezh',array('product'=>$this->product,'position'=>'chertezh'));
		?>
		<img src="">
	</div>
	<div class="tab-pane fade" id="tabs6" role="tabpanel" aria-labelledby="tabs6-tab" style="background: #e7ebef; padding: 30px 15px;">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfieldsgall',array('product'=>$this->product,'position'=>'gallary'));
		?>
	</div>
	<div class="tab-pane fade" id="tabs7" role="tabpanel" aria-labelledby="tabs7-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'faq'));
		?>
	</div>
	<div class="tab-pane fade show active" id="tabs8" role="tabpanel" aria-labelledby="tabs8-tab">
		<?
		$arr_cat_id = array();
		foreach ($this->product->categoryItem as $value) {
			$arr_cat_id[] = $value['virtuemart_category_id'];
		}
		if (in_array('5131', $arr_cat_id)) {
			echo $this->loadTemplate('text1');
		}
		elseif (in_array('5136', $arr_cat_id)) {
			echo $this->loadTemplate('text2');
		}
		elseif (in_array('5135', $arr_cat_id)) {
			echo $this->loadTemplate('text3');
		}
		elseif (in_array('5132', $arr_cat_id)) {
			echo $this->loadTemplate('text4');
		}
		elseif (in_array('5134', $arr_cat_id)) {
			echo $this->loadTemplate('text5');
		}
		elseif (in_array('5133', $arr_cat_id)) {
			echo $this->loadTemplate('text6');
		}			
		else{
			echo  $this->product->product_desc;
		} ?>                
	</div>
	<div class="tab-pane fade" id="tabs9" role="tabpanel" aria-labelledby="tabs9-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'right'));
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'normal'));
		?>
	</div>
</div>
</div>
<?php
	//echo ($this->product->product_in_stock - $this->product->product_ordered);
	// Product Description




	// Product Packaging
$product_packaging = '';
if ($this->product->product_box) {
	?>
	<div class="product-box">
		<?php
		echo vmText::_('COM_VIRTUEMART_PRODUCT_UNITS_IN_BOX') .$this->product->product_box;
		?>
	</div>
<?php } // Product Packaging END ?>

<?php
echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'onbot'));



echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'related_categories','class'=> 'product-related-categories'));

?>

<?php // onContentAfterDisplay event
echo $this->product->event->afterDisplayContent;

//echo $this->loadTemplate('reviews');

// Show child categories
if ($this->cat_productdetails)  {
	echo $this->loadTemplate('showcategory');
}

$j = 'jQuery(document).ready(function($) {
	$("form.js-recalculate").each(function(){
		if ($(this).find(".product-fields").length && !$(this).find(".no-vm-bind").length) {
			var id= $(this).find(\'input[name="virtuemart_product_id[]"]\').val();
			Virtuemart.setproducttype($(this),id);

		}
		});
	});';
//vmJsApi::addJScript('recalcReady',$j);

	if(VmConfig::get ('jdynupdate', TRUE)){

/** GALT
	 * Notice for Template Developers!
	 * Templates must set a Virtuemart.container variable as it takes part in
	 * dynamic content update.
	 * This variable points to a topmost element that holds other content.
	 */
$j = "Virtuemart.container = jQuery('.productdetails-view');
Virtuemart.containerSelector = '.productdetails-view';
//Virtuemart.recalculate = true;	//Activate this line to recalculate your product after ajax
";

vmJsApi::addJScript('ajaxContent',$j);

$j = "jQuery(document).ready(function($) {
	Virtuemart.stopVmLoading();
	var msg = '';
	$('a[data-dynamic-update=\"1\"]').off('click', Virtuemart.startVmLoading).on('click', {msg:msg}, Virtuemart.startVmLoading);
	$('[data-dynamic-update=\"1\"]').off('change', Virtuemart.startVmLoading).on('change', {msg:msg}, Virtuemart.startVmLoading);
});";

vmJsApi::addJScript('vmPreloader',$j);
}

echo vmJsApi::writeJS();

if ($this->product->prices['salesPrice'] > 0) {
	echo shopFunctionsF::renderVmSubLayout('snippets',array('product'=>$this->product, 'currency'=>$this->currency, 'showRating'=>$this->showRating));
}

?>
</div>

{module 117}