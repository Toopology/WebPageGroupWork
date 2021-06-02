<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<%
Action = LCase(Request("action"))
Select Case Trim(Action)
	Case "view"
		Call view
	Case "del"
		Call del
		Call list
	Case "save"
		Call saved
		Call list
	Case Else
		Call list
End Select

sub del()
	id = chkNumeric(request.QueryString("id"))
	conn.execute("delete from t_feedback where id="&id)
end sub

sub saved()
	id = chkNumeric(request.Form("id"))
	ischeck = chkNumeric(request.Form("ischeck"))
	reply = request.Form("reply")
	retime=now()
	conn.execute("update t_feedback set retime='"&retime&"',reply='"&reply&"',ischeck='"&ischeck&"'  where id="&id)
end sub

sub list()
%>


<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="7" class="header">在线留言</td>
  </tr>
  <tr class="title">
    <td >标题</td>
    <td >联系人</td>
    <td >邮件</td>
    <td >审核</td>
    <td >Ip地址</td>
    <td >加入时间</td>
    <td align="center">操作</td>
  </tr>
  <%
				const datafrom = "t_feedback"
				const selectsql = "id,title,email,username,userip,addtime,ischeck,reply"
				const taxis = " order by id desc"
				
				sql="select count(id) from ["& datafrom &"] "&wherestr&""
				set rs=server.createobject("adodb.recordset")
				rs.open sql,conn,0,1
				rs_total=rs(0)
				rs.close
				
				ii=1
				maxperpage=15
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
    <td><%=rs("title")%></td>
    <td>&nbsp;<%=rs("username")%></td>
    <td>&nbsp;<a href="mailto:<%=rs("email")%>" target="_blank"><%=rs("email")%></a></td>
    <td>&nbsp;<%=IsReady(rs("ischeck"))%></td>
    <td>&nbsp;<%=rs("userip")%></td>
    <td>&nbsp;<%=rs("addtime")%></td>
    <td align="center"><a href="?action=view&id=<%=rs(0)%>">查看</a>
    <a onclick="return confirm('确定要删除吗？')" href="?action=del&id=<%=rs(0)%>">删除</a>
    </td>
  </tr>
  <%
					i=i+1
					rs.movenext
				loop
				rs.close
				end if
				if class1<>"" then wherestr="c="&class1&"&"
  %>
  <tr class="bottom">
    <td colspan="7">
    	<%call showPage(prevpage,page,currentpage,Maxperpage,totalpage,rs_total,wherestr)%>
	</td>
  </tr>
</table>
<%end sub

sub view()
	id=request.QueryString("id")
	set rs=conn.execute("select top 1 * from t_feedback where id="&id)
	if not rs.eof then
%>
<form method="post" action="<%=request.ServerVariables("SCRIPT_NAME")%>">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">留言详情</td>
  </tr>
  <tr>
    <td class="right"><strong>主题</strong></td>
    <td>&nbsp;<%=rs("title")%></td>
  </tr>
  <tr>
    <td class="right"><strong>联系人</strong></td>
    <td>&nbsp;<%=rs("username")%>  <%=rs("qq")%></td>
  </tr>
  <tr>
    <td class="right"><strong>email</strong></td>
    <td>&nbsp;<%=rs("email")%></td>
  </tr>
  <tr>
    <td class="right"><strong>联系电话</strong></td>
    <td>&nbsp;<%=rs("tel")%></td>
  </tr>
  <tr>
    <td class="right"><strong>留言内容</strong></td>
    <td>&nbsp;<%=rs("content")%></td>
  </tr>
  <tr>
    <td class="right"><strong>网站</strong></td>
    <td>&nbsp;<a href="<%=rs("homepage")%>" target="_blank"><%=rs("homepage")%></a></td>
  </tr>

  <tr>
    <td class="right"><strong>留言时间</strong></td>
    <td>&nbsp;<%=rs("addtime")%> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://www.ip.cn/ip.php?q=<%=rs("userip")%>" target="_blank"><%=rs("userip")%></a></td>
  </tr>
  
  <tr>
    <td class="right"><strong>审核</strong></td>
    <td>&nbsp;<label for="ischeck">
        <input <%if rs("ischeck")=true then response.Write("checked=""checked""")%> type="radio" name="ischeck" id="ischeck" value="1" />
      显示</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <label for="nocheck">
        <input <%if rs("ischeck")=false then response.Write("checked=""checked""")%> type="radio" name="ischeck" id="nocheck" value="0" />
     隐藏</label></td>
  </tr>

  <tr>
    <td class="right"><strong>回复</strong></td>
    <td>&nbsp;<textarea id="reply" name="reply" style=" width:400px; height:100px"><%=rs("reply")%></textarea></td>
  </tr>
  
  <tr class="bottom">
    <td width="18%">&nbsp;</td>
    <td width="82%">
    
    <input name="Submit" type="submit" class="button" value=" 保 存 " />
    <input name="id" type="hidden" class="id" value="<%=id%>" />
    <input name="action" type="hidden" class="action" value="save" />
    &nbsp;&nbsp;
    <input name="Submit" type="button" class="button" onclick="history.back()" value=" 返 回 " /></td>
  </tr>
</table>
</form>
<%
	else
		response.Write("信息不存在")
	end if
end sub
%>

</body>
</html>
