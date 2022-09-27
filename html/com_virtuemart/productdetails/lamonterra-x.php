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

	$chast_1 = explode(" МП ", $this->product->product_name);
	$chast_2 = explode(" (", $chast_1[1]);
$app = JFactory::getApplication();
$document = JFactory::getDocument();
if ($this->product->customtitle) {
    $document->setTitle(strip_tags(html_entity_decode(ucfirst(strtolower($chast_2[0])).' металлочерепица '.$pokr.' '.$tol.' мм. '.$cvet.' | ⚒️ Металл Профиль',ENT_QUOTES)));
	$document->setDescription(strip_tags(html_entity_decode(ucfirst(strtolower($vid)).' металлочерепица в покрытии '.$pokr.' '.$tol.' мм. цвет '.$cvet.' ➡️ купить от Металл Профиль ✅ доступные цены ➡️ Качественный сервис ☎️ +7 (495) 259-24-19',ENT_QUOTES)));
} else {
    $document->setTitle(strip_tags(html_entity_decode(ucfirst(strtolower($chast_2[0])).' металлочерепица '.$pokr.' '.$tol.' мм. '.$cvet.' | ⚒️ Металл Профиль',ENT_QUOTES)));
	$document->setDescription(strip_tags(html_entity_decode(ucfirst(strtolower($vid)).' металлочерепица в покрытии '.$pokr.' '.$tol.' мм. цвет '.$cvet.' ➡️ купить от Металл Профиль ✅ доступные цены ➡️ Качественный сервис ☎️ +7 (495) 259-24-19',ENT_QUOTES)));
}


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
								$titl = explode("(", $value['name']);
								?>
								<a href="<?= $link;?>" class="lin_color" title="<?=$text;?> <?=$titl[0];?><?=$value['tolshcina'];?> <?=$value['pokritie'];?>"><div class="color_mch ral_<?=preg_replace('/[^0-9]/', '', $value['color']);?>"></div><div><?=$text;?></div></a>
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

				?>
				<div class="row abs_btn">
					<div class="col-md-12 "><? echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$this->product,'currency'=>$this->currency)); ?><span class="m2">/м<sup>2</sup></span></div>

									

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
<?
///////////////////////////////////
////Тут задаем id комплектующих////
///////////////////////////////////
$komplect = array(301199, 287332, 300791, 299469, 301864, 298588, 293385, 308447, 300204, 299546, 297321, 297719, 300040);

