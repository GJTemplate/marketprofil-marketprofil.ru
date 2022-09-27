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
$rabshir = '';
$tolpanel = '';
$napolnitel = '';
$krep = '';
$sootvetstv = '';
$tab_send_1 = '';
$tab_send_2 = '';
$tab_send_3 = '';
$tab_send_4 = '';
foreach ($this->product->customfieldsSorted['right'] as $value) {
	if ($value->virtuemart_custom_id == '9') {
		$tol = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '10') {
		$cvet = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '11') {
		$pokr = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '38') {
		$napolnitel = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '42') {
		$krep = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '39') {
		$sootvetstv = $value->customfield_value;
	}	
	if ($value->virtuemart_custom_id == '39') {$tab_send_1 = $value->customfield_value; }
	if ($value->virtuemart_custom_id == '38') {$tab_send_2 = $value->customfield_value; }
	if ($value->virtuemart_custom_id == '40') {$tab_send_3 = $value->customfield_value; }
	if ($value->virtuemart_custom_id == '42') {$tab_send_4 = $value->customfield_value; }


}
foreach ($this->product->customfieldsSorted['normal'] as $value) {

	if ($value->virtuemart_custom_id == '27') {
		$vid = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '48') {
		$rabshir = $value->customfield_value;
	}
	if ($value->virtuemart_custom_id == '37') {
		$tolpanel = $value->customfield_value;
	}	
}


$app = JFactory::getApplication();
$document = JFactory::getDocument();
if ($this->product->customtitle) {
    $document->setTitle(strip_tags(html_entity_decode(ucfirst(strtolower()).'ТСП '.$rabshir.'-'.$tolpanel.' мм. '.$pokr.' '.$cvet.' '.$napolnitel.' '.$krep.' '.$sootvetstv.' | ⚒️ Металл Профиль',ENT_QUOTES)));
	$document->setDescription(strip_tags(html_entity_decode(ucfirst(strtolower()).'ТСП '.$rabshir.'-'.$tolpanel.' мм. '.$pokr.' '.$cvet.' '.$napolnitel.' '.$krep.' '.$sootvetstv.' ➡️ купить от Металл Профиль ✅ доступные цены ➡️ Качественный сервис ☎️ +7 (495) 259-24-19',ENT_QUOTES)));
} else {
    $document->setTitle(strip_tags(html_entity_decode(ucfirst(strtolower()).'ТСП '.$rabshir.' '.$tolpanel.' '.$pokr.' '.$cvet.' '.$napolnitel.' '.$krep.' '.$sootvetstv.' | ⚒️ Металл Профиль',ENT_QUOTES)));
	$document->setDescription(strip_tags(html_entity_decode(ucfirst(strtolower()).'ТСП '.$rabshir.'-'.$tolpanel.' мм. '.$pokr.' '.$cvet.' '.$napolnitel.' '.$krep.' '.$sootvetstv.' ➡️ купить от Металл Профиль ✅ доступные цены ➡️ Качественный сервис ☎️ +7 (495) 259-24-19',ENT_QUOTES)));
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
	?> --><div class="row proizvod_gar">

		<div class="col-md-6">
		</div>
	</div>

	

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
						<a href="/catalog/" title="Металлпрофиль">
							<img class="manufacturer-image" alt="Металл Профиль" src="/images/virtuemart/manufacturer/mp7.png" data-src="/images/virtuemart/manufacturer/mp7.png" width="120" height="74"><noscript><img  class="manufacturer-image" alt="Металл Профиль"  src="/images/virtuemart/manufacturer/mp7.png" width="120" height="74" /></noscript>	</a>
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
						<div class="col-md-12 "><? echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$this->product,'currency'=>$this->currency)); ?></div>
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
$komplect = array(418133, 418136, 418134, 418139, 418137, 418138);

