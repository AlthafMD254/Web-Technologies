<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/recipes">
<html>
<body>
<h1>Recipe List</h1>
<ul>
<xsl:for-each select="recipe">
<li>
<b><xsl:value-of select="name"/></b>
— <xsl:value-of select="category"/> — ⭐ <xsl:value-of select="rating"/>
<br/>
<xsl:value-of select="description"/>
</li>
</xsl:for-each>
</ul>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
