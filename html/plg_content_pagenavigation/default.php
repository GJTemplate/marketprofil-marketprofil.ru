<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
include_once(__DIR__ . '/settings_pagination.php');
$lang = JFactory::getLanguage(); ?>

<ul class="pager pagenav tck-article-pagination">
<?php if ($row->prev) :
	$direction = $lang->isRtl() ? 'right' : 'left'; ?>
	<?php
	if (TCK_ARTICLE_PAGINATION_SHOW_ICONS == 1) {
		$icon = ($direction == 'left' ? TCK_ARTICLE_PAGINATION_ICON_LEFT : TCK_ARTICLE_PAGINATION_ICON_RIGHT);
		$previcon = '<span class="' . $icon . '" aria-hidden="true"></span> ';
	} else {
		$previcon = '';
	}
	?>
	<li class="previous tck-article-pagination-prev">
		<a class="hasTooltip" title="<?php echo htmlspecialchars($rows[$location-1]->title); ?>" aria-label="<?php echo JText::sprintf('JPREVIOUS_TITLE', htmlspecialchars($rows[$location-1]->title)); ?>" href="<?php echo $row->prev; ?>" rel="prev">
			<?php echo $previcon . '<span aria-hidden="true">' . $row->prev_label . '</span>'; ?>
		</a>
	</li>
<?php endif; ?>
<?php if ($row->next) :
	$direction = $lang->isRtl() ? 'left' : 'right'; ?>
	<?php
	if (TCK_ARTICLE_PAGINATION_SHOW_ICONS == 1) {
		$icon = ($direction == 'left' ? TCK_ARTICLE_PAGINATION_ICON_LEFT : TCK_ARTICLE_PAGINATION_ICON_RIGHT);
		$nexticon = ' <span class="' . $icon . '" aria-hidden="true"></span>';
	} else {
		$nexticon = '';
	}
	?>
	<li class="next tck-article-pagination-next">
		<a class="hasTooltip" title="<?php echo htmlspecialchars($rows[$location+1]->title); ?>" aria-label="<?php echo JText::sprintf('JNEXT_TITLE', htmlspecialchars($rows[$location+1]->title)); ?>" href="<?php echo $row->next; ?>" rel="next">
			<?php echo '<span aria-hidden="true">' . $row->next_label . '</span>' . $nexticon; ?>
		</a>
	</li>
<?php endif; ?>
</ul>
