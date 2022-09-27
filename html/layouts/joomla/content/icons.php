<?php
/**
 * @package     Joomla.Site
 * @subpackage  Layout
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;
include_once(__DIR__ . '../../../../com_content/settings_blog.php');
JHtml::_('bootstrap.framework');

$canEdit = $displayData['params']->get('access-edit');
$articleId = $displayData['item']->id;

?>

<div class="icons tck-article-tools<?php echo (TCK_ARTICLE_TOOLS_FLOAT_RIGHT ? ' tck-article-tools-right' : '') ?>">
	<?php if (empty($displayData['print'])) : ?>
		<?php if (TCK_ARTICLE_TOOLS_DROPDOWN == 1) : ?>
			<?php if ($canEdit || $displayData['params']->get('show_print_icon') || $displayData['params']->get('show_email_icon')) : ?>
				<div class="btn-group pull-right">
					<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton-<?php echo $articleId; ?>" aria-label="<?php echo JText::_('JUSER_TOOLS'); ?>"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="icon-cog" aria-hidden="true"></span>
						<span class="caret" aria-hidden="true"></span>
					</button>
					<?php // Note the actions class is deprecated. Use dropdown-menu instead. ?>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo $articleId; ?>">
						<?php if ($displayData['params']->get('show_print_icon')) : ?>
							<li class="print-icon tck-article-tool tck-article-tool-print"> <?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?> </li>
						<?php endif; ?>
						<?php if ($displayData['params']->get('show_email_icon')) : ?>
							<li class="email-icon tck-article-tool tck-article-tool-email"> <?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?> </li>
						<?php endif; ?>
						<?php if ($canEdit) : ?>
							<li class="edit-icon tck-article-tool tck-article-tool-edit"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </li>
						<?php endif; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php else : ?>
			<?php if ($displayData['params']->get('show_print_icon')) : ?>
				<span class="print-icon tck-article-tool tck-article-tool-print"> <?php echo JHtml::_('icon.print_popup', $displayData['item'], $displayData['params']); ?> </span>
			<?php endif; ?>
			<?php if ($displayData['params']->get('show_email_icon')) : ?>
				<span class="email-icon tck-article-tool tck-article-tool-email"> <?php echo JHtml::_('icon.email', $displayData['item'], $displayData['params']); ?> </span>
			<?php endif; ?>
			<?php if ($canEdit) : ?>
				<span class="edit-icon tck-article-tool tck-article-tool-edit"> <?php echo JHtml::_('icon.edit', $displayData['item'], $displayData['params']); ?> </span>
			<?php endif; ?>
		<?php endif; ?>

	<?php else : ?>

		<div class="pull-right">
			<?php echo JHtml::_('icon.print_screen', $displayData['item'], $displayData['params']); ?>
		</div>

	<?php endif; ?>
</div>
