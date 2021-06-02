<!--#include file="inc_conn.asp"-->
<%
page_title = "在线应征"
act = Get_SafeStr(request.QueryString("act"))
if act="" then act="add"
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=conf_sitename%></title>
<link href="main.css" rel="stylesheet" type="text/css" />
<link href="inc/ypage.css" rel="stylesheet" type="text/css" />
<script>
function checkForm(){
	var title = document.getElementById("title");	
	var content = document.getElementById("content");	
	var username = document.getElementById("username");	
	var email = document.getElementById("email");	
	
	if (title.value == "") {
		alert("请输入主题");
		title.focus();
		return false;
	}
	if (content.value == "") {
		alert("请输入简历内容");
		content.focus();
		return false;
	}
	if (username.value == "") {
		alert("请输入您的称呼");
		username.focus();
		return false;
	}
	if (email.value == "") {
		alert("请输入您的电子邮件");
		email.focus();
		return false;
	}
}
</script>
</head>

<body>
<%
action=trim(request.Form("act"))
if action="save" then

	title=Get_SafeStr(request.Form("title"))
	username=Get_SafeStr(request.Form("username"))
	email=Get_SafeStr(request.Form("email"))
	homepage=Get_SafeStr(request.Form("homepage"))
	
	address=Get_SafeStr(request.Form("address"))
	tel = Get_SafeStr(request.Form("tel"))
	company = Get_SafeStr(request.Form("company"))
	content = Get_SafeStr(request.Form("content"))
	
	addtime = now()
	userip = getIP()
	ischeck = 0
	language = 1
	
	if content<>"" and  userip<>"" then
		Set Rs = Server.CreateObject("ADODB.Recordset")
		SQL = "select * from t_feedback where (id is null)"
		Rs.Open SQL,Conn,1,3
		Rs.Addnew
		  Rs("title") = title
		  Rs("content") = content
		  Rs("email") = email
		  Rs("homepage") = homepage
		  Rs("tel") = tel
		  Rs("qq") = qq
		  Rs("username") = username
		  Rs("addtime") = addtime
		  Rs("retime") = addtime
		  Rs("userip") = userip
		  Rs("address") = address
		  Rs("language") = language
		  Rs("company") = company
		  Rs("ischeck") = ischeck
		  Rs("userid") = c_uid
		Rs.update
		Rs.Close
	end if
	Response.Write("<script>alert('感谢您的支持，我们会尽快和您联系。');location='hr.asp';</script>")
	response.End()
	
