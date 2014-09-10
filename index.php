<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("html/index.html");
echo $doc->saveHTML();
?>