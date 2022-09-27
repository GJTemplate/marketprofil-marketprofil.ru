<?php
/**
 *
 * Show the products in a category
 *
 * @package    VirtueMart
 * @subpackage
 * @author RolandD
 * @author Max Milbers
 * @todo add pagination
 * @link https://virtuemart.net
 * @copyright Copyright (c) 2004 - 2010 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * VirtueMart is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * @version $Id: default.php 10307 2020-04-29 08:31:27Z Milbo $
 */

defined ('_JEXEC') or die('Restricted access');

if (vRequest::getInt('dynamic',false) and vRequest::getInt('virtuemart_product_id',false)) {
    if (!empty($this->products)) {
        if($this->fallback){
            $p = $this->products;
            $this->products = array();
            $this->products[0] = $p;
            vmdebug('Refallback');
        }

        echo shopFunctionsF::renderVmSubLayout($this->productsLayout,array('products'=>$this->products,'currency'=>$this->currency,'products_per_row'=>$this->perRow,'showRating'=>$this->showRating));

    }

    return ;
}
?> <div class="category-view"> <?php
    $js = "
jQuery(document).ready(function () {
	jQuery('.orderlistcontainer').hover(
	function() { jQuery(this).find('.orderlist').stop().show()},
	function() { jQuery(this).find('.orderlist').stop().hide()}
	)
	});
	";
    vmJsApi::addJScript('vm-hover',$js);

    if (!empty($this->category->category_name)) { ?>
        <h1><?php echo vmText::_($this->category->category_name); ?></h1>
    <?php }
    if ($this->show_store_desc and !empty($this->vendor->vendor_store_desc)) { ?>
        <div class="vendor-store-desc">
            <?php echo $this->vendor->vendor_store_desc; ?>
        </div>
    <?php }

    if (!empty($this->showcategory_desc) and empty($this->keyword)){

        if(!empty($this->manu_descr)) {
            ?>
            <div class="manufacturer-description">
                <?php echo $this->manu_descr; ?>
            </div>
        <?php }
    }
    ?>
    <? if (!empty($this->category->params_30)) { ?>
        <div class="row">
        <div class="col-md-9"><?= htmlspecialchars_decode($this->category->params_30) ?></div>
        <div class="col-md-3"><a href="#" class="zakaz-element ba-click-lightbox-form-3"><img src="/images/raschet-w.svg"
                                                                                              title="заказать расчет!">
                заказать расчет!</a><a href="/kalkulyatory" class="zakaz-element zakaz-element-calc"><img
                        src="/images/calc-w.svg" title="Калькуляторы"> Калькулятор расчета</a></div></div><? } ?>
    <?
    // Show child categories
    if ($this->showcategory and empty($this->keyword)) {
        if (!empty($this->category->haschildren)) {
            echo ShopFunctionsF::renderVmSubLayout('categories',array('categories'=>$this->category->children, 'categories_per_row'=>$this->categories_per_row));
        }
    }

    if (!empty($this->products) or ($this->showsearch or $this->keyword !== false)) {
        ?>
        <div class="browse-view row">

            <div class="col-md-12">
                <?php

                if ($this->showsearch or $this->keyword !== false) {
                    //id taken in the view.html.php could be modified
                    $category_id  = vRequest::getInt ('virtuemart_category_id', 0); ?>

                    <!--BEGIN Search Box -->
                    <!-- 	<div class="virtuemart_search">
		<form action="<?php echo JRoute::_ ('index.php?option=com_virtuemart&view=category&limitstart=0', FALSE); ?>" method="get">
			<?php if(!empty($this->searchCustomList)) { ?>
			<div class="vm-search-custom-list">
				<?php echo $this->searchCustomList ?>
			</div>
			<?php } ?>

			<?php if(!empty($this->searchCustomValuesAr)) { ?>
			<div class="vm-search-custom-values">
				<?php
                        echo ShopFunctionsF::renderVmSubLayoutAsGrid(
                            'searchcustomvalues',
                            array (
                                'searchcustomvalues' => $this->searchCustomValuesAr,
                                'options' => array (
                                    'items_per_row' => array (
                                        'xs' => 2,
                                        'sm' => 2,
                                        'md' => 2,
                                        'lg' => 2,
                                        'xl' => 2,
                                    ),
                                ),
                            )
                        );
                        ?>
			</div>
			<?php } ?>
			<div class="vm-search-custom-search-input">
				<input name="keyword" class="inputbox" type="text" size="40" value="<?php echo $this->keyword ?>"/>
				<input type="submit" value="<?php echo vmText::_ ('COM_VIRTUEMART_SEARCH') ?>" class="button" onclick="this.form.keyword.focus();"/>
				<?php //echo VmHtml::checkbox ('searchAllCats', (int)$this->searchAllCats, 1, 0, 'class="changeSendForm"'); ?>
				<span class="vm-search-descr"> <?php echo vmText::_('COM_VM_SEARCH_DESC') ?></span>
			</div>
		-->
                    <!-- input type="hidden" name="showsearch" value="true"/ -->
                    <!--<input type="hidden" name="view" value="category"/>
			<input type="hidden" name="option" value="com_virtuemart"/>
			<input type="hidden" name="virtuemart_category_id" value="<?php echo $category_id; ?>"/>
			<input type="hidden" name="Itemid" value="<?php echo $this->Itemid; ?>"/>
		</form>
	</div> -->
                    <!-- End Search Box -->
                    <?php
                    /*if($this->keyword !== false){
                        ?><h3><?php echo vmText::sprintf('COM_VM_SEARCH_KEYWORD_FOR', $this->keyword); ?></h3><?php
                    }*/
                    $j = 'jQuery(document).ready(function() {

		jQuery(".changeSendForm")
		.off("change",Virtuemart.sendCurrForm)
		.on("change",Virtuemart.sendCurrForm);
	})';

                    vmJsApi::addJScript('sendFormChange',$j);
                } ?>
                {modal content="mycontent" title="Фильтр"}<span class="filtrs_btn"><i class="fa fa-filter" aria-hidden="true"></i> Фильтр товаров</span>{/modal}
                <?php // Show child categories

                if(!empty($this->orderByList)) { ?>
                    <div class="orderby-displaynumber">
                        <div class="floatleft vm-order-list">
                            <div class="orderlistcontainer"><div class="title">Сортировка:</div>
                                <?
                                if(stristr($_SERVER['REQUEST_URI'], '/dirDesc?keyword=') === FALSE) {
                                    ?>
                                    <a href="<?= str_replace(array("/dirDesc?keyword=", "&orderby=product_price&order=DESC", "&tmpl=component"), "", $_SERVER['REQUEST_URI'])?>" class="active">Дешевые</a>
                                    <a href="<?= str_replace(array("/dirDesc?keyword=", "&orderby=product_price&order=DESC", "&tmpl=component"), "", $_SERVER['REQUEST_URI'])?>/dirDesc?keyword=">Дорогие</a>
                                    <?
                                }
                                else{
                                    ?>
                                    <a href="<?= str_replace(array("/dirDesc?keyword=", "&orderby=product_price&order=DESC", "&tmpl=component"), "", $_SERVER['REQUEST_URI'])?>" >Дешевые</a>
                                    <a href="<?= str_replace(array("/dirDesc?keyword=", "&orderby=product_price&order=DESC", "&tmpl=component"), "", $_SERVER['REQUEST_URI'])?>/dirDesc?keyword=" class="active">Дорогие</a>
                                    <?
                                }
                                ?>

                            </div>

                            <?php //echo $this->orderByList['manufacturer']; ?>
                        </div>
                        <!-- 	<div class="vm-pagination vm-pagination-top">
		<?php echo $this->vmPagination->getPagesLinks (); ?>
		<span class="vm-page-counter"><?php echo $this->vmPagination->getPagesCounter (); ?></span>
	</div>
	<div class="floatright display-number"><?php echo $this->vmPagination->getResultsCounter ();?><br/><?php echo $this->vmPagination->getLimitBox ($this->category->limit_list_step); ?></div>
 -->

                        <div class="clear"></div>
                    </div>  <!-- end of orderby-displaynumber -->
                <?php } ?>

                <?php
                if (!empty($this->products)) {
                    //revert of the fallback in the view.html.php, will be removed vm3.2
                    if($this->fallback){
                        $p = $this->products;
                        $this->products = array();
                        $this->products[0] = $p;
                        vmdebug('Refallback');
                    }




                    echo shopFunctionsF::renderVmSubLayout(
                        $this->productsLayout,
                        array(
                            'products' => $this->products,
                            'currency' => $this->currency,
                            'products_per_row' => $this->perRow,
                            'showRating' => $this->showRating
                        )
                    );

                    if(!empty($this->orderByList)) { ?>
                        <div class="vm-pagination vm-pagination-bottom"><?php echo $this->vmPagination->getPagesLinks (); ?><span class="vm-page-counter"><?php echo $this->vmPagination->getPagesCounter (); ?></span></div>
                    <?php }
                } elseif ($this->keyword !== false) {
                    echo vmText::_ ('COM_VIRTUEMART_NO_RESULT') . ($this->keyword ? ' : (' . $this->keyword . ')' : '');
                }
                ?>

            </div>
        </div>
    <?php } ?>