?>
<div class="row">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		
		<li class="nav-item"><a class="nav-link active" id="tabs8-tab" data-toggle="tab" href="#tabs8" role="tab" aria-controls="tabs8" aria-selected="false">Описание</a></li>
		<? if(!empty($pokr)){?><li class="nav-item"><a class="nav-link " id="tabs1-tab" data-toggle="tab" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">Покрытия</a><?}?>
		<? if(count($komplect) > 0){ ?><li class="nav-item"><a class="nav-link" id="tabs2-tab" data-toggle="tab" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">Комплектующие</a></li><? } ?>
		<li class="nav-item"><a class="nav-link" id="tabs9-tab" data-toggle="tab" href="#tabs9" role="tab" aria-controls="tabs9" aria-selected="false">Характеристики</a></li>


		<? if(isset($this->product->customfieldsSorted['poleznaya_infa'])){ ?><li class="nav-item"><a class="nav-link" id="tabs3-tab" data-toggle="tab" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">Полезная информация</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['Instruction'])){ ?><li class="nav-item"><a class="nav-link" id="tabs4-tab" data-toggle="tab" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">Инструкции</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['chertezh'])){ ?><li class="nav-item"><a class="nav-link" id="tabs5-tab" data-toggle="tab" href="#tabs5" role="tab" aria-controls="tabs5" aria-selected="false">Чертеж</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['gallary'])){ ?><li class="nav-item"><a class="nav-link" id="tabs6-tab" data-toggle="tab" href="#tabs6" role="tab" aria-controls="tabs6" aria-selected="false">Галерея</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['faq'])){ ?><li class="nav-item"><a class="nav-link" id="tabs7-tab" data-toggle="tab" href="#tabs7" role="tab" aria-controls="tabs7" aria-selected="false">FAQ</a></li><? } ?>
	</ul>
	<div class="tab-content" id="myTabContent">

		<div class="tab-pane fade " id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
			<? 

			$db_1 = JFactory::getDbo();
			$query = $db_1->getQuery(true);
			$query->select($db_1->quoteName('*'));
			$query->from($db_1->quoteName('#__content'));
			$query->where($db_1->quoteName('metakey') . ' LIKE ' . $db_1->quote('%'.$pokr.'%'));
			$db_1->setQuery($query);
			$results_1 = $db_1->loadObjectList();

			$query = $db_1->getQuery(true);
			$query->select($db_1->quoteName('*'));
			$query->from($db_1->quoteName('#__fields_values'));
			$query->where($db_1->quoteName('item_id') . ' = ' . $db_1->quote($results_1[0]->id));
			$db_1->setQuery($query);
			$results_2 = $db_1->loadObjectList();

			foreach ($results_2 as $value) {
				if($value->field_id == '1'){	$har_1 = $value->value; }
				if($value->field_id == '2'){	$class_1 = $value->value; }
				if($value->field_id == '3'){	$tol_1 = $value->value; }
				if($value->field_id == '4'){	$gar_1 = $value->value; }
			}
			$images = json_decode($results_1[0]->images);

			?>
			<div class="row">
				<div class="col-md-5 float-left"><img src="<?=$images->image_intro; ?>" alt="Фото <?=$results_1[0]->title?>" title="Покрытие <?=$results_1[0]->title?>"></div>
				<div class="col-md-7 float-left">
					<h3 class="card-page_tabs-content__item-description-title"><?= $results_1[0]->title; ?><span><img src="/images/shield-icon.png" alt="1" title="1">Гарантия <?=$gar_1;?></span></h3>
					<table class="card-page_tabs-content__item-description-table">
						<tbody><tr>
							<td>Основная характеристика:</td>
							<td><strong><?=$har_1;?></strong></td>
						</tr>
						<tr>
							<td>Класс покрытия:</td>
							<td><strong><?=$class_1;?></strong></td>
						</tr>
						<tr>
							<td>Толщина покрытия:</td>
							<td><strong><?=$tol_1;?></strong></td>
						</tr>
					</tbody>
				</table>
				<div>
					<?= mb_strimwidth($results_1[0]->introtext, 0, 500, "..."); ?>
				</div>
				<div><a href="/information/pokrytiya/<?=$results_1[0]->alias;?>" class="readmore">Подробнее ...</a>
				</div>
			</div>
		</div>
	</div>


	<div class="tab-pane fade" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
		<?
		$productModel = VmModel::getModel('Product');
		$model = VmModel::getModel('Media');

		foreach ($komplect as  $value) {		
			$product = $productModel->getProduct($value);

			$image = $model->createMediaByIds($product->virtuemart_media_id[0]);
	
			?>
			<div class="kompl_prod">
				<div class="img"><img src="<?=$image[0]->file_url?>"></div>
				<div class="name"><?=$product->product_name;?></div>
			</div>
			<?

		}
		?>
	</div>
	<div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'poleznaya_infa'));
		?>
	</div>
	<div class="tab-pane fade instruction" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
		<!--PDF --->
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/Интсрукция по монтажу металлочерепицы.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Интсрукция по монтажу металлочерепицы</a></div></div>
		
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/Интсрукция по монтажу мч.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Интсрукция по монтажу металлочерепицы 2</a></div></div>
		
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/каталог цветов RAL.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Каталог цветов RAL</a></div></div>
		
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/Интсрукция по монтажу металлочерепицы Новая.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Интсрукция по монтажу металлочерепицы Новая</a></div></div>
		
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/Интсрукция по транспортировке металлочерепицы.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Интсрукция по транспортировке металлочерепицы</a></div></div>
		
		<div class="product-field product-field-type-S  col-md-6"><div class="product-field-display"><a href="/upload/Новые профили металлочерепицы.pdf"><img class="float-left mr-3 jch-lazyloaded" src="/images/pdf.png" data-src="/images/pdf.png" width="32" height="32">Новые профили металлочерепицы</a></div></div>

	</div>
	<div class="tab-pane fade" id="tabs5" role="tabpanel" aria-labelledby="tabs5-tab">
		<!---- Чертеж -->
		<img class=" jch-lazyloaded" title="Чертеж ЛАМОНТЕРРА X" alt="Схема Металлочерепица МП Ламонтерра X" src="/images/foto-kat/lamonterra.jpg" data-src="/images/foto-kat/lamonterra X.jpg" width="1600" height="1867">

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
		echo shopFunctionsF::renderVmSubLayout('customfieldss',array('product'=>$this->product,'position'=>'right'));
		echo shopFunctionsF::renderVmSubLayout('customfieldss',array('product'=>$this->product,'position'=>'normal'));
		?>
	</div>
</div>
</div>
<div>
	{module 134}
</div>
<div class="clear"></div>
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