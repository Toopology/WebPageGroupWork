<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<!--#include file="inc_config.asp"-->
<!--#include file="inc/func.asp"-->
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
	connstr = "Provider=Microsoft.ACE.OLEDB.12.0;Data Source=" & Server.MapPath(conf_sitepath&conf_dbpath) 
	conn.Open connstr
End if
'语言版本
const lang=0
shop_category = split("不限 新奇特产品 数码产品 办公用品 文体用品 配件饰品 生活日用品 汽车用品 现金券"," ")
filter_points = split("不限 1000以下 1001-5000 5000-10000 10001-50000 50000以上"," ")
filter_price = split("不限 300元以下 300-500元 500-1000元 1000-2000元 2000-5000元 5000元以上"," ")
area_shanghai = split("不限 浦东 闵行 徐汇 长宁 普陀 静安 卢湾 黄浦 闸北 虹口 杨浦 宝山 嘉定 青浦 松江 金山 奉贤 南汇 崇明"," ")
recycle_status = split("等待确认,已审核,已完成,已撤销",",")

c_uid = chkNumeric(getCookies("uid"))
c_uname = trim(getCookies("uname"))
c_passwd = trim(getCookies("passwd"))
c_address = trim(getCookies("address"))
c_truename = trim(getCookies("truename"))

c_email = trim(getCookies("email"))
c_mobile = trim(getCookies("mobile"))
c_tel = trim(getCookies("tel"))
c_company = trim(getCookies("company"))


'sub set_points(userid,points)
'	sql = "select points from t_user where id="&userid
'	set rs=conn.execute(sql)
'	if not rs.eof then
'		old_points = rs("points")
'	end if
'	rs.close
'	
'	points = points + chkNumeric(old_points)
'	conn.execute("update t_user set points="&points&" where id="&userid)
'end sub


sub updateHits(table,id,hits)
	conn.execute("update "&table&" set hits="&hits&" where id="&id)
end sub

function getNews(classid,limit,length)
	html = ""
	set rs=conn.execute("select top "&limit&" id,title,addtime from t_article where is_del=0 and classid in ("&classid&") order by id desc")
	do while not rs.eof
		html = html&"<li><a title='"&rs("title")&"' href='view.asp?id="&rs("id")&"'>"&left(rs("title"),length)&"</a></li>"
		rs.movenext
	loop
	rs.close
	getNews = html
end function

function get_content(id)
	id = chkNumeric(id)
	sql = "select * from t_company where id="&id
	set rs=conn.execute(sql)
	if not rs.eof then
		title = rs("title")
		addtime = rs("addtime")
		content = rs("content")
		hits = rs("hits")
		page_title = title
	end if
	
	hits = chkNumeric(hits)
	call updateHits("t_company",id,(hits+1))
	get_content = content
end function

function getNewsDate(classid,limit,length)
	html = ""
	set rs=conn.execute("select top "&limit&" id,title,addtime from t_article where is_del=0 and classid in ("&classid&") order by id desc")
	do while not rs.eof
		html = html&"<li><span class='global_date'>"&format_time(rs("addtime"),2)&"</span><a title='"&rs("title")&"' href='view.asp?id="&rs("id")&"'>"&left(rs("title"),length)&"</a></li>"
		rs.movenext
	loop
	rs.close
	getNewsDate = html
end function


function getProducts(is_supply,limit,length,prefix)
	html = ""
	set rs=conn.execute("select top "&limit&" id,title,addtime from t_products where is_del=0 and is_supply="&is_supply&" order by id desc")
	do while not rs.eof
		html = html&"<li>"&prefix&"<a title='"&rs("title")&"' href='detail.asp?id="&rs("id")&"'>"&left(rs("title"),length)&"</a></li>"
		rs.movenext
	loop
	rs.close
	getProducts = html
end function

function show_level_pic(points)
	if points>=1 and points<=500 then
		show_level_pic = "<img src='img/star.gif' />"
	elseif points>=501 and points<=1000 then
		show_level_pic = "<img src='img/star.gif' /><img src='img/star.gif' />"
	elseif points>=1001 and points<=2000 then
		show_level_pic = "<img src='img/star.gif' /><img src='img/star.gif' /><img src='img/star.gif' />"
	elseif points>=2001 and points<=5000 then
		show_level_pic = "<img src='img/star.gif' /><img src='img/star.gif' /><img src='img/star.gif' /><img src='img/star.gif' />"
	elseif points>=5001 and points<=10000 then
		show_level_pic = "<img src='img/moon.gif' />"
		
	elseif points>=10001 and points<=20000 then
		show_level_pic = "<img src='img/moon.gif' /><img src='img/moon.gif' />"
	elseif points>=20001 and points<=50000 then
		show_level_pic = "<img src='img/moon.gif' /><img src='img/moon.gif' /><img src='img/moon.gif' />"
	elseif points>=50001 and points<=100000 then
		show_level_pic = "<img src='img/sun.gif' />"
	elseif points>=100001 and points<=200000 then
		show_level_pic = "<img src='img/sun.gif' /><img src='img/sun.gif' />"
	elseif points>=200001 and points<=500000 then
		show_level_pic = "<img src='img/sun.gif' /><img src='img/sun.gif' /><img src='img/sun.gif' />"
	
	elseif points>=500001 and points<=1000000 then
		show_level_pic = "<img src='img/sun.gif' /><img src='img/sun.gif' /><img src='img/sun.gif' /><img src='img/sun.gif' />"
	elseif points>=1000001 then
		show_level_pic = "<img src='img/king.jpg' />"
	end if
end function
%>
