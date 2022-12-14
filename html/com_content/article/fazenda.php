<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
include_once(__DIR__ . '../../settings_article.php');
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));
JHtml::_('behavior.caption');

?>
<div class="tck-article item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="https://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	<?php if ($this->params->get('show_page_heading')) : ?>
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	<?php endif;
	if ($params->get('show_title')) : ?>
		<h1 itemprop="headline" class="tck-article-title">
			<?php echo $this->escape($this->item->title); ?>
		</h1>
	<?php endif;
	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
	{
		echo $this->item->pagination;
	}
	$params_article = array();
	foreach ($this->item->jcfields as $par) {
		$params_article[$par->name] = array('title'=>$par->title, 'value'=>$par->rawvalue);
	}
	?>
	<div class="">
		<div class="col-md-5 float-left pdr0">
			<div id="carousel_proekt" class="owl-carousel">
				<? if(!empty($params_article['foto-proekta']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta']['value'];?>" alt="<?=$params_article['foto-alt-1']['value']?>" title="<?=$params_article['foto-alt-1']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-1']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-1']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-1']['value'];?>" alt="<?=$params_article['foto-alt-2']['value']?>" title="<?=$params_article['foto-alt-2']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-2']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-2']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-2']['value'];?>" alt="<?=$params_article['foto-alt-3']['value']?>" title="<?=$params_article['foto-alt-3']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-3']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-3']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-3']['value'];?>" alt="<?=$params_article['foto-alt-4']['value']?>" title="<?=$params_article['foto-alt-4']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-4']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-4']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-4']['value'];?>" alt="<?=$params_article['foto-alt-5']['value']?>" title="<?=$params_article['foto-alt-5']['value']?> ????????"></a></div><? } ?>
<!-- 				<? if(!empty($params_article['foto-proekta-5']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-5']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-5']['value'];?>" alt="<?=$params_article['foto-alt-6']['value']?>" title="<?=$params_article['foto-alt-6']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-6']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-6']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-6']['value'];?>" alt="<?=$params_article['foto-alt-7']['value']?>" title="<?=$params_article['foto-alt-7']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-7']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-7']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-7']['value'];?>" alt="<?=$params_article['foto-alt-8']['value']?>" title="<?=$params_article['foto-alt-8']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-8']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-8']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-8']['value'];?>" alt="<?=$params_article['foto-alt-9']['value']?>" title="<?=$params_article['foto-alt-9']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-9']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-9']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-9']['value'];?>" alt="<?=$params_article['foto-alt-10']['value']?>" title="<?=$params_article['foto-alt-10']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-10']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-10']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-10']['value'];?>" alt="<?=$params_article['foto-alt-11']['value']?>" title="<?=$params_article['foto-alt-11']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-11']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-11']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-11']['value'];?>" alt="<?=$params_article['foto-alt-12']['value']?>" title="<?=$params_article['foto-alt-12']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-12']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-12']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-12']['value'];?>" alt="<?=$params_article['foto-alt-13']['value']?>" title="<?=$params_article['foto-alt-13']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-13']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-13']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-13']['value'];?>" alt="<?=$params_article['foto-alt-14']['value']?>" title="<?=$params_article['foto-alt-14']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-14']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-14']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-14']['value'];?>" alt="<?=$params_article['foto-alt-15']['value']?>" title="<?=$params_article['foto-alt-15']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-15']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-15']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-15']['value'];?>" alt="<?=$params_article['foto-alt-16']['value']?>" title="<?=$params_article['foto-alt-16']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-16']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-16']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-16']['value'];?>" alt="<?=$params_article['foto-alt-17']['value']?>" title="<?=$params_article['foto-alt-17']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-17']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-17']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-17']['value'];?>" alt="<?=$params_article['foto-alt-18']['value']?>" title="<?=$params_article['foto-alt-18']['value']?> ????????"></a></div><? } ?>
				<? if(!empty($params_article['foto-proekta-18']['value'])){ ?><div class="item"><a data-fancybox="gallery" href="/images/proekti/<?=$params_article['foto-proekta-18']['value'];?>"><img itemprop="image" class="img-fluid element-img" src="/images/proekti/<?=$params_article['foto-proekta-18']['value'];?>" alt="<?=$params_article['foto-alt-19']['value']?>" title="<?=$params_article['foto-alt-19']['value']?> ????????"></a></div><? } ?> -->

			</div>
		</div>
		<div class="">
			

				<div class="col-md-4 float-right">
					<div class="col-md-12 ba-click-lightbox-form-5">????????????????</div>
					<? if(!empty($params_article['tsena']['value'])){ ?><div class="col-md-12 tsena">???????? ???? <?=$params_article['tsena']['value'];?> ??????</div><?}?>
				</div>
	<?php echo $this->item->text; ?>
		</div>
	</div>
	<div class="row pt-2" style="width: 100%; margin-top: 20px;">
	</div>
	<style type="text/css">
	.owl-nav>button.owl-prev {
		left: 0px;
	}
	.owl-nav>button.owl-next {
		right: 0px;
	}
