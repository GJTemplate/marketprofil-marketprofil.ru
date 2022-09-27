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
			<dd class="create tck-article-detail-createdate">
					<?php if (TCK_ARTICLE_DETAILS_SHOW_ICONS) : ?>
						<span class="tck-article-detail-icon <?php echo TCK_ARTICLE_DETAILS_ICON_DATE ?>" aria-hidden="true"></span>
					<?php endif; ?>
					<time datetime="<?php echo JHtml::_('date', $displayData['item']->created, 'c'); ?>" itemprop="dateCreated">
						<?php echo JText::sprintf('COM_CONTENT_CREATED_DATE_ON', JHtml::_('date', $displayData['item']->created, JText::_('DATE_FORMAT_LC3'))); ?>
					</time>
			</dd>