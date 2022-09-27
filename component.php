<?php
/**
 * @name		Template Creator CK
 * @copyright	Copyright (C) since 2011. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Cedric Keiflin - http://www.template-creator.com - http://www.joomlack.fr
 */

defined('_JEXEC') or die;

$app   = JFactory::getApplication();
$doc   = JFactory::getDocument();
$this->language = $doc->language;
$bodyStyle = "";
$bodyClass = "";

// Set the body classes
$app             = JFactory::getApplication();
// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$print    = $app->input->getCmd('print', '');

// Add Stylesheets
if (file_exists(JPATH_ROOT . '/templates/'.$this->template.'/css/bootstrap.css')) {
	$doc->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
}

$doc->addStyleSheet('templates/'.$this->template.'/css/template.css');

if (file_exists(JPATH_ROOT . '/templates/'.$this->template.'/css/custom.css')) {
	$doc->addStyleSheet('templates/'.$this->template.'/css/custom.css');
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<?php
if (file_exists(JPATH_ROOT . '/templates/'.$this->template.'/css/screen.css')) {
	?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/screen.css" type="text/css" media="screen" />
	<?php
} else {
	$bodyStyle = "background: #fff;color: #333;";
}
?>
</head>
<body class="<?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($print ? ' print' : '');
?> <?php echo $this->direction; ?> contentpane" style="<?php echo $bodyStyle ?>">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
</body>
</html>
