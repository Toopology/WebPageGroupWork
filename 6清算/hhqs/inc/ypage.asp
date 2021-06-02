<%
'----------------------------------------------------------------------------------
'分页函数
'----------------------------------------------------------------------------------
function getRsTotal(id,datafrom,wherestr)
	set rs=conn.execute("select count("&id&") from "& datafrom &" "&wherestr&"")
	getRsTotal=rs(0)
	rs.close
end function

function getSqlID(id,maxperpage,datafrom,wherestr,taxis)
	on error resume next
	page = ChkNumeric(request.QueryString("page"))
	set rs=conn.execute("select "&id&" from "& datafrom &" "&wherestr&" " & taxis)
	rs.move(page*maxperpage)
	for i=1 to maxperpage
		if rs.eof then exit for  
		if(i=1)then getSqlID=rs(0) else getSqlID=getSqlID &","&rs(0)
		rs.movenext
	next
	rs.close
end function

sub showPage(Maxperpage,rs_total,wherestr)
	if rs_total="" or Maxperpage="" then exit sub
	page = ChkNumeric(request.QueryString("page"))
	prevpage = 1
	nextpage = 1
	if page=0 then prevpage = 0
	currentpage=page+1
	if rs_total mod Maxperpage = 0 then
		totalpage = (rs_total/Maxperpage)
	else
		totalpage = int(rs_total/Maxperpage)+1
	end if
	if currentpage >= totalpage then
		currentpage = totalpage
		nextpage = 0
	end if
	
    Dim pageContent
    pageContent="<div class='HackBox'></div><div class='page_nav'><div class='page_nav_inner'>"
    pageContent=pageContent&"<span style='float:right;'>"
    pageContent=pageContent&"共"&rs_total&"条 "&maxperpage&"条/页 "&currentpage&"/"&totalpage&""
    pageContent=pageContent&"</span>"
    if prevpage <> 0 then
        pageContent=pageContent&"<a class='prevLink' title='first' href='?page=0"&wherestr&"'>首页</a>"
        pageContent=pageContent&"<a class='prevLink' title='prev' href='?page="&currentpage-2&""&wherestr&"'>上一页</a>"
    end if
    j=0
    for k=4 to 1 step -1
        if currentpage-k>0 then
        j=j+1
         pageContent=pageContent&"<a class='page_link' href='?page="&currentpage-k-1&""&wherestr&"'>"&(currentpage-k)&"</a>" 
        end if
    next
    pageContent=pageContent&"<b><a class='page_link currLink'>"&currentpage&"</a></b>"
    for k=1 to (8-j) step 1
        if currentpage+k<=totalpage then
          pageContent=pageContent&"<a class='page_link' href='?page="&currentpage+k-1&""&wherestr&"'>"&(currentpage+k)&"</a>"
        end if
    next
    if nextpage <> 0 then
        pageContent=pageContent&"<a class='nextLink' title='next' href='?page="&currentpage&""&wherestr&"'>下一页</a>" 
        pageContent=pageContent&"<a class='nextLink' title='last' href='?page="&totalpage-1&""&wherestr&"'>尾页</a>" 
    end if
    pageContent=pageContent&"</div></div>"
    response.Write(pageContent)
end sub
%>