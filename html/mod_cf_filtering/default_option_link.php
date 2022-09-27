<?php
/**
 * @package     customfilters
 * @subpackage  mod_cf_filtering
 * @copyright   Copyright (C) 2012-2020 breakdesigns.net . All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Создание ссылки для пункта фильтра
 */

/**
 * @var CfFilter;
 */
$filter = $filter;

if (empty($option_url)) {
    $option_url = \JRoute::_( $urlHandler->getURL($filter, $option->id, $option->type ));
}


JLoader::register( 'seoTools' , JPATH_ROOT . '/components/com_customfilters/include/seoTools.php');
$seoTools = new seoTools();
$sefUrlObj = $seoTools->getSefUrl( $option_url );

$class_no_ajax = null ;
if ( stripos( $sefUrlObj->sef_url , 'catalog/' ) ) $class_no_ajax = 'cf_no_ajax' ;



if(empty($key)) {
    $key = '';
}
$opt_class = !empty($opt_class) ? $opt_class : '';
$display_key = $key.'_'.$module->id;
$element_id = $display_key . '_elid' . $option->id;
?>
<span class="cf_link">
    <a href="<?= $sefUrlObj->sef_url ?>"
       id="<?php echo $element_id, '_a' ?>"
       class="cf_option <?= $class_no_ajax ?> <?= $option->selected ? 'cf_sel_opt' : '', ' ', $opt_class ?>"
       data-module-id="<?php echo $module->id ?>"
        <?= $params->get('indexfltrs_by_search_engines', 0) == false ? 'rel="nofollow"' : '' ?>>
        <?php echo $option->label ?>
    </a>
</span>
<?php
if($filter->getCounter() && isset($option->counter)):?>
    <span class="cf_flt_counter">(<?php echo $option->counter?>)</span>
<?php endif;?>
