<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>订单管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>
<%
const data_from = "t_order"


page_url = request.ServerVariables("SCRIPT_NAME")
act = request.Form("act")
if act="save" then

	id = chkNumeric(request.Form("id"))
	lasturl = trim(request.Form("lasturl"))
	istatus = reqForm("istatus","trim")
	remark = reqForm("remark","trim")

	addtime = now()
	if id>0 then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "SELECT TOP 1 * FROM "&data_from&" WHERE id="&id
		Rs.Open SQL,Conn,1,3
		If Not Rs.Eof Then
		  Rs("status") = istatus
		  Rs.update
		End If
		Rs.Close
	end if
	
	call jsInfo("",lasturl)
end if


Action = LCase(Request("action"))


if 	action="del" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("update  "&data_from&" set status='已撤销' where id="&id)
	
	userid = reqStr("userid","num")
	pro_id = reqStr("pro_id","num")
	
	set rs=conn.execute("select top 1 * from t_gifts where id="&pro_id)
	if not rs.eof then
		points = rs("points")
	end if
	rs.close
	
	'call update_points(chkNumeric(points),userid,"订单撤销增加积分，订单编号："&id)
	
elseif 	action="confirm" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("update  "&data_from&" set status='已审核' where id="&id)
	
elseif 	action="finish" then
	id = chkNumeric(request.QueryString("id"))
	conn.execute("update  "&data_from&" set status='已完成' where id="&id)
end if

Select Case Trim(Action)
	Case "view"
		Call view
	Case Else
		Call list
End Select



sub list()
%>


<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="20" class="header">在线订单</td>
  </tr><tr>
    <td colspan="21">
    <%
	q = trim(request.QueryString("q"))
	istatus = reqStr("istatus","trim")
	%>
    <form method="get" id="sForm">
    电话号码：<input type="text" value="<%=q%>" name="q" size="30" />
    
    状态：<%=showSelect("istatus","istatus",",等待确认,已审核,已完成,已撤销",istatus)%>
    
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>
  <tr class="title">
    <td>商品</td>
    <td>联系人</td>
    <td>电话</td>
    <td>地址</td>
    <td>状态</td>
    <td>下单时间</td>
    <td>操作</td>
  </tr>
  <%
	'------------------------------------------------分页显示开始
	taxis = " order by id desc"
	selectsql = "*"
	index_id = "id"
	maxperpage=10 
	
	'-----------搜索条件
	orderby = request.QueryString("orderby")
	wherestr = "where 1=1 ":page_param = ""
	wherestr = wherestr&"":page_param=page_param&""
	if q<>"" then wherestr = wherestr&" and tel like '%"&q&"%' ":page_param=page_param&"&q="&server.URLEncode(q)
	if orderby<>"" then taxis=" ORDER BY "&orderby&" desc ":page_param=page_param&"&orderby="&orderby
		if istatus<>"" then wherestr = wherestr&" and status='"&istatus&"' ":page_param=page_param&"&istatus="&istatus

	rs_total=getRsTotal(index_id,data_from,wherestr)'记录总数
	if rs_total>0 then sqlid = getSqlID(index_id,maxperpage,data_from,wherestr,taxis)'id字符串
	
	if sqlid<>"" then
		sql="select top "&maxperpage&" "&selectsql&" from "&data_from&" where "&index_id&" in ("& sqlid &") "&taxis
		'response.Write(sql)
		set rs=conn.execute(sql)
		do while not rs.eof
	%>
  
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("title")%>&nbsp;</td>
    <td>&nbsp;<%=rs("contact")%></td>
    <td>&nbsp;<%=rs("tel")%></td>
    <td>&nbsp;<%=rs("address")%></td>
    <td>&nbsp;<%=rs("status")%></td>
    <td>&nbsp;<%=rs("addtime")%></td>
    <td align="center"><a href="order.asp?action=view&id=<%=rs("id")%>">查看</a>
	<%if rs("status")<>"已完成" and  rs("status")<>"已撤销" then%> | 
    <a onclick="return confirm('是否撤销？撤销后不能恢复，也不会退还积分！');" href="?action=del&id=<%=rs(0)%>&userid=<%=rs("userid")%>&pro_id=<%=rs("pro_id")%>">撤销</a>
	<%end if%></td>
  </tr>
  <%
					i=i+1
					rs.movenext
				loop
				rs.close
				end if
				if class1<>"" then wherestr="c="&class1&"&"
  %>
  <tr>
    <td colspan="20">
    	<%call showPage(maxperpage,rs_total,page_param)%>
    </td>
  </tr>
</table>
<%end sub

sub view()
	id=request.QueryString("id")
	set rs=conn.execute("select top 1 * from t_order where id="&id)
	if not rs.eof then
%><form method="post" action="<%=page_url%>">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">订单详情</td>
  </tr>
  <tr>
    <td width="20%" class="right"><strong>商品</strong></td>
    <td width="80%">&nbsp;<%=rs("title")%></td>
  </tr>

  <tr>
    <td class="right"><strong>订购数量</strong></td>
    <td>&nbsp;<%=rs("num")%></td>
  </tr>
  <tr>
    <td class="right"><strong>地址</strong></td>
    <td>&nbsp;<%=rs("Address")%></td>
  </tr>
  <tr>
    <td class="right"><strong>联系人</strong></td>
    <td>&nbsp;<%=rs("Contact")%></td>
  </tr>
  <tr>
    <td class="right"><strong>电话</strong></td>
    <td>&nbsp; <%=rs("TEL")%></td>
  </tr>
  <tr>
    <td class="right"><strong>邮件</strong></td>
    <td>&nbsp;<%=rs("Email")%></td>
  </tr>
  <tr>
    <td class="right"><strong>状态</strong></td>
    <td>&nbsp;<%=rs("status")%></td>
  </tr>
  <tr>
    <td class="right"><strong>订单生成时间</strong></td>
    <td>&nbsp;<%=rs("addtime")%></td>
  </tr>
  <tr>
    <td class="right"><strong>用户IP</strong></td>
    <td>&nbsp; <a href="http://www.ip.cn/ip.php?q=<%=rs("userip")%>" target="_blank"><%=rs("userip")%></a></td>
  </tr>
  <tr>
              <td class="right"><strong>状态：</strong></td>
              <td id="points_info2">
			  <%if rs("status") = "已撤销" then%>已撤销<%else%>
			  <%=showSelect("istatus","istatus",",等待确认,已审核,已完成",rs("status"))%>
              <%end if%>
              &nbsp;</td>
            </tr>
            <tr class="bottom">
            	<td class="right">&nbsp;</td><td id="points_info">
                <input type="hidden" value="<%=request.ServerVariables("HTTP_REFERER")%>" name="lasturl" />
                <input type="hidden" value="<%=id%>" name="id" />
                <input type="hidden" value="save" name="act" />
                <button type="submit"  > 保 存 </button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" onclick="history.back()" name="submit" > 返 回 </button>
                </td>
            </tr>
</table></form>
<%
	else
		response.Write("不存在该订单。")
	end if
end sub
%>

</body>
</html>