</div>
<?	if(!empty($this->category)) {
    ?>
    <div class="category_description">
        <?php echo $this->category->category_description; ?>
    </div>


<?php }
?>
<div class="row">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <? $active_tab = 1; ?>
        <?if(!empty($this->category->params_1)){ ?><li class="nav-item"><a class="nav-link active" id="tabs1-tab" data-toggle="tab" href="#tabs1" role="tab" aria-controls="tabs1" aria-selected="true">Покрытия</a></li><? }?>
        <?if(!empty($this->category->params_2)){ ?><li class="nav-item"><a class="nav-link" id="tabs2-tab" data-toggle="tab" href="#tabs2" role="tab" aria-controls="tabs2" aria-selected="false">Комплектующие</a></li><? }?>
        <?if(!empty($this->category->params_29)){ ?><li class="nav-item"><a class="nav-link" id="tabs3-tab" data-toggle="tab" href="#tabs3" role="tab" aria-controls="tabs3" aria-selected="false">Полезная информация</a></li><? }?>
        <?if(!empty($this->category->params_3)){ ?><li class="nav-item"><a class="nav-link" id="tabs4-tab" data-toggle="tab" href="#tabs4" role="tab" aria-controls="tabs4" aria-selected="false">Инструкции</a></li><? }?>
        <?if(!empty($this->category->params_11)){ ?><li class="nav-item"><a class="nav-link" id="tabs5-tab" data-toggle="tab" href="#tabs5" role="tab" aria-controls="tabs5" aria-selected="false">Чертеж</a></li><? }?>
        <?if(!empty($this->category->params_13)){ ?><li class="nav-item"><a class="nav-link" id="tabs6-tab" data-toggle="tab" href="#tabs6" role="tab" aria-controls="tabs6" aria-selected="false">Галерея</a></li><? }?>
        <?if(!empty($this->category->params_12)){ ?><li class="nav-item"><a class="nav-link" id="tabs7-tab" data-toggle="tab" href="#tabs7" role="tab" aria-controls="tabs7" aria-selected="false">FAQ</a></li><? }?>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade <?= $class_active;?>" id="tabs1" role="tabpanel" aria-labelledby="tabs1-tab">
            <?
            if (!empty($this->category->params_1)) {

                $db = JFactory::getDbo();

                $query = $db->getQuery(true);
                $query->select('*');
                $query->from('#__content');
                $query->where($db->quoteName('id') . ' = ' . $this->category->params_1);

                $db->setQuery((string)$query);
                $res = $db->loadObjectList();

                foreach($res as $r){

                    $name = $r->title;
                    $intro = $r->introtext;
                    $img = json_decode($r->images);
                }
            }
            ?>
            <div class="row line_ccc">
                <a href="#" class="name_pokritie"><?=$name?></a>
            </div>

        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs2" role="tabpanel" aria-labelledby="tabs2-tab">
            <?
            $id_komp = explode("*", $this->category->params_2);
            $productModel = VmModel::getModel('Product');
            foreach ($id_komp as $value) {
                $product = $productModel->getProduct($value);
                ?>
                <div class="item_komplekt col-md-3"><?=	 $product->product_name;?></div>
                <?
                //echo $product->virtuemart_media_id[0];

            }
            ?>
        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs3" role="tabpanel" aria-labelledby="tabs3-tab">
            <?php echo $this->category->category_description; ?>
        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs4" role="tabpanel" aria-labelledby="tabs4-tab">
            <? if(!empty($this->category->params_3)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_3;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_3;?></a></div><? } ?>
            <? if(!empty($this->category->params_4)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_4;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_4;?></a></div><? } ?>
            <? if(!empty($this->category->params_5)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_5;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_5;?></a></div><? } ?>
            <? if(!empty($this->category->params_6)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_6;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_6;?></a></div><? } ?>
            <? if(!empty($this->category->params_7)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_7;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_7;?></a></div><? } ?>
            <? if(!empty($this->category->params_8)){ ?><div class="pdf"><a href="/upload/<?=$this->category->params_8;?>.pdf"><img class="float-left mr-3" src="/images/pdf.png"><?=$this->category->params_8;?></a></div><? } ?>
        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs5" role="tabpanel" aria-labelledby="tabs5-tab">
            <img src="<?=$this->category->params_11;?>">
        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs6" role="tabpanel" aria-labelledby="tabs6-tab">
            <? $title = explode(";", $this->category->params_27); ?>
            <div class="row">
                <?if(!empty($this->category->params_13)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_13?>"><img title="<?=$title[0];?>" alt="<?=$title[0];?> фото" src="/images/foto-tab/<?=$this->category->params_13?>"></a></div><? } ?>
                <?if(!empty($this->category->params_14)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_14?>"><img title="<?=$title[1];?>" alt="<?=$title[1];?> фото" src="/images/foto-tab/<?=$this->category->params_14?>"></a></div><? } ?>
                <?if(!empty($this->category->params_15)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_15?>"><img title="<?=$title[2];?>" alt="<?=$title[2];?> фото" src="/images/foto-tab/<?=$this->category->params_15?>"></a></div><? } ?>
                <?if(!empty($this->category->params_16)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_16?>"><img title="<?=$title[3];?>" alt="<?=$title[3];?> фото" src="/images/foto-tab/<?=$this->category->params_16?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_17)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_17?>"><img title="<?=$title[4];?>" alt="<?=$title[4];?> фото" src="/images/foto-tab/<?=$this->category->params_17?>"></a></div><? } ?>
                <?if(!empty($this->category->params_18)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_18?>"><img title="<?=$title[5];?>" alt="<?=$title[5];?> фото" src="/images/foto-tab/<?=$this->category->params_18?>"></a></div><? } ?>
                <?if(!empty($this->category->params_19)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_19?>"><img title="<?=$title[6];?>" alt="<?=$title[6];?> фото" src="/images/foto-tab/<?=$this->category->params_19?>"></a></div><? } ?>
                <?if(!empty($this->category->params_20)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_20?>"><img title="<?=$title[7];?>" alt="<?=$title[7];?> фото" src="/images/foto-tab/<?=$this->category->params_20?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_21)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_21?>"><img title="<?=$title[8];?>" alt="<?=$title[8];?> фото" src="/images/foto-tab/<?=$this->category->params_21?>"></a></div><? } ?>
                <?if(!empty($this->category->params_22)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_22?>"><img title="<?=$title[9];?>" alt="<?=$title[9];?> фото" src="/images/foto-tab/<?=$this->category->params_22?>"></a></div><? } ?>
                <?if(!empty($this->category->params_23)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_23?>"><img title="<?=$title[10];?>" alt="<?=$title[10];?> фото" src="/images/foto-tab/<?=$this->category->params_23?>"></a></div><? } ?>
                <?if(!empty($this->category->params_24)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_24?>"><img title="<?=$title[11];?>" alt="<?=$title[11];?> фото" src="/images/foto-tab/<?=$this->category->params_24?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_25)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_25?>"><img title="<?=$title[12];?>" alt="<?=$title[12];?> фото" src="/images/foto-tab/<?=$this->category->params_25?>"></a></div><? } ?>
                <?if(!empty($this->category->params_31)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_31?>"><img title="<?=$title[13];?>" alt="<?=$title[13];?> фото" src="/images/foto-tab/<?=$this->category->params_31?>"></a></div><? } ?>
                <?if(!empty($this->category->params_32)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_32?>"><img title="<?=$title[14];?>" alt="<?=$title[14];?> фото" src="/images/foto-tab/<?=$this->category->params_32?>"></a></div><? } ?>
                <?if(!empty($this->category->params_33)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_33?>"><img title="<?=$title[15];?>" alt="<?=$title[15];?> фото" src="/images/foto-tab/<?=$this->category->params_33?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_34)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_34?>"><img title="<?=$title[16];?>" alt="<?=$title[16];?> фото" src="/images/foto-tab/<?=$this->category->params_34?>"></a></div><? } ?>
                <?if(!empty($this->category->params_35)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_35?>"><img title="<?=$title[17];?>" alt="<?=$title[17];?> фото" src="/images/foto-tab/<?=$this->category->params_35?>"></a></div><? } ?>
                <?if(!empty($this->category->params_36)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_36?>"><img title="<?=$title[18];?>" alt="<?=$title[18];?> фото" src="/images/foto-tab/<?=$this->category->params_36?>"></a></div><? } ?>
                <?if(!empty($this->category->params_37)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_37?>"><img title="<?=$title[19];?>" alt="<?=$title[19];?> фото" src="/images/foto-tab/<?=$this->category->params_37?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_38)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_38?>"><img title="<?=$title[20];?>" alt="<?=$title[20];?> фото" src="/images/foto-tab/<?=$this->category->params_38?>"></a></div><? } ?>
                <?if(!empty($this->category->params_39)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_39?>"><img title="<?=$title[21];?>" alt="<?=$title[21];?> фото" src="/images/foto-tab/<?=$this->category->params_39?>"></a></div><? } ?>
                <?if(!empty($this->category->params_40)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_40?>"><img title="<?=$title[22];?>" alt="<?=$title[22];?> фото" src="/images/foto-tab/<?=$this->category->params_40?>"></a></div><? } ?>
                <?if(!empty($this->category->params_41)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_41?>"><img title="<?=$title[23];?>" alt="<?=$title[23];?> фото" src="/images/foto-tab/<?=$this->category->params_41?>"></a></div><? } ?>
            </div>
            <div class="row">
                <?if(!empty($this->category->params_42)){ ?><div class="item_gal col-md-3 float-left"><a class="fancybox" data-fancybox="gallery" href="/images/foto-tab/<?=$this->category->params_42?>"><img title="<?=$title[24];?>" alt="<?=$title[24];?> фото" src="/images/foto-tab/<?=$this->category->params_42?>"></a></div><? } ?>
            </div>
        </div>

        <div class="tab-pane fade <?= $class_active;?>" id="tabs7" role="tabpanel" aria-labelledby="tabs7-tab">
            <?=$this->category->params_12;?>
        </div>
    </div>
</div>
<?
if(VmConfig::get ('ajax_category', false)){
    $j = "Virtuemart.container = jQuery('.category-view');
	Virtuemart.containerSelector = '.category-view';";

    /*$j = "Virtuemart.container = jQuery('.main');
    Virtuemart.containerSelector = '.main';";*/

    vmJsApi::addJScript('ajax_category',$j);
    vmJsApi::jDynUpdate();
}
?>
<!-- end browse-view -->
