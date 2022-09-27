<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
include_once(__DIR__ . '../../settings_search.php');
// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

if ($width)
{
	$moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
	$css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
	JFactory::getDocument()->addStyleDeclaration($css);
	$width = ' size="' . $width . '"';
}
else
{
	$width = '';
}
?>
<div class="tck-search search<?php echo $moduleclass_sfx; ?>">
	<form action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-inline">
		<?php
			$output = '';
			if (TCK_SEARCH_SHOW_LABEL == 1) $output .= '<label for="mod-search-searchword' . $module->id . '" class="tck-search-label">' . $label . '</label> ';
			$searchplaceholder = '';
			if (TCK_SEARCH_PLACEHOLDER == 1) $searchplaceholder = 'placeholder="' . $text . '"';
			$output .= '<input name="searchword" id="mod-search-searchword' . $module->id . '" maxlength="' . $maxlength . '"  class="inputbox search-query input-medium tck-search-field" type="search"' . $width;
			$output .= ' ' . $searchplaceholder . ' />';

			$searchicon = (TCK_SEARCH_SHOW_ICON ? '<span class="' . TCK_SEARCH_ICON . '"></span> ' : '');
			if ($button) :
				if ($imagebutton) :
					$btn_output = '<input type="image" alt="' . $button_text . '" class="button tck-search-button" src="' . $img . '" onclick="this.form.searchword.focus();"/>';
				else :
					$btn_output = '<button class="' . TCK_SEARCH_BUTTON_CLASS . ' tck-search-button" onclick="this.form.searchword.focus();">' . $searchicon . $button_text . '</button>';
				endif;

				switch ($button_pos) :
					case 'top' :
						$output = $btn_output . '<br />' . $output;
						break;

					case 'bottom' :
						$output .= '<br />' . $btn_output;
						break;

					case 'right' :
						$output .= $btn_output;
						break;

					case 'left' :
					default :
						$output = $btn_output . $output;
						break;
				endswitch;
			endif;

			echo $output;
		?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
