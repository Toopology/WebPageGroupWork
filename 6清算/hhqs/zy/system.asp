<!--#include file="check.asp"-->
<!--#include file="../inc/create.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统设置</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<%
cleardb = 0
if cleardb=9999 then
	alltable = "t_classify,t_company,t_feedback,t_article,t_order,t_products"
	alltable = alltable&",t_album,t_comment,t_links,t_menu,t_user,t_flash"
	alltable_arr = split(alltable,",")
	for i=0 to ubound(alltable_arr)
		if alltable_arr(i) <> "" then
			conn.execute("select * into ["&alltable_arr(i)&"_bak] from ["&alltable_arr(i)&"] where 1=2")
			conn.execute("DROP TABLE  ["&alltable_arr(i)&"] ")
			conn.execute("select * into ["&alltable_arr(i)&"] from ["&alltable_arr(i)&"_bak] where 1=2")
			conn.execute("DROP TABLE  ["&alltable_arr(i)&"_bak] ")
		end if
	next
end if

Function replaceStr(str)
	replaceStr = Trim(str)
	replaceStr = Replace(replaceStr, "'", "")
	replaceStr = Replace(replaceStr, """", "")
	replaceStr = Replace(replaceStr, vbcrlf, "")
End Function

'response.Write(regReplace("^site_name = ""(.*?)""$","site_name = ""sssssss""","site_name = ""cccccccccc"""))

function regReplace(p,str,val)
	Dim re
	Set re = New RegExp
	re.Pattern = p
	're.Global = True
	re.IgnoreCase = True
	re.MultiLine = True
	regReplace = re.Replace(str,val)
	Set re = nothing
end function

act = request.Form("act")
if act = "save" then

	htmlcontent = readfromtextfile("../inc_config.asp","utf-8")
	htmlcontent = regReplace("^'配置最后更新时间：(.*?)'$",htmlcontent,"'配置最后更新时间："&now()&"'")
	'conf_sitename,conf_company,conf_keywords,conf_tel,conf_email,conf_fax,
	'conf_mobile,conf_addr,conf_cookies_name,conf_desc,conf_siteurl,conf_icp_no
	alltable = "conf_sitename,conf_company,conf_keywords,conf_tel,conf_email,conf_fax"
	alltable = alltable&",conf_mobile,conf_addr,conf_cookies_name,conf_desc,conf_siteurl,conf_icp_no"
	alltable_arr = split(alltable,",")
	for i=0 to ubound(alltable_arr)
		htmlcontent = regReplace("^"&alltable_arr(i)&" = ""(.*?)""$",htmlcontent,""&alltable_arr(i)&" = """&replaceStr(request.Form(""&alltable_arr(i)&""))&"""")
	next
	
	'response.Write(htmlcontent):response.End()
	call creatHtml(htmlcontent,"../inc_config.asp")
	call jsInfo("配置保存成功","system.asp")
end if
%>

<form id="form1" name="form1" method="post" action="">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">系统设置</td>
  </tr>

  <tr>
    <td class="right">&nbsp;网站名称</td>
    <td>
      <input name="conf_sitename" value="<%=conf_sitename%>" type="text" class="text" id="conf_sitename" size="50" />
    </td>
  </tr>
  <tr>
    <td class="right">&nbsp;公司名称</td>
    <td>
      <input name="conf_company" value="<%=conf_company%>" type="text" class="text" id="conf_company" size="50" />
    </td>
  </tr>
  <tr>
    <td class="right">&nbsp;关键词</td>
    <td><input name="conf_keywords" type="text" class="text" id="conf_keywords" value="<%=conf_keywords%>" size="80" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;网站描述</td>
    <td><input name="conf_desc" type="text" class="text" id="conf_desc" value="<%=conf_desc%>" size="80" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;联系电话</td>
    <td><input name="conf_tel" value="<%=conf_tel%>"  type="text" class="text" id="conf_tel" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;联系手机</td>
    <td><input name="conf_mobile" value="<%=conf_mobile%>"  type="text" class="text" id="conf_mobile" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;电子邮件</td>
    <td><input name="conf_email" value="<%=conf_email%>"  type="text" class="text" id="conf_email" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;传真</td>
    <td><input name="conf_fax" value="<%=conf_fax%>"  type="text" class="text" id="conf_fax" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;联系地址</td>
    <td><input name="conf_addr" value="<%=conf_addr%>"  type="text" class="text" id="conf_addr" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;ICP备案</td>
    <td><input name="conf_icp_no" value="<%=conf_icp_no%>"  type="text" class="text" id="conf_icp_no" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;网站路径</td>
    <td><input name="conf_siteurl" value="<%=conf_siteurl%>"  type="text" class="text" id="conf_siteurl" size="50" /></td>
  </tr>
  <tr>
    <td class="right">&nbsp;Cookies域</td>
    <td><input name="conf_cookies_name" value="<%=conf_cookies_name%>"  type="text" class="text" id="conf_cookies_name" size="50" /></td>
  </tr>
  <tr class="hide">
    <td class="right">清空数据库</td>
    <td><input name="cleardb" type="checkbox" id="cleardb" value="1" />
      <label for="cleardb">清空</label></td>
  </tr>
  <tr class="bottom">
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="保存设置" />
    <input name="act" type="hidden" id="act" value="save" /></td>
  </tr>

</table></form>
</body>
</html>