?>
<div class="row">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		
		
		<? if(!empty($pokr)){?><li class="nav-item"><a class="nav-link " id="tabs1-tab" data-toggle="tab" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">Покрытия</a></li><?}?>
		<li class="nav-item"><a class="nav-link" id="tabs9-tab" data-toggle="tab" href="#tabs9" role="tab" aria-controls="tabs9" aria-selected="false">Характеристики</a></li>
		<? if(!empty($tab_send_1)){?><li class="nav-item"><a class="nav-link " id="tabs-s-1-tab" data-toggle="tab" href="#tabs-s-1" role="tab" aria-controls="tabs-s-1" aria-selected="true">Соответствие</a></li><?}?>
		<? if(!empty($tab_send_2)){?><li class="nav-item"><a class="nav-link " id="tabs-s-2-tab" data-toggle="tab" href="#tabs-s-2" role="tab" aria-controls="tabs-s-2" aria-selected="true">Наполнитель</a></li><?}?>
		<? if(!empty($tab_send_3)){?><li class="nav-item"><a class="nav-link " id="tabs-s-3-tab" data-toggle="tab" href="#tabs-s-3" role="tab" aria-controls="tabs-s-3" aria-selected="true">Назначение</a></li><?}?>
		<? if(!empty($tab_send_4)){?><li class="nav-item"><a class="nav-link " id="tabs-s-4-tab" data-toggle="tab" href="#tabs-s-4" role="tab" aria-controls="tabs-s-4" aria-selected="true">Вид крепления</a></li><?}?>

		<? if(isset($this->product->customfieldsSorted['poleznaya_infa'])){ ?><li class="nav-item"><a class="nav-link" id="tabs3-tab" data-toggle="tab" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">Полезная информация</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['Instruction'])){ ?><li class="nav-item"><a class="nav-link" id="tabs4-tab" data-toggle="tab" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">Инструкции</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['chertezh'])){ ?><li class="nav-item"><a class="nav-link" id="tabs5-tab" data-toggle="tab" href="#tabs5" role="tab" aria-controls="tabs5" aria-selected="false">Чертеж</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['gallary'])){ ?><li class="nav-item"><a class="nav-link" id="tabs6-tab" data-toggle="tab" href="#tabs6" role="tab" aria-controls="tabs6" aria-selected="false">Галерея</a></li><? } ?>
		<? if(isset($this->product->customfieldsSorted['faq'])){ ?><li class="nav-item"><a class="nav-link" id="tabs7-tab" data-toggle="tab" href="#tabs7" role="tab" aria-controls="tabs7" aria-selected="false">FAQ</a></li><? } ?>
	</ul>
	<div class="tab-content" id="myTabContent">
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
		if (!empty($pokr)) {
			?>
			<div class="tab-pane fade  show active" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
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
		<?
	}
	?>
	<div class="tab-pane fade" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfields',array('product'=>$this->product,'position'=>'poleznaya_infa'));
		?>
	</div>
	<div class="tab-pane fade instruction" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfieldspdf',array('product'=>$this->product,'position'=>'Instruction'));
		?>
	</div>
	<div class="tab-pane fade" id="tabs5" role="tabpanel" aria-labelledby="tabs5-tab">
		<?
		echo shopFunctionsF::renderVmSubLayout('customfieldschertezh',array('product'=>$this->product,'position'=>'chertezh'));
		?>
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
	<div class="tab-pane fade " id="tabs8" role="tabpanel" aria-labelledby="tabs8-tab">
		<?
		$arr_cat_id = array();
		foreach ($this->product->categoryItem as $value) {
			$arr_cat_id[] = $value['virtuemart_category_id'];
		}
		if (in_array('5156', $arr_cat_id)) {
			echo $this->loadTemplate('text24');
		}
		elseif (in_array('5153', $arr_cat_id)) {
			echo $this->loadTemplate('text24');
		}
		elseif (in_array('5158', $arr_cat_id)) {
			echo $this->loadTemplate('text24');
		}
		elseif (in_array('5152', $arr_cat_id)) {
			echo $this->loadTemplate('text24');
		}
		elseif (in_array('5150', $arr_cat_id)) {
			echo $this->loadTemplate('text25');
		}
		elseif (in_array('5155', $arr_cat_id)) {
			echo $this->loadTemplate('text25');
		}
		elseif (in_array('5154', $arr_cat_id)) {
			echo $this->loadTemplate('text26');
		}
		elseif (in_array('5151', $arr_cat_id)) {
			echo $this->loadTemplate('text26');
		}
		elseif (in_array('5157', $arr_cat_id)) {
			echo $this->loadTemplate('text26');
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
	<div class="tab-pane fade" id="tabs-s-1" role="tabpanel" aria-labelledby="tabs-s-1-tab">
		<?
		
	
if ($tab_send_1 == 'SECRET FIX') { include_once 'tabs-s-4-2.php'; }
		else{ include_once 'tabs-s-4-1.php'; }
			?>
	</div>
	<div class="tab-pane fade" id="tabs-s-2" role="tabpanel" aria-labelledby="tabs-s-2-tab">
		<?
		
		if ($tab_send_2 == 'Минеральная вата') { include_once 'tabs-s-2-1.php'; }
		else{ include_once 'tabs-s-2-2.php'; }
			?>
	</div>
	<div class="tab-pane fade" id="tabs-s-3" role="tabpanel" aria-labelledby="tabs-s-3-tab">
		<?
		
		if ($tab_send_3 == 'стена') { include_once 'tabs-s-3-1.php'; }
		else{ include_once 'tabs-s-3-2.php'; }
			?>
	</div>
	<div class="tab-pane fade" id="tabs-s-4" role="tabpanel" aria-labelledby="tabs-s-4-tab">
		<?
				
			if ($tab_send_4 == 'ГОСТ 32603') { include_once 'tabs-s-1-2.php'; }
		else{ include_once 'tabs-s-1-1.php'; }
			?>
	</div>
</div>
</div>
<div>
	{module 138}
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