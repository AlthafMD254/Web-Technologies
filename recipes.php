<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$xml = new DOMDocument();
$xml->load("recipes.xml");

$xsl = new DOMDocument();
$xsl->load("recipes.xsl");

$proc = new XSLTProcessor();
$proc->importStylesheet($xsl);

echo $proc->transformToXML($xml);
?>
