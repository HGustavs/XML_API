<?php
   $xslDoc = new DOMDocument();
   $xslDoc->load("xslt_navigation2choose.xsl");
   $xmlDoc = new DOMDocument();
 
   $xmlDoc->load("example1.xml");
   $proc = new XSLTProcessor();
   $proc->importStylesheet($xslDoc);
   echo $proc->transformToXML($xmlDoc);
?>