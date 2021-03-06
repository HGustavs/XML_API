

$xsltProcessor->setParameter('', $key, $val);


<stylesheet xmlns:php="http://php.net/xsl"

The for-each...I tend to use:

<xsl:template match="/">

then



I am new to XML/XSL. I want to be able to pass a var in a rule string and have that return the correct data.

Right now I have have this PHP:

<?php
$params = array('id' => $_GET['id']);

$xslDoc = new DOMDocument(); 
$xslDoc->load("test.xsl"); 

$xmlDoc = new DOMDocument(); 
$xmlDoc->load("test.xml");

$xsltProcessor = new XSLTProcessor(); 
$xsltProcessor->registerPHPFunctions(); 
$xsltProcessor->importStyleSheet($xslDoc); 

foreach ($params as $key => $val)
    $xsltProcessor->setParameter('', $key, $val);

echo $xsltProcessor->transformToXML($xmlDoc);
?>

My xml file looks like this:

<Profiles> 
  <Profile> 
    <id>1</id> 
    <name>john doe</name> 
    <dob>188677800</dob> 
  </Profile> 
  <Profile> 
    <id>2</id> 
    <name>mark antony</name> 
    <dob>79900200</dob> 
  </Profile> 
  <Profile> 
    <id>3</id> 
    <name>neo anderson</name> 
    <dob>240431400</dob> 
  </Profile> 
  <Profile> 
    <id>4</id> 
    <name>mark twain</name> 
    <dob>340431400</dob> 
  </Profile> 
  <Profile> 
    <id>5</id> 
    <name>frank hardy</name> 
    <dob>390431400</dob> 
  </Profile> 
</Profiles> 

And my xsl looks like this

<xsl:stylesheet version="1.0" 
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:param name="id" />

  <xsl:template match="*">
    <html><body>
    <h2>Profile</h2>
    <table cellspacing="1" cellpadding="5" border="1"> 
      <caption>User Profiles</caption> 
      <tr><th>ID</th><th>Name</th><th>Date of Birth</th></tr> 

      <xsl:for-each select="/Profiles/Profile[id='$id']">
        <tr> 
          <td><xsl:value-of select="id"/></td> 
          <td><xsl:value-of select="php:function('ucwords', string(name))"/></td> 
          <td><xsl:value-of select="php:function('date', 'jS M, Y', number(dob))"/></td> 
        </tr> 
      </xsl:for-each> 
    </table> 
    </body></html>
  </xsl:template>
</xsl:stylesheet>