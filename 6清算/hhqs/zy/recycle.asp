<!--#include file="check.asp"-->
<!--#include file="../inc/ypage.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交投记录</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
<script src="../js/tips_win/tipswindow.js"></script>
<script src="../js/jquery.min.js"></script>
<script>
function chk_form(){
	var title = document.getElementById("title");
	if (title.value == '') {
		alert('请输入标题');
		title.focus();
		return false;
	}
}
</script>
</head>

<body>

<%
const data_from = "t_recycle"
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
		  Rs("remark") = remark
		  Rs.update
		End If
		Rs.Close
	end if
	
	call jsInfo("",lasturl)
end if

act = request.QueryString("act")
if 	act="points" then
	id = chkNumeric(request.QueryString("id"))
	userid = chkNumeric(request.QueryString("userid"))
	points = chkNumeric(request.QueryString("points"))
	conn.execute("update  "&data_from&" set is_finish=1 where id="&id)
	
	call update_points(points,userid,"物品交投增加积分，编号："&id)
	
end if

dim point_rule(200)
sql = "select id,title,points,classname from t_point_rule"
set rs=conn.execute(sql)
do until rs.eof
	point_rule(rs("id")) = rs("classname")&" - "&rs("title")
	rs.movenext
loop
rs.close
%>

<%
task = reqStr("task","trim")

if task="view" then call view() else call list()
%>

<%sub list()%>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="my_table">

  <tr>
    <td colspan="21" class="header">交投记录</td>
  </tr>
  <tr>
    <td colspan="21">
    <%
	q = trim(request.QueryString("q"))
	istatus = reqStr("istatus","trim")
	%>
    <form method="get" id="sForm">
    搜索：<input type="text" value="<%=q%>" name="q" size="30" />
    
    状态：<%=showSelect("istatus","istatus",",等待确认,已审核,已完成,已撤销",istatus)%>
    
    <input type="submit" class="btn" value=" 搜 索 " />
    </form>
    </td>
  </tr>

  <tr  class="title" align="center">
    <td>地区</td>
    <td>物品</td>
    <td>兑换方式</td>
    <td>积分</td>
    <td>状态</td>
    <td>姓名</td>
    <td>预约时间</td>
    <td>添加时间</td>
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
	if q<>"" then wherestr = wherestr&" and pro_type like '%"&q&"%' ":page_param=page_param&"&q="&server.URLEncode(q)
	if istatus<>"" then wherestr = wherestr&" and status='"&istatus&"' ":page_param=page_param&"&istatus="&istatus
	if orderby<>"" then taxis=" ORDER BY "&orderby&" desc ":page_param=page_param&"&orderby="&orderby
	
	rs_total=getRsTotal(index_id,data_from,wherestr)'记录总数
	if rs_total>0 then sqlid = getSqlID(index_id,maxperpage,data_from,wherestr,taxis)'id字符串
	
	if sqlid<>"" then
		sql="select top "&maxperpage&" "&selectsql&" from "&data_from&" where "&index_id&" in ("& sqlid &") "&taxis
		'response.Write(sql)
		set rs=conn.execute(sql)
		do while not rs.eof
	%>
  <tr onMouseOver="this.className='tr1';" onMouseOut="this.className='tr2';">
    <td><%=rs("area")%></td>
    <td><%=getKeywords(point_rule(chkNumeric(rs("pro_type"))),q)%></td>
    <td><%=replace(rs("pay_type"),"兑换","")%></td>
    <td><%=rs("points")%></td>
    <td><%=rs("status")%></td>
    <td><%=rs("contact")%></td>
    <td><%=rs("due_date")%></td>
    <td><%=rs("addtime")%></td>
    <td>
	<a href="?task=view&id=<%=rs(0)%>">查看</a>
    <%if rs("status")<>"已撤销" then%>

    <%
	if chkNumeric(rs("is_finish"))=0 and rs("pay_type")="兑换积分" and rs("status")="已完成" then
	%> | <a onclick="return confirm('确定要给<%=rs("contact")%>增加<%=rs("points")%>积分吗？');" href="?act=points&points=<%=rs("points")%>&userid=<%=rs("userid")%>&id=<%=rs(0)%>">加分</a><%end if%>
	<%end if%>
    </td>
  </tr>
  <%
  		rs.movenext
	  loop
	  rs.close
  end if
  %><tr>
    <td colspan="21" class="bottom"><% call showPage(maxperpage,rs_total,page_param) %>
</td>
  </tr>
</table> <%end sub%>


<%sub view()
		id=reqStr("id","num")
sql = "select * from "&data_from&" where id="&id
			set rs=conn.execute(sql)
			if not rs.eof then
				title = rs("title")
				area = rs("area")
				contact = rs("contact")
				tel = rs("tel")
				mobile = rs("mobile")
				address = rs("address")
				company = rs("company")
				due_date = rs("due_date")
				due_time = rs("due_time")
				remark = rs("remark")
				pro_type = rs("pro_type")
				pay_type = rs("pay_type")
				isize = rs("size")
				num = rs("num")
				brand = rs("brand")
				content= rs("content")
				istatus = rs("status")
			end if
			rs.close
%>
<form method="post" action="<%=page_url%>">
<table border="0" cellspacing="0" cellpadding="0" class="my_table">
  <tr>
    <td colspan="2" class="header">交投详细</td>
  </tr><tr>
            	<td width="20%" class="left_td">产品类型：</td><td width="80%">
                <%
				sql = "select id,title,points,classname from t_point_rule where id="&chkNumeric(pro_type)
				set rs=conn.execute(sql)
				if not rs.eof then
					response.Write(rs("classname") &" - " & rs("title"))
					
					end if
					rs.close
				%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">数量：</td><td>
                <%=num%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">品牌：</td><td>
                <%=brand%>
                </td>
            </tr>
            <tr class="tbl_sep">
            	<td colspan="2" bgcolor="#EDF7FF">交投人信息</td>
            </tr>
            <tr>
            	<td class="left_td">联系人：</td><td>
                <%=contact%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">手机：</td><td>
                <%=mobile%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">固定电话：</td><td>
                <%=tel%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">所在区域：</td><td>
                <%=area%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">详细地址：</td><td>
                <%=address%>
                </td>
            </tr>
            <tr>
            	<td class="left_td">期望回收日期：</td><td>
                <%=due_date%>
                &nbsp;&nbsp;&nbsp;时间段：
                <%=due_time%></td>
            </tr>
            <tr>
            	<td class="left_td">内容：</td><td><%=content%></td>
            </tr><tr>
            	<td class="left_td">备注：</td><td><textarea name="remark" cols="60" rows="5" class="txt"><%=remark%></textarea>
                </td>
            </tr>
            <tr>
              <td class="left_td">兑换方式：</td>
              <td><%=pay_type%></td>
            </tr>
            <tr>
              <td class="left_td">状态：</td>
              <td id="points_info2"><%=showSelect("istatus","istatus",",等待确认,已审核,已完成,已撤销",istatus)%>&nbsp;</td>
            </tr>
            <tr>
            	<td class="left_td">&nbsp;</td><td id="points_info">
                <input type="hidden" value="<%=request.ServerVariables("HTTP_REFERER")%>" name="lasturl" />
                <input type="hidden" value="<%=id%>" name="id" />
                <input type="hidden" value="save" name="act" />
                <button type="submit"  > 保 存 </button>&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" onclick="history.back()" name="submit" > 返 回 </button>
                </td>
            </tr>
            </table></form>

 <%end sub%>
</body>
</html>
