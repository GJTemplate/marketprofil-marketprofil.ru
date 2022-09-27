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
			<dd class="hits tck-article-detail-hits">
				<?php if (TCK_ARTICLE_DETAILS_SHOW_ICONS) : ?>
					<span class="tck-article-detail-icon <?php echo TCK_ARTICLE_DETAILS_ICON_HITS ?>" aria-hidden="true"></span>
				<?php endif; ?>
				<meta itemprop="interactionCount" content="UserPageVisits:<?php echo $displayData['item']->hits; ?>" />
				<?php echo JText::sprintf('COM_CONTENT_ARTICLE_HITS', $displayData['item']->hits); ?>
			</dd>