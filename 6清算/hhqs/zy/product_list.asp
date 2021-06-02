<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>产品列表</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<%
const datafrom = "t_products"
act = request.QueryString("act")
id = request.QueryString("id")

if request.Form("act")="del_all" then
	ids = request.Form("ids")
	if ids<>"" then
		conn.execute("update "&datafrom&" set is_del=1 where id IN ("&ids&") ")
	end if
end if

if act = "istop" then
	'conn.execute("update t_product set istop=0")
	conn.execute("update "&datafrom&" set is_top=1 where id="&id)
elseif act = "notop" then
	'conn.execute("update t_product set istop=0")
	conn.execute("update "&datafrom&" set is_top=0 where id="&id)
elseif act = "del" then
	'conn.execute("update t_product set istop=0")
	conn.execute("update "&datafrom&" set is_del=1 where id="&id)
end if
%>

<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="6" class="header">产品列表</td>
  </tr>
  <tr>
    <td colspan="6">
    <%
	q = trim(request.QueryString("q"))
	%>
    <form method="get" id="sForm">
    <input type="button" onclick="window.location.href='product.asp'" class="btn" value=" 添加新产品 " />
    搜索：<input type="text" value="<%=q%>" name="q" size="30" />
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>
  <tr class="title">
    <td><a href="product_list.asp">编号</a></td>
    <td><a href="?orders=title">名称</a></td>
    <td><a href="?orders=classid">所属分类</a></td>
    <td><a href="?orders=allhits">查看次数</a></td>
    <td>发布时间</td>
    <td>操作</td>
  </tr>
  <form method="post" id="delForm" onsubmit="return confirmAct('删除');">
  <%
				const selectsql = "id,title,hits,addtime,classid,is_top,preview"
				taxis = " order by is_top desc,addtime desc"
				wherestr = " where is_del=0 "
				
				orders = request.QueryString("orders")
				if orders<>"" then taxis = " order by "&orders&" desc,is_top desc,addtime desc"
				
				classid=chkNumeric(request.QueryString("classid"))
				if classid<>0 then wherestr=wherestr&" and classid="&classid
				if q<>"" then wherestr=wherestr&" and title like '%"&q&"%' "
				
				sql="select count(id) from ["& datafrom &"] "&wherestr&""
				set rs=server.createobject("adodb.recordset")
				rs.open sql,conn,0,1
				rs_total=rs(0)
				rs.close
				
				ii=1
				maxperpage=12
				prevpage = 1
				nextpage = 1                                
				page = (request.QueryString("page"))
				if (isnumeric(page) = false) then	page = 0
				if (page = "" ) or (page <= 0) then
					page = 0
					prevpage = 0
				end if 
												
				currentpage=page+1                                
				page = page*maxperpage
				if rs_total mod Maxperpage = 0 then
					totalpage = (rs_total/Maxperpage)
				else
					totalpage = int(rs_total/Maxperpage)+1
				end if
				if currentpage >= totalpage then
					currentpage = totalpage
					nextpage = 0
				end if
				i=page
								
				if(rs_total>0) then
					sql="select id from ["& datafrom &"] "&wherestr&" " & taxis
					set rs=server.createobject("adodb.recordset")
					rs.open sql,conn,0,1
					rs.move(page)
					for i=1 to maxperpage
						if rs.eof then exit for  
						if(i=1)then sqlid=rs(0) else sqlid=sqlid &","&rs(0)
						rs.movenext
					next
					rs.close
				end if

				if trim(sqlid)<>"" then
				sql="select top "&maxperpage&" "&selectsql&" from ["& datafrom &"] where id in("& sqlid &") "&taxis
				rs.open sql,conn,0,1
				i=page
				do while not rs.eof
  %>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td>
	<input type="checkbox" value="<%=rs("id")%>" name="ids" />
	<%=rs("id")%></td>
    <td>
		<%if rs("preview")<>"" then response.Write("<img src='img/img.gif' align='absmiddle' /> ")%>
		<%if rs("is_top")=1 then response.Write("<font color=red>[荐]</font>")%>
		<%=getKeywords(rs("title"),q)%>
    </td>
    <td><a href="?classid=<%=rs("classid")%>"><%=getParentName(rs("classid"))%></a></td>
    <td><%=rs("hits")%></td>
    <td><%=format_time(rs("addtime"),1)%>&nbsp;</td>
    <td align="center">

    <a href="?act=<%if rs("is_top")=1 then response.Write("notop") else response.Write("istop")%>&id=<%=rs("id")%>">推荐</a>
     | 
     <a href="product.asp?action=edit&id=<%=rs("id")%>">修改</a> | 
     <a onClick="javascript:return confirm('请确认删除？\n删除后无法恢复。')" href="?act=del&id=<%=rs("id")%>">删除</a></td>
  </tr>
  <%
					i=i+1
					rs.movenext
				loop
				rs.close
				end if
				
				wherestr = ""
				if cname<>"" then wherestr=wherestr&"cname="&cname&"&"
				if orders<>"" then wherestr=wherestr&"orders="&orders&"&"
				if q<>"" then wherestr=wherestr&"q="&q&"&"
  %>
  <tr>
    <td colspan="6">
    	<input class="btn" value="全选/反选" type="button" onclick="selAll('ids');" />
        <input class="btn" value="批量删除" type="submit" />
        <input class="txt" value="del_all" type="hidden" name="act" />
	</td>
  </tr>
  </form>
  <tr class="bottom">
    <td colspan="6">
    	<%call showPage(prevpage,page,currentpage,Maxperpage,totalpage,rs_total,wherestr)%>
	</td>
  </tr>
</table>


<script>

function confirmAct(name) {
	return confirm('确定要'+name+'吗？'+name+'后无法撤销！');
}

function selAll(name) {
	var objs = document.getElementsByName(name);
	for(var i=0;i<objs.length;i++){
    	if(objs[i].checked) {
			objs[i].checked = false;
		}else{
			objs[i].checked = true;
		}
	}
}
</script>

<%
function getParentName(classid)
	classid = chkNumeric(classid)
	set rs_temp = conn.execute("select top 1 classname from t_classify where classid="&classid)
	if not rs_temp.eof then getParentName=rs_temp(0)
	rs_temp.close
end function
%>
</body>
</html>