<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link https://virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */





defined('_JEXEC') or die('Restricted access');
$products_per_row = empty($viewData['products_per_row'])? 1:$viewData['products_per_row'] ;
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}

$dynamic = false;

if (vRequest::getInt('dynamic',false) and vRequest::getInt('virtuemart_product_id',false)) {
	$dynamic = true;
}

foreach ($viewData['products'] as $type => $products ) {

	$col = 1;
	$nb = 1;
	$row = 1;

	if($dynamic){
		$rowsHeight[$row]['product_s_desc'] = 1;
		$rowsHeight[$row]['price'] = 1;
		$rowsHeight[$row]['customfields'] = 1;
		$col = 2;
		$nb = 2;
	}
    else {
		$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

		if( (!empty($type) and count($products)>0) or (count($viewData['products'])>1 and count($products)>0)){
			$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
			<div class="<?php echo $type ?>-view">
				<h4><?php echo $productTitle ?></h4>
			<?php // Start the Output
		}
	}

	// Calculating Products Per Row
	$cellwidth = ' width'.floor ( 100 / $products_per_row );

	$BrowseTotalProducts = count($products);


	foreach ( $products as $product ) {
		if(!is_object($product) or empty($product->link)) {
			vmdebug('$product is not object or link empty',$product);
			continue;
		}
		// Show the horizontal seperator
		if ($col == 1 && $nb > $products_per_row) { ?>
<!-- 	<div class="horizontal-separator"></div>
	-->		<?php }

		// this is an indicator wether a row needs to be opened or not
	if ($col == 1) { ?>
		<div class="row">
		<?php }

		// Show the vertical seperator
		if ($nb == $products_per_row or $nb % $products_per_row == 0) {
			$show_vertical_separator = ' ';
		} else {
			$show_vertical_separator = $verticalseparator;
		}
		$products_per_row = 4;
    // Show Products

        /**
         * TODO - Создание ссылки для товара
         */
        $url = 'index.php?option=com_virtuemart&view=productdetails';
        $url .= '&virtuemart_product_id=281959';
//        $url .= '&virtuemart_category_id=5136';
//        $url .= '&virtuemart_manufacturer_id=0';
       // $url .= '&Itemid=214';
//        echo JRoute::_($url);
//        die(__FILE__ .' '. __LINE__ );

        ?>
    <div class="product vm-col<?php echo ' vm-col-' . $products_per_row . $show_vertical_separator ?>">
    	<div class="spacer product-container" data-vm="product-container">
    		<div class="vm-product-media-container">

    			<a title="<?php echo $product->product_name ?>" href="<?php echo JRoute::_($product->link.$ItemidStr); ?>">
    				<?php
    				echo $product->images[0]->displayMediaThumb('class="browseProductImage"', false);
    				?>
    			</a>

    		</div>
            <?php

            $session = JFactory::getSession();
            $vmlastvisitedItemid = $session->get( 'vmlastvisitedItemid', 0, 'vm' );




            $prodLink = JRoute::link('site' , $product->link  );
            $htmlLink = JHtml::link ($product->link.$ItemidStr, $product->product_name);



//            die(__FILE__ .' '. __LINE__ ); ?>


    		<div class="vm-product-descr-container-<?php echo $rowsHeight[$row]['product_s_desc'] ?>">
    			<h2><?php echo $htmlLink ?></h2>
    			<?php if(!empty($rowsHeight[$row]['product_s_desc'])){
    				?>
    				<p class="product_s_desc">
						<?php // Product Short Description
						if (!empty($product->product_s_desc)) {
							echo shopFunctionsF::limitStringByWord (strip_tags($product->product_s_desc), 60, ' ...') ?>
						<?php } ?>
					</p>
				<?php  } ?>
			</div>

			<?
			$pokr = '';
			$cvet = '';
			foreach ($product->customfields as $value) {
				if ($value->virtuemart_custom_id == 22) {
					$pokr = $value->customfield_value;
				}
				if ($value->virtuemart_custom_id == 10) {
					$cvet = $value->customfield_value;
				}
			}

			?>
			<div class="parametrs"><? if(!empty($pokr)){ echo $pokr;} ?></div>
			<div class="parametrs"><? if(!empty($cvet)){ echo $cvet;} ?></div>
			<?php //echo $rowsHeight[$row]['price'] ?>
			<div class="vm3pr-<?php echo $rowsHeight[$row]['price'] ?>"> <?php
			echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?>
			<div class="clear"></div>
		</div>
		<?php //echo $rowsHeight[$row]['customs'] ?>
<!-- <div class="row">
	<div class="col-md-6 mb-3"><a href="<?php echo JRoute::_($product->link.$ItemidStr); ?>" class="btn btn-orange">Подробнее</a></div>
	<div class="col-md-6 color_fff"><a href="javascript: void(0);" class="ba-click-lightbox-form-1">Консультация</a></div>
</div> -->

<?php if($dynamic){
	echo vmJsApi::writeJS();
} ?>
<div class="vm3pr-<?php echo $rowsHeight[$row]['customfields'] ?>"> <?php
echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'rowHeights'=>$rowsHeight[$row], 'position' => array('ontop', 'addtocart'))); ?>
</div>
</div>
</div>

<?php
$nb ++;

      // Do we need to close the current row now?
if ($col == $products_per_row || $nb>$BrowseTotalProducts) { ?>
	<div class="clear"></div>
</div>
<?php
$col = 1;
$row++;
} else {
	$col ++;
}
}

if( (!empty($type) and count($products)>0) or (count($viewData['products'])>1 and count($products)>0) ){
        // Do we need a final closing row tag?
        //if ($col != 1) {
	?>
	<div class="clear"></div>
</div>
<?php
    // }
}
}

/*if(vRequest::getInt('dynamic')){
	echo vmJsApi::writeJS();
}*/ ?>
