<?php // no direct access
defined ('_JEXEC') or die('Restricted access');
// add javascript for price and cart, need even for quantity buttons, so we need it almost anywhere
vmJsApi::jPrice();


$col = 1;
$pwidth = ' width' . floor (100 / $products_per_row);
if ($products_per_row > 1) {
	$float = "floatleft";
} else {
	$float = "center";
}
?>
<div class="vmgroup<?php echo $params->get ('moduleclass_sfx') ?> row">

	<?php if ($headerText) { ?>
		<div class="vmheader"><?php echo $headerText ?></div>
		<?php
	}
	if ($display_style == "div") {
		?>

			<?php foreach ($products as $product) { ?>
			<div class="col-lg-4 product-container <?php echo $pwidth ?> <?php echo $float ?>">
		<? 			$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
		

			<a href="<?=$url?>" class="item" title="<?= $product->product_name; ?>">
				<div class="img-block">
					<div class="img lazy" style="background-image: url('<?=$product->images[0]->file_url?>');"></div>
				</div>
				<div class="name-block">
					<div class="new_and_hit_text">new!</div>
					<div class="section_name"><?= $product->categoryItem[0]['category_name']?></div>
					<div class="name"><?= $product->product_name; ?></div>
				</div>
			</a>

			</div>
			<?php
			if ($col == $products_per_row && $products_per_row && $col < $totalProd) {
				//echo "	</div><div style='clear:both;'>";
				$col = 1;
			} else {
				$col++;
			}
		} ?>
	
		<br style='clear:both;'/>

		<?php
	} else {
		$last = count ($products) - 1;
		?>

		<ul class="vmproduct<?php echo $params->get ('moduleclass_sfx'); ?> productdetails">
			<?php foreach ($products as $product) : ?>
				<li class="product-container <?php echo $pwidth ?> <?php echo $float ?> ">
					<?php
					if (!empty($product->images[0])) {
						$image = $product->images[0]->displayMediaThumb ('class="featuredProductImage"', FALSE);
					} else {
						$image = '';
					}
					echo JHTML::_ ('link', JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id), $image, array('title' => $product->product_name));
					echo '<div class="clear"></div>';
					$url = JRoute::_ ('index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' .$product->virtuemart_category_id); ?>
					<a href="<?php echo $url ?>"><?php echo $product->product_name ?></a>        <?php    echo '<div class="clear"></div>';
					echo '<div class="productdetails">';
				// $product->prices is not set when show_prices in config is unchecked
					if ($show_price and  isset($product->prices)) {

						echo '<div class="product-price">'.$currency->createPriceDiv ('salesPrice', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
						if ($product->prices['salesPriceWithDiscount'] > 0) {
							echo $currency->createPriceDiv ('salesPriceWithDiscount', '', $product->prices, FALSE, FALSE, 1.0, TRUE);
						}
						echo '</div>';

					}
					if ($show_addtocart) {
						echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'position' => array('ontop', 'addtocart')));
					}
					echo '</div>';
					?>
				</li>
				<?php
				if ($col == $products_per_row && $products_per_row && $last) {
					echo '
					</ul><div class="clear"></div>
					<ul  class="vmproduct' . $params->get ('moduleclass_sfx') . ' productdetails">';
					$col = 1;
				} else {
					$col++;
				}
				$last--;
			endforeach; ?>
		</ul>
		<div class="clear"></div>

		<?php
	}
	if ($footerText) : ?>
		<div class="vmfooter<?php echo $params->get ('moduleclass_sfx') ?>">
			<?php echo $footerText ?>
		</div>
	<?php endif; ?>
</div>