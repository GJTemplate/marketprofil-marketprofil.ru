<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
include_once(__DIR__ . '../../settings_content.php');
$params = $displayData['params'];
$item = $displayData['item'];
$direction = JFactory::getLanguage()->isRtl() ? 'left' : 'right';
$readmorelinkclass = TCK_LAYOUT_CONTENT_READMORE_LINK_CLASS;
$readmoreicon = (TCK_LAYOUT_CONTENT_READMORE_SHOW_ICON == 1 ? '<span class="' . TCK_LAYOUT_CONTENT_READMORE_ICON . '" aria-hidden="true"></span>' : '');
?>

<div class="readmore tck-readmore">
	<?php if (!$params->get('access-view')) : ?>
		<a class="<?php echo $readmorelinkclass ?>" href="<?php echo $displayData['link']; ?>" itemprop="url" aria-label="<?php echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?> 
			<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
			<?php echo $readmoreicon; ?>
			<?php echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE'); ?>
		</a>
	<?php elseif ($readmore = $item->alternative_readmore) : ?>
		<a class="<?php echo $readmorelinkclass ?>" href="<?php echo $displayData['link']; ?>" itemprop="url" aria-label="<?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
			<?php echo $readmoreicon; ?> 
			<?php echo $readmore; ?>
			<?php if ($params->get('show_readmore_title', 0) != 0) : ?>
				<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
			<?php endif; ?>
		</a>
	<?php elseif ($params->get('show_readmore_title', 0) == 0) : ?>
		<a class="<?php echo $readmorelinkclass ?>" href="<?php echo $displayData['link']; ?>" itemprop="url" aria-label="<?php echo JText::_('COM_CONTENT_READ_MORE'); ?> <?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
			<?php echo $readmoreicon; ?> 
			<?php echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE'); ?>
		</a>
	<?php else : ?>
		<a class="<?php echo $readmorelinkclass ?>" href="<?php echo $displayData['link']; ?>" itemprop="url" aria-label="<?php echo JText::_('COM_CONTENT_READ_MORE'); ?> <?php echo htmlspecialchars($item->title, ENT_QUOTES, 'UTF-8'); ?>">
			<?php echo $readmoreicon; ?> 
			<?php echo JText::_('COM_CONTENT_READ_MORE'); ?>
			<?php echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit')); ?>
		</a>
	<?php endif; ?>
</div>
