<?xml version="1.0" encoding="utf-8"?>
 
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

	<xsl:template match="/">
		<table border='1'>
    <xsl:apply-templates/>
		</table>
	</xsl:template>	
	
	<xsl:template match="person">
		<tr>
			
		<xsl:apply-templates select = "name" />
		
		<td>
    <table>
		<xsl:apply-templates select = "address" />
		</table>
		</td>

		<td>
    <table>
		<xsl:apply-templates select = "car" />
		</table>
		</td>			
		
		</tr>
	</xsl:template>

	<xsl:template match="car">
		<tr>
		<td><xsl:value-of select="@lpno"/></td>		
		<td><xsl:value-of select="./color"/></td>
		</tr>
  </xsl:template>
 
  <xsl:template match="name">
		<td><xsl:value-of select="."/></td>
  </xsl:template>
 
  <xsl:template match="address">
		<tr>
		<td><xsl:value-of select="./@street"/></td>
		</tr>
  </xsl:template>
 
</xsl:stylesheet>