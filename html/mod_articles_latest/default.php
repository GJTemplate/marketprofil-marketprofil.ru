<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="row latestnews<?php echo $moduleclass_sfx; ?> mod-list">

	<?php foreach ($list as $item) : ?>
		<div itemscope class="col-md-3 float-left" itemtype="https://schema.org/Article">
			<?  $img = json_decode($item->images); ?>
			<a href="<?php echo $item->link; ?>" itemprop="url" class="item" title="<?php echo $item->title; ?>">
				<div class="img lazy" style="background-image: url('<?= $img->image_intro;?>');"></div>
				<div class="name" itemprop="name"><?php echo $item->title; ?></div>
				<div class="desc"><? echo mb_strimwidth($item->title, 0, 20, "..."); ?></div>
			</a>
		</div>
	<?php endforeach; ?>
</div>
