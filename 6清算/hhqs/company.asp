<!--#include file="inc_conn.asp"--><%
id = reqStr("id","num")
if id=0 then id = 1
page_title = "公司介绍"


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

%><!--#include file="page.asp"-->