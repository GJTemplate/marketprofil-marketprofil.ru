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

$product = $viewData['product'];
$position = $viewData['position'];
$customTitle = isset($viewData['customTitle'])? $viewData['customTitle']: false;;
if(isset($viewData['class'])){
	$class = $viewData['class'];
} else {
	$class = 'product-field';
}

if (!empty($product->customfieldsSorted[$position])) {
	if ($position == 'related_categories') {
		$class4 = 'owl-carousel'; 
	}

	else{
		$class4 = '';	
	}
	?>
	<div class="<?php echo $class?> <?=$class4;?>">
		<?php
		if($customTitle and isset($product->customfieldsSorted[$position][0])){
			$field = $product->customfieldsSorted[$position][0]; ?>
<!-- 		<div class="product-fields-title-wrapper"><span class="product-fields-title"><?php echo vmText::_ ($field->custom_title) ?></span>
			<?php if ($field->custom_tip) {
				echo JHtml::tooltip (vmText::_($field->custom_tip), vmText::_ ($field->custom_title), 'tooltip.png');
			} ?>
			</div> --> <?php
		}
		$custom_title = null;
		foreach ($product->customfieldsSorted[$position] as $field) {
			if ( $field->is_hidden || empty($field->display)) continue; //OSP http://forum.virtuemart.net/index.php?topic=99320.0
			if ($field->field_type == 'R') {
				$class5 = 'col-md-5th'; 
			}

			else{
				$class5 = '';	
			}
		?><div class="product-field product-field-type-<?php echo $field->field_type; ?> <?=$class5;?>">
			<?php if (!$customTitle and $field->custom_title != $custom_title and $field->show_title) { ?>
				<!-- 	<span class="product-fields-title-wrapper"><span class="product-fields-title"><?php echo vmText::_ ($field->custom_title) ?></span> -->
				<?php if ($field->custom_tip) {
					echo JHtml::tooltip (vmText::_($field->custom_tip), vmText::_ ($field->custom_title), 'tooltip.png');
				} ?></span>
			<?php }
			if (!empty($field->display)){
				$it = explode("|", $field->customfield_value);
				?>
				<div class="product-field-display">
					<div class="it_color">
						<div class="back_color" data-url='/images/<?=$it[1]?>' style="background: url('/images/<?=$it[1]?>');"></div>
						<div><?=$it[0]?></div>
					</div>
				</div>
				<?php
			}
			if (!empty($field->custom_desc)){
				?><div class="product-field-desc"><?php echo vmText::_($field->custom_desc) ?></div> <?php
			}
			?>
		</div>
		<?php
		$custom_title = $field->custom_title;
	} ?>
	<div class="clear"></div>
</div>
<?php
} ?>