end if
%>
<!--#include file="inc_top.asp"-->

    <div id="main_body">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div class="right_body" style="font-size:12px; line-height:2em">
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
            <div>


            
            <div class="body">
				<div style="padding:1em 2em; line-height:2em">
                        <%
						if act="add" then call add() else call list()
						
						sub add()
						%>
                        <div style="border:1px solid #DDD; padding:1em; background:#FFF">
                        	<strong>亲爱的朋友：</strong><br/>
                            　　如果您想加入我们，请把您的个人信息留言给我们，我们会尽快与你们取得联系。<br/>
                        </div>
                        
                        <form method="post" name="form1111" action="" onsubmit="return checkForm();">
                        <ul id="addBook">
                        	<li>
                            	<span>主　　题：</span>
                                <input class="txt" type="text" name="title" id="title" value="<%=request.QueryString("title")%>" size="35" maxlength="100"> *
                            </li>
                            
                        	
                            
                            
                        	<li>
                            	<span>您的称呼：</span>
                                <input value="<%=c_truename%>" class="txt" type="text" name="username" id="username" size="35" maxlength="100"> *
                            </li>
                            
                        	<li>
                            	<span>E-mail：</span>
                                <input value="<%=c_email%>" class="txt" type="text" name="email" id="email" size="35" maxlength="100"> *
                            </li>
                            
                        	<li>
                            	<span>公司名称：</span>
                                <input value="<%=c_company%>" class="txt" type="text" name="company" id="company" size="35" maxlength="100">
                            </li>

                        	<li>
                            	<span>联系地址：</span>
                                <input value="<%=c_address%>" class="txt" type="text" name="address" id="address" size="35" maxlength="100">
                            </li>
                        	<li>
                            	<span>联系电话：</span>
                                <input value="<%=c_mobile%>" class="txt" type="text" name="tel" id="tel" size="35" maxlength="100">
                            </li>
                            
                            <li>
                            	<span>个人简历：</span>
                                <textarea class="txt" name="content" id="content" style="width:80%" cols="50" rows="8"></textarea> 
                                *
                      </li>
                            
                        	<li>
                            	<span>&nbsp;</span>
                                <input type="submit" class="input_but" value="提 交">
                                <input name="act" type="hidden" id="act" value="save">
                                <input type="button" class="input_but" onclick="history.back();" value="返 回">
                            </li>
                        </ul>
                        </form>
                        <%end sub%>
                        
                        <%
						sub list()
						%>
                        <ul class="book_list">
          
            
              <%
                    const datafrom = "t_feedback"
                    const selectsql = "*"
                    const taxis = " order by id desc"
                    
                    'select top 20 id,title,addtime from t_news order by addtime desc
                    
        
                    wherestr=" where ischeck=true "
    
                    
                    sql="select count(id) from ["& datafrom &"] "&wherestr&""
                    set rs=server.createobject("adodb.recordset")
                    rs.open sql,conn,0,1
                    rs_total=rs(0)
                    rs.close
                    
                    ii=1
                    maxperpage=6
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
    
            		<li>
                        <div class="content">
                        	<div class="title">
                            	<span><%=format_time(rs("addtime"),2)%></span>
                                <strong><%=rs("username")%></strong> 说： <%=rs("title")%>
                            </div>
                            <div style="text-indent:2em; line-height:28px">
                            	<%=rs("content")%>
                                <%if rs("reply")<>"" then%>
                                <div class="book_reply"><strong>管理员回复：</strong><%=rs("reply")%> (<%=rs("retime")%>)</div>
                                <%end if%>
                            </div>
                        </div>
                        <div class="HackBox"></div>
                    </li>
                    <%
                        i=i+1
                        rs.movenext
                    loop
                    rs.close
                    end if
                    
                    wherestr=""
                    wherestr="act=view&"
                    %>
                    
                    </ul>
                    
                    
                    <div style="width:100%; clear:both;"><!--border--></div>
                    
                    <div class="pageNav">
                              <div style="float:left;">
                              <%if prevpage <> 0 then%> 
                              <a class="prevLink" href="?<%=wherestr%>page=<%=page/Maxperpage-1%>">上一页</a> 
                              <%end if%>
                              <%j=0
                              for k=4 to 1 step -1
                              if currentpage-k>0 then
                              j=j+1
                              %>
                              <a class="page_link" href="?<%=wherestr%>page=<%=currentpage-k-1%>"><%=(currentpage-k)%></a> 
                              <%end if
                              next%>
                              <b><a class="page_link currLink"><%=currentpage%></a></b> 
                              <%for k=1 to (8-j) step 1
                              if currentpage+k<=totalpage then
                              %>
                              <a class="page_link" href="?<%=wherestr%>page=<%=currentpage+k-1%>"><%=(currentpage+k)%></a> 
                              <%end if
                              next%>
                              <%if nextpage <> 0 then%>
                              <a class="nextLink" href="?<%=wherestr%>page=<%=page/Maxperpage+1%>">下一页</a> 
                              <%end if%>
                              </div>
                              <div style="float:right;">
                              第 <%=currentpage%>／<%=totalpage%> 页
                              每页 <%=maxperpage%>
                              总计 <%=rs_total%>
                              </div>
                              </div>
         
                    
                        <%end sub%>
                
              </div>
            </div>
            
        </div>
            
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
</body>
</html>