<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
<center>
  <table border="1">
    <tr bgcolor="#f3ab33">
      <th>SUBJECT</th>
      <th>AUTHOR</th>
      <th>DATE</th>
      <th>BRANCH</th>
      <th>PID</th>
    </tr>
    <xsl:for-each select="MyPrepMate/course">
    <tr>
      <td><xsl:value-of select="Subject"/></td>
      <td><xsl:value-of select="author"/></td>
      <td><xsl:value-of select="date"/></td>
      <td><xsl:value-of select="branch"/></td>
      <td><xsl:value-of select="id"/></td>
    </tr>
    </xsl:for-each>
  </table>
</center>
</body>
</html>
</xsl:template>
</xsl:stylesheet>