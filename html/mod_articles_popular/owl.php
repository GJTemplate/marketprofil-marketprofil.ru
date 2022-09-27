<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<ul class="mostread<?php echo $moduleclass_sfx; ?> mod-list owl-carousel" id="owl_materials" >
	<?php foreach ($list as $item) : ?>
		<li itemscope itemtype="https://schema.org/Article">
			<a href="<?php echo $item->link; ?>" itemprop="url">
				<? 
$img = json_decode($item->images);
				 ?>
				 <div class="img"><img src="<?= $img->image_intro; ?>"></div>
				<span itemprop="name">
					<?php echo $item->title; ?>
				</span>
			</a>
		</li>
	<?php endforeach; ?>
</ul>

<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery("#owl_materials").owlCarousel({
			loop:true,
			nav:true,
			autoplay:true,
			margin: 20,
			responsive:{
				0:{
					items:2
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		});
	})
</script>
