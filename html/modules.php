<?php
/**
 * @name		Template Creator CK
 * @copyright	Copyright (C) since 2011. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Cedric Keiflin - http://www.template-creator.com - http://www.joomlack.fr
 */

defined('_JEXEC') or die;

/*
 * htmlck (divs and font header tags and icon option)
 * With the new advanced parameter it does the same as the html5 chrome
 */
function modChrome_htmlck($module, &$params, &$attribs)
{
	$moduleTag      = $params->get('module_tag', 'div');
	$headerTag      = htmlspecialchars($params->get('header_tag', 'h3'));
	$bootstrapSize  = (int) $params->get('bootstrap_size', 0);
	$moduleClass    = $bootstrapSize != 0 ? ' span' . $bootstrapSize : '';

	// Temporarily store header class in variable
	$headerClass    = $params->get('header_class');
	$headerClass    = ($headerClass) ? ' class="' . htmlspecialchars($headerClass) . ' tck-module-title"' : ' class="tck-module-title"';

	// Icon settings
	$iconpos = (isset($attribs['iconpos']) && $attribs['iconpos']) ? $attribs['iconpos'] : '';
	$iconsize = (isset($attribs['iconsize']) && $attribs['iconsize']) ? $attribs['iconsize'] : '';
	$iconvpos = (isset($attribs['iconvpos']) && $attribs['iconvpos']) ? 'vertical-align:' . $attribs['iconvpos'] . ';' : '';
	$iconposstyle = ($iconpos == 'top' || $iconpos == 'bottom') ? 'display:block;' : 'display:inline-block;';
	$fackstyle = ($iconposstyle != '') ? 'style="' . $iconposstyle . '"' : '';
	$fastyle = ($iconvpos != '') ? 'style="' . $iconvpos . '"' : '';

	$icon = (isset($attribs['icon']) && $attribs['icon']) ? '<span class="fack ' . $iconsize . '" ' . $fackstyle . '><span class="' . $attribs['icon'] . '" ' . $fastyle . '></span></span>' : '';
	$title = (bool) $module->showtitle ? $module->title : '';
	

	if (!empty ($module->content)) : ?>
		<<?php echo $moduleTag; ?> class="tck-module moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')) . $moduleClass; ?>">
			<?php if ((bool) $module->showtitle || $icon) : ?>
				<<?php echo $headerTag . $headerClass . '>' . (($iconpos == 'left' || $iconpos == 'top') ? $icon : '') . $title . (($iconpos == 'right' || $iconpos == 'bottom') ? $icon : ''); ?></<?php echo $headerTag; ?>>
			<?php endif; ?>
				<div class="tck-module-text">
					<?php echo $module->content; ?>
				</div>
		</<?php echo $moduleTag; ?>>
	<?php endif;
}