</style>
<?php // Todo Not that elegant would be nice to group the params ?>
<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') || $assocParam); ?>

<?php if (!$useDefList && $this->print) : ?>
	<div id="pop-print" class="btn hidden-print">
		<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
	</div>
	<div class="clearfix"> </div>
<?php endif; ?>
<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
<div class="page-header">

	<?php if ($this->item->state == 0) : ?>
		<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
	<?php endif; ?>
	<?php if (strtotime($this->item->publish_up) > strtotime(JFactory::getDate())) : ?>
	<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
<?php endif; ?>
<?php if ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != JFactory::getDbo()->getNullDate()) : ?>
<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if (!$this->print) : ?>
	<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
	<?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
<?php endif; ?>
<?php else : ?>
	<?php if ($useDefList) : ?>
		<div id="pop-print" class="btn hidden-print">
			<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php // Content is generated by content plugin event "onContentAfterTitle" ?>
<?php echo $this->item->event->afterDisplayTitle; ?>

<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
	<?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
	<?php if (TCK_ARTICLE_SHOW_DETAILS == 1) echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
<?php endif; ?>

<?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>

<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
<?php endif; ?>

<?php // Content is generated by content plugin event "onContentBeforeDisplay" ?>
<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
<?php if ($params->get('access-view')) : ?>
	<?php// echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>
	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative) :
		echo $this->item->pagination;
	endif;
	?>
	<?php if (isset ($this->item->toc)) :
		echo $this->item->toc;
	endif; ?>
	<div itemprop="articleBody" class="tck-article-body">
		<?php //echo $this->item->text; ?>
	</div>

	<?php if ($info == 1 || $info == 2) : ?>
		<?php if ($useDefList) : ?>
			<?php // Todo: for Joomla4 joomla.content.info_block.block can be changed to joomla.content.info_block ?>
			<?php if (TCK_ARTICLE_SHOW_DETAILS == 1) echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
		<?php endif; ?>
		<?php if ($params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>
<?php endif; ?>
[forms ID=4]
<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative) :
	echo $this->item->pagination;
	?>
<?php endif; ?>
<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
<?php echo $this->loadTemplate('links'); ?>
<?php endif; ?>
<?php // Optional teaser intro text for guests ?>
<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
<?php// echo JLayoutHelper::render('joomla.content.intro_image', $this->item); ?>
<?php echo JHtml::_('content.prepare', $this->item->introtext); ?>
<?php // Optional link to let them register to see the whole article. ?>
<?php if ($params->get('show_readmore') && $this->item->fulltext != null) : ?>
	<?php $menu = JFactory::getApplication()->getMenu(); ?>
	<?php $active = $menu->getActive(); ?>
	<?php $itemId = $active->id; ?>
	<?php $link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false)); ?>
	<?php $link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language))); ?>
	<p class="readmore">
		<a href="<?php echo $link; ?>" class="register">
			<?php $attribs = json_decode($this->item->attribs); ?>
			<?php
			if ($attribs->alternative_readmore == null) :
				echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
			elseif ($readmore = $attribs->alternative_readmore) :
				echo $readmore;
				if ($params->get('show_readmore_title', 0) != 0) :
					echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
				endif;
			elseif ($params->get('show_readmore_title', 0) == 0) :
				echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
			else :
				echo JText::_('COM_CONTENT_READ_MORE');
				echo JHtml::_('string.truncate', $this->item->title, $params->get('readmore_limit'));
			endif; ?>
		</a>
	</p>
<?php endif; ?>
<?php endif; ?>
<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
	echo $this->item->pagination;
	?>
<?php endif; ?>
<?php // Content is generated by content plugin event "onContentAfterDisplay" ?>
<?php echo $this->item->event->afterDisplayContent; ?>
</div>
