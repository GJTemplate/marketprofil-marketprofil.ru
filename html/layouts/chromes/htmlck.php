<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.cassiopeia
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

$module  = $displayData['module'];
$params  = $displayData['params'];
$attribs = $displayData['attribs'];

if ($module->content === null || $module->content === '')
{
	return;
}

$moduleTag              = $params->get('module_tag', 'div');
$moduleAttribs          = [];
$moduleAttribs['class'] = $module->position . ' ' . htmlspecialchars($params->get('moduleclass_sfx'), ENT_QUOTES, 'UTF-8') . ' tck-module';
$headerTag              = htmlspecialchars($params->get('header_tag', 'h4'), ENT_QUOTES, 'UTF-8');
$headerClass            = htmlspecialchars($params->get('header_class', ''), ENT_QUOTES, 'UTF-8');
$headerAttribs          = [];
$headerAttribs['class'] = $headerClass;

if ($module->showtitle) :
	$headerAttribs['class'] .= ' tck-module-title';
	$moduleAttribs['aria-label'] = htmlspecialchars($module->title);
else:
	$moduleAttribs['aria-label'] = htmlspecialchars($module->title);
endif;

// tck edition
$tckedition = JFactory::getApplication()->input->get('tckedition', 0, 'int');
if ($tckedition === 1) {
	$moduleAttribs['data-id'] = $module->id;
	$moduleAttribs['data-type'] = $module->module;
}

// title split
$search = array('[[', ']]');
$replace = array('<span class="tck-title-split">', '</span>');
$title = str_replace($search, $replace, $module->title);

// Icon settings
$iconpos = (isset($attribs['iconpos']) && $attribs['iconpos']) ? $attribs['iconpos'] : '';
$iconsize = (isset($attribs['iconsize']) && $attribs['iconsize']) ? $attribs['iconsize'] : '';
$iconvpos = (isset($attribs['iconvpos']) && $attribs['iconvpos']) ? 'vertical-align:' . $attribs['iconvpos'] . ';' : '';
$iconposstyle = ($iconpos == 'top' || $iconpos == 'bottom') ? 'display:block;' : 'display:inline-block;';
$fackstyle = ($iconposstyle != '') ? 'style="' . $iconposstyle . '"' : '';
$fastyle = ($iconvpos != '') ? 'style="' . $iconvpos . '"' : '';

$icon = (isset($attribs['icon']) && $attribs['icon']) ? '<span class="fack ' . $iconsize . '" ' . $fackstyle . '><span class="' . $attribs['icon'] . '" ' . $fastyle . '></span></span>' : '';

$header = '<' . $headerTag . ' ' . ArrayHelper::toString($headerAttribs) . '>' . (($iconpos == 'left' || $iconpos == 'top') ? $icon : '') . ($module->showtitle ? $title : '') . '</' . $headerTag . '>';
// var_dump($header);

?>
<<?php echo $moduleTag; ?> <?php echo ArrayHelper::toString($moduleAttribs); ?>>
	<?php if ($module->showtitle || $icon) : ?>
		<?php echo $header; ?>
	<?php endif; ?>
	<div class="tck-module-text">
		<?php echo $module->content; ?>
	</div>
</<?php echo $moduleTag; ?>>
