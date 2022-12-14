<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

?>
<dd class="createdby tck-article-detail-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
	<?php if (TCK_ARTICLE_DETAILS_SHOW_ICONS) : ?>
		<span class="tck-article-detail-icon <?php echo TCK_ARTICLE_DETAILS_ICON_AUTHOR ?>" aria-hidden="true"></span>
	<?php endif; ?>
	<?php $author = ($displayData['item']->created_by_alias ?: $displayData['item']->author); ?>
	<?php $author = '<span itemprop="name">' . $author . '</span>'; ?>
	<?php if (TCK_ARTICLE_DETAILS_SHOW_LABELS) : ?>
		<?php if (!empty($displayData['item']->contact_link ) && $displayData['params']->get('link_author') == true) : ?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', JHtml::_('link', $displayData['item']->contact_link, $author, array('itemprop' => 'url'))); ?>
		<?php else : ?>
			<?php echo JText::sprintf('COM_CONTENT_WRITTEN_BY', $author); ?>
		<?php endif; ?>
	<?php else : ?>
		<?php if (!empty($displayData['item']->contact_link ) && $displayData['params']->get('link_author') == true) : ?>
			<?php echo JHtml::_('link', $displayData['item']->contact_link, $author, array('itemprop' => 'url')); ?>
		<?php else : ?>
			<?php echo $author; ?>
		<?php endif; ?>
	<?php endif; ?>
</dd>
