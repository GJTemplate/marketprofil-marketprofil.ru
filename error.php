<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
if($this->error->getCode() == '404'){
    header("HTTP/1.1 404 Not Found");
    echo file_get_contents(JURI::root().'404-error');
    exit;
}
?>