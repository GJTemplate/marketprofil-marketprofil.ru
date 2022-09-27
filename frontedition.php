<?php
// load template creator ck edition
//$editionfiletck = JPATH_ADMINISTRATOR . '/components/com_templateck/helpers/frontedition.php';
//if (file_exists($editionfiletck)) {
//	require_once $editionfiletck;
//	$templatecreatorckEditionLoaded = true;
//}

// load modules manager ck edition
$editionfilemmck = JPATH_SITE . '/components/com_modulesmanagerck/helpers/frontedition.php';
if (file_exists($editionfilemmck)) {
	require_once $editionfilemmck;
	\Modulesmanagerck\FrontEdition::init();
}
// load page builder ck edition
$editionfilepbck = JPATH_ADMINISTRATOR . '/components/com_pagebuilderck/helpers/frontedition.php';
if (file_exists($editionfilepbck)) {
	require_once $editionfilepbck;
	\Pagebuilderck\FrontEdition::init();
}
