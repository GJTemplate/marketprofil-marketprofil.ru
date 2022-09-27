<?php
/**
 * @package 	JF Mobile Menu Pro
 * @author		JoomForest.com
 * @email		support@joomforest.com
 * @website		http://www.joomforest.com
 * @copyright	Copyright (C) 2011-2016 JoomForest.com, All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
**/

defined('_JEXEC') or die;
?>
<?php if($jf_MMPro_Panel) { ?>
<div id="<?php echo $jf_MMPro_ID; ?>_panel" class="jf_mm_pro_panelBtn <?php echo $jf_MMPro_PanelDirec; ?>" style="<?php echo $jf_MMPro_PanelBTNStyle; ?>"><div class="burger top"></div><div class="burger center"></div><div class="burger bottom"></div></div>
<div data-jfmmpropanel="<?php echo $jf_MMPro_ID; ?>_panel" class="jf_mm_pro_panel <?php echo $jf_MMPro_PanelDirec; ?>">
<div class="jf_mm_pro_panel_title" style="height:<?php echo $jf_MMPro_PanelTitleH; ?>;line-height:<?php echo $jf_MMPro_PanelTitleH; ?>"><?php echo $jf_MMPro_PanelTitle; ?></div>
<div class="jf_mm_pro_panel_content">
<?php } ?>
<div class="jf_mm_pro_hidden">
<div id="<?php echo $jf_MMPro_ID; ?>" class="jf_mm_pro_wrapper">
<?php // The menu class is deprecated. Use nav instead. ?>
<ul class="jf_mm_pro <?php echo $class_sfx;?>"<?php
	$tag = '';

	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id') . '';
		echo ' id="' . $tag . '"';
	}
?>>
<?php
foreach ($list as $i => &$item)
{
	$class = 'item-' . $item->id;

	if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id))
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');

		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	if ($item->parent)
	{
		$class .= ' parent';
	}

	if (!empty($class))
	{
		$class = ' class="' . trim($class) . '"';
	}

	echo '<li' . $class . '>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_jf_mmpro', 'default_' . $item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_jf_mmpro', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		 echo '<span class="toggle-sub-nav"></span>';
		echo '<ul class="jf_mm_pro_subm">';
	}
	elseif ($item->shallower)
	{
		// The next item is shallower.
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	else
	{
		// The next item is on the same level.
		echo '</li>';
	}
}
?></ul>
</div>
</div>
<?php if($jf_MMPro_Panel) { ?></div></div><?php } ?>
<script type="text/javascript">
	jQuery(document).ready(function($){
	<?php for ($jf_list = 1; $jf_list <= $jf_list_count; $jf_list += 1) { ?>
		<?php if ($Array_item[$jf_list]) { ?>
			<?php if($Array_Type[$jf_list] == 'font') { ?>
				$('#<?php echo $jf_MMPro_ID; ?> .item-<?php echo $Array_item_ID[$jf_list]; ?> > a').prepend('<?php echo $Array_fontHTML[$jf_list]; ?>');
			<?php } else { ?>
				$('#<?php echo $jf_MMPro_ID; ?> .item-<?php echo $Array_item_ID[$jf_list]; ?> > a').prepend('<img src="<?php echo $base; ?><?php echo $Array_ImageURL[$jf_list]; ?>" style="<?php echo $Array_ImageStyle[$jf_list]; ?>">');
			<?php } ?>
		<?php } ?>
	<?php } ?>
	});
</script>