<?php
/**
 * @package		customfilters
 * @subpackage	mod_cf_filtering
 * @copyright	Copyright (C) 2012-2020 breakdesigns.net . All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC')or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('behavior.framework');

if(count($filters) == 0) {
    return false;
}

$document = Factory::getDocument();
$direction = $document->getDirection();
$jinput = Factory::getApplication()->input;
$urlHandler = new UrlHandler($module, $selected_filters);
$view = $jinput->get('view', 'products', 'cmd');
$component = $jinput->get('option', '', 'cmd');
$menu_params = \cftools::getMenuparams();
$Itemid = $menu_params->get('cf_itemid', '');
$results_trigger = $params->get('results_trigger', 'sel');
$results_loading_mode = $params->get('results_loading_mode', 'http');
$jconfig = Factory::getConfig();
$issef = $jconfig->get('sef');
$scriptFiles = [];
$scriptProcesses = $modObj->getScriptProcesses();

require_once JPATH_BASE . '/modules/mod_cf_filtering/scriptHelper.php';
$document->addScript(JURI::root().'modules/mod_cf_filtering/assets/general.js' , ['mime' => 'text/javascript'], ['defer' => true]);
$document->addScript(JURI::root().'components/com_virtuemart/assets/js/cvfind.js', ['mime' => 'text/javascript']);
$document->addStyleSheet(JURI::root().'modules/mod_cf_filtering/assets/style.css');

/*
 * view == module is used only when the module is loaded with ajax.
 * We want only the form to be loaded with ajax requests.
 * The cf_wrapp_all of the primary module, will be used as the container of the ajax response
 */
?>

<?
if($view!='module'){?>
    {modalcontent mycontent}
    <div id="cf_wrapp_all_<?php echo $module->id ?>" class="cf_wrapp_all cf_wrapp_all<?php echo $moduleclass_sfx?>">
<?php }
?>
    <div id="cf_ajax_loader_<?php echo $module->id?>"></div>
    <form method="get" action="<?php echo Route::_('index.php?option=com_customfilters&view=products&Itemid='.$Itemid)?>"
          class="cf_form<?php echo htmlspecialchars($params->get('moduleclass_sfx'));?>" id="cf_form_<?php echo $module->id?>">

        <?php
        /**
         * @var \CfFilter $filter
         */
        foreach($filters as $key => $filter){
            $display_key = $key.'_'.$module->id;
            ?>
            <div class="cf_flt_wrapper  cf_flt_wrapper_id_<?php echo $module->id?> cf_flt_wrapper_<?php echo $direction ?>"
                 id="cf_flt_wrapper_<?php echo $display_key?>">

                <?php
                //Filter Header
                $header = $filter->getHeader();
                if(!empty($header)) {
                    $state = $filter->getExpanded() == true ? 'show' : 'hide'; ?>

                    <div class="cf_flt_header" id="cfhead_<?php echo $display_key ?>"
                         role="heading" aria-level="4" aria-controls="cf_wrapper_inner_<?php echo $display_key ?>"
                         aria-expanded="<?php echo $filter->getExpanded() ? 'true' : 'false'; ?>">
                        <div class="headexpand headexpand_<?php echo $state ?>"
                             id="headexpand_<?php echo $display_key ?>"></div>
                        <span class="cf_flt_header_text"><?php echo htmlspecialchars($filter->getHeader()); ?></span>
                    </div>

                    <?php
                    //add a script for the toggle effect
                    $scriptProcesses[] = "customFilters.createToggle('" . $display_key . "','$state');";
                } ?>

                <?php
                //Inner Markup/Options?>
                <div class="cf_wrapper_inner" id="cf_wrapper_inner_<?php echo $display_key?>">
                    <?php

                    //smart search
                    if($filter->getSmartSearch()) {
                        $list_id = 'cf_list_'.$key.'_'.$module->id;
                        $smart_input_id = 'cf_smartSearch_'.$key.'_'.$module->id;
                        $isexpanable_tree = 0;
                        if ($key == 'virtuemart_category_id' && $params->get('categories_disp_order', 'names') == 'tree' &&
                            $params->get('category_flt_tree_mode', '0') == 0 &&
                            $params->get('category_flt_parent_link', '0') == 0) {
                            $isexpanable_tree = true;
                        }
                        ?>

                        <input type="text" class="cf_smart_search" id="<?php echo $smart_input_id?>"
                               placeholder="<?php echo Text::_('MOD_CF_SEARCH');?>"  aria-label="<?php echo Text::_('MOD_CF_SEARCH');?>" maxlength="100"/><?php

                        $scriptProcesses[]="
								 var myFilter{$key} = new CfElementFilter('{$smart_input_id}', '#{$list_id} li',{
								  	module_id:{$module->id},
								  	isexpanable_tree:{$isexpanable_tree},
								  	filter_key:'{$key}'
								  });";
                    }

                    /*
                     * load the options through sub-layouts.
                     * A filter can have more than 1 display (e.g. range inputs and slider together)
                     */
                    foreach ($filter->getDisplay() as $display) {
                        $layout = array_search($display, $filter->displays);
                        require ModuleHelper::getLayoutPath('mod_cf_filtering', 'default_'.$layout);
                    }
                    ?>
                </div>
            </div>
            <?php
        }

        //reset all link
        if($params->get('disp_reset_all', 1) &&  !empty($selected_filters['selected_flt'])){
            ?>
            <a class="cf_resetAll_link" rel="nofollow" data-module-id="<?php echo $module->id?>" href="<?php echo Route::_($urlHandler->getResetUri())?>">
                <span class="cf_resetAll_label"><?php echo JText::_('MOD_CF_RESET_ALL')?></span>
            </a>
            <?php
        }?>

        <?php
        //if no category filter and category var. It means that we are in a category page and the category id should be kept
        if(empty($filters['virtuemart_category_id']) && !empty($selected_filters['selected_flt']['virtuemart_category_id'])):
            foreach($selected_filters['selected_flt']['virtuemart_category_id'] as $key=>$id){?>
                <input type="hidden" name="virtuemart_category_id[<?php echo $key?>]" value="<?php echo $id?>" />
                <?php
            }
        endif;

        //if no manufacturer filter and manufact. var. It means that we are in a manufact page and the manufact id should be kept
        if(empty($filters['virtuemart_manufacturer_id']) && !empty($selected_filters['selected_flt']['virtuemart_manufacturer_id'])):
            foreach($selected_filters['selected_flt']['virtuemart_manufacturer_id'] as $key=>$id){?>
                <input type="hidden" name="virtuemart_manufacturer_id[<?php echo $key?>]" value="<?php echo $id?>" />
                <?php
            }
        endif;

        //if the keyword search does not exist we have to add it as hidden, because it may added by the search mod
        if(empty($filters['q'])):
            $query=!empty($selected_filters['selected_flt']['q'])?$selected_filters['selected_flt']['q']:'';?>
            <input name="q" type="hidden" value="<?php echo $query;?>" />
        <?php
        endif;

        if(!$issef && $results_loading_mode!='ajax'):?>
            <input type="hidden" name="option" value="com_customfilters" />
            <input type="hidden" name="view" value="products" />

            <?php
            if($Itemid):?>
                <input type="hidden" name="Itemid" value="<?php echo $Itemid?>" />
            <?php
            endif;
        endif;

        //in case of button add some extra vars to the form
        if($results_trigger=='btn'):?>
            <br />
            <input type="submit" class="cf_apply_button btn btn-primary" id="cf_apply_button_<?php echo $module->id?>"
                   value="<?php echo JText::_('MOD_CF_APPLY');?>" />
        <?php
        endif;
        ?>

    </form>
