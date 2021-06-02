<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="../inc_config.asp"-->
<!--#include file="../inc/func.asp"-->
<%
sub closeSite()
	response.write("网站维护中....")
	response.end()
end sub

session.CodePage = 65001
response.Charset = "utf-8"

If IsObject(conn) = false Then
	Dim conn,connstr
	Set conn = server.CreateObject("ADODB.CONNECTION")
	'connstr="driver={Microsoft Access Driver (*.mdb)};dbq=" & Server.MapPath(conf_siteurl&conf_dbpath)
	connstr = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" & Server.MapPath("../"&conf_dbpath) 
	conn.Open connstr
End if
'语言版本
const lang=0


%>
