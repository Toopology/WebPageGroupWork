<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>友情链接</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
//打开上传对话框
function showUpload(id,w,h){
	tipsWindow("上传图片", "iframe:xupload/upload.htm?id="+id+"&w="+w+"&h="+h, "500", "150", "false", "", "true", "text");
}

//预览上传图片
function previewUpload(id,w,h){
	var img = document.getElementById(id).value;
	tipsWindow("预览图片", "img:../"+img, w, h, "true", "", "true", "text");
}
</script>
</head>

<body>

<%
action=request("action")
if action="save" then
	'id,title,pic,addtime,allhits,isText,isTop,linkurl
	'-------------------------------------------------判断重复
	title = Get_SafeStr(request.Form("title"))
	pic = Get_SafeStr(request.Form("pic"))
	addtime = Get_SafeStr(request.Form("addtime"))
	linkurl = Get_SafeStr(request.Form("linkurl"))
	id=request.Form("id")
	if pic<>"" then isText = 0 else isText = 1
	allhits = 1
	isTop = 0
	
	if id<>"" then
	
		conn.execute("update [t_links] set title='"&title&"',pic='"&pic&"',addtime='"&addtime&"',isText='"&isText&"',isTop='"&isTop&"',linkurl='"&linkurl&"' where id="&id)
	else 
		'set rs=conn.execute("select top 1 id from t_links where linkurl='"&linkurl&"' or title='"&title&"' ")
		'if rs.eof then 	
			conn.execute("insert into [t_links] (title,pic,addtime,allhits,isText,isTop,linkurl) values ('"&title&"','"&pic&"','"&addtime&"',"&allhits&","&isText&","&isTop&",'"&linkurl&"')")
		'else
			'response.Write("网址和名称不能重复")
		'end if
	end if
	
	title = ""
	pic = ""
	linkurl = ""
	id=""
elseif 	action="del" then
	conn.execute("delete from t_links where id="&request.QueryString("id"))
end if



%>


<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="my_table">

  <tr>
    <td colspan="20" class="header">友情链接</td>
  </tr>

  <tr  class="title" align="center">
    <td>编号</td>
    <td align="left">网站名称</td>
    <td align="left">网站地址</td>
    <td>添加时间</td>
    <td>文字链接</td>
    <td>操作</td>
  </tr>
  <%
  'title,pic,addtime,allhits,isText,isTop
  set rs=conn.execute("select id,title,pic,addtime,allhits,isText,isTop,linkurl from t_links order by isText,id desc")
  do while not rs.eof
  %>
  <tr align="center" onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("id")%></td>
    <td align="left">
    <%=rs("title")%></td>
    <td align="left">
    <a href="<%=rs("linkurl")%>" target="_blank"><%=rs("linkurl")%></a>
    </td>
    <td><%=rs("addtime")%></td>
    <td><%=IsReady(rs("isText"))%></td>
    <td>
	
	<a href="?action=edit&id=<%=rs(0)%>">修改</a>
	|
	<a onclick="return confirm('是否删除？');" href="?action=del&id=<%=rs(0)%>">删除</a></td>
  </tr>
  <%
  rs.movenext
  loop
  rs.close
    
  linkurl = "http://"
  if action="edit" then
  	id=request.QueryString("id")
  	set rs=conn.execute("select title,pic,addtime,allhits,isText,isTop,linkurl from t_links where id="&id)
	if not rs.eof then
	
		title = rs(0)
		pic = rs(1)
		addtime = rs(2)
		allhits = rs(3)
		isText = rs(4)
		isTop = rs(5)
		linkurl = rs(6)
	
	end if
	rs.close
  end if
  %>

</table> 

<br/>

<form id="form1" name="form1" method="post" action="links.asp">
<table width="100%" border="0" cellspacing="0" class="my_table" cellpadding="0">
  <tr>
    <td colspan="2" class="header">添加友情链接</td>
  </tr>
  

  
  <tr>
    <td width="18%" class="right">网站名称</td>
    <td width="82%"><input name="title" type="text" class="text" value="<%=title%>" id="title" size="50" /></td>
  </tr>
  <tr>
    <td class="right">网站地址</td>
    <td><input name="linkurl" type="text" class="text" value="<%=linkurl%>" id="linkurl" size="50" /></td>
  </tr>
  <tr>
    <td class="right">图片地址</td>
    <td>
    <input name="pic" type="text" class="text" id="pic" value="<%=pic%>" size="50" />
    <input type="button" value="上传图片" onclick="showUpload('pic',200,120);" />
    <input type="button" value="预览" onclick="previewUpload('pic',500,400);" />
    </td>
  </tr>
  <tr>
    <td class="right">更新时间</td>
    <td><input readonly="readonly" name="addtime" type="text" class="text" value="<%=now()%>" id="addtime" size="50" /></td>
  </tr>
  

  <tr>
    <td class="right">&nbsp;</td>
    <td><input name="Submit" type="submit" class="button" value=" 提 交 " />
      <input name="action" type="hidden" id="action" value="save" />
      <input name="id" type="hidden" id="id" value="<%=id%>" /></td>
  </tr>
</table>
</form>
</body>
</html>