<?php
if($view!='module'){?>
    </div>
    {/modalcontent}
<?php }

//Scripts
//load the VM scripts and styles in pages other than VM and CF when ajax is used
if($params->get('results_loading_mode','ajax')=='ajax' && $component!='com_customfilters' || $component!='com_virtuemart' || ($component=='com_virtuemart' && $view!='category')){
    \cftools::loadScriptsNstyles();
}

if (
        ($results_trigger == 'btn' || $results_loading_mode == 'ajax') &&
        ($jinput->get('view', '') != 'module' || $jinput->get('option', '') != 'com_customfilters')) {

    $scriptProcesses[] = "customFilters.assignEvents(" . $module->id . ");";
}

$styles = $modObj->getStyles();
if (!empty($styles)) {
    $document->addStyleDeclaration($styles);
}

$scriptVars = $modObj->getScriptVars();
if (!empty($scriptVars)) {
    $script_var_counter = count($scriptVars);
    $j = 1;
    $script = '
		if(typeof customFiltersProp=="undefined")customFiltersProp=new Array();
		customFiltersProp[' . $module->id . ']={';
    foreach ($scriptVars as $varName => $value) {
        $script .= "$varName:'$value'";
        if ($j < $script_var_counter) {
            $script .= ',';
        } //add a comma
        $j++;
    }
    $script .= '};';
    $document->addScriptDeclaration($script);
}

//add some script files if exist
if (($jinput->get('view', '') != 'module' && $jinput->get('option', '') == 'com_customfilters') ||
    ($jinput->get('option', '') != 'com_customfilters')) {
    foreach ($scriptFiles as $file) {
        $document->addScript($file);
    }
}

if (!empty($scriptProcesses)) {
    $script = "window.addEvent('domready',function(){";
    foreach ($scriptProcesses as $process) {
        $script .= $process;
    }
    $script .= "});";

    if ($view == 'module' && $component == 'com_customfilters') {
        echo '<script type="text/javascript">' . $script . '</script>';
    } else {
        $document->addScriptDeclaration($script);
    }
}
