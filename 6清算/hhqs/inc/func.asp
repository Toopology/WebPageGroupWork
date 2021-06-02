<%
Function intval(ByVal CHECK_ID)
	CHECK_ID = left(CHECK_ID,12)
	If CHECK_ID <> "" And IsNumeric(CHECK_ID) Then
		CHECK_ID = CLng(CHECK_ID)
		If CHECK_ID < 0 Then CHECK_ID = 0
	Else
		CHECK_ID = 0
	End If
	intval = CHECK_ID
End Function

function die(msg)
	response.Write(msg)
	connClose
	response.End()
end function

Function ChkNumeric(ByVal CHECK_ID)
	CHECK_ID = left(CHECK_ID,12)
	If CHECK_ID <> "" And IsNumeric(CHECK_ID) Then
		CHECK_ID = CLng(CHECK_ID)
		If CHECK_ID < 0 Then CHECK_ID = 0
	Else
		CHECK_ID = 0
	End If
	ChkNumeric = CHECK_ID
End Function

Function jsInfo(info,url)
	connClose
	if info<>"" then
		response.Write("<script>alert('"&info&"');window.location.href='"&url&"';</script>")
	else
		response.Write("<script>window.location.href='"&url&"';</script>")
	end if
	response.End()
End Function

function reqForm(iname,itype)
	select case itype
		case "num":
			reqForm = ChkNumeric(request.Form(iname))
		case "safe":
			reqForm = Get_SafeStr(request.Form(iname))
		case else:
			reqForm = trim(request.Form(iname))
	end select
end function

function aget(iname)
	aget = trim(request.QueryString(iname))
end function

function apost(iname)
	apost = trim(request.Form(iname))
end function

function reqStr(iname,itype)
	select case itype
		case "num":
			reqStr = ChkNumeric(request.QueryString(iname))
		case "safe":
			reqStr = Get_SafeStr(request.QueryString(iname))
		case else:
			reqStr = trim(request.QueryString(iname))
	end select
end function

function showSelect(iname,id,opt,val)
	if iname<>"" then iname=" name='"&iname&"' "
	if id<>"" then id=" id='"&id&"' "
	opts = split(opt,",")
	for i=0 to ubound(opts)
		iselect = ""
		if val=opts(i) then iselect = "selected"
		showSelect = showSelect&"<option "&iselect&" value='"&opts(i)&"'>"&opts(i)&"</option>"
	next
	showSelect = "<select"&iname&id&">"&showSelect&"</select>"
end function

Public Function RemoveHtml(ByVal Textstr)
	Dim Str,re
	Str = Textstr
	On Error Resume Next
	Set re = New RegExp
	re.IgnoreCase = True
	re.Global = True
	re.Pattern = "<(.[^>]*)>"
	Str = re.Replace(Str, "")
	Set re = Nothing
	Str = replace(Str,vbcrlf,"")
	Str = replace(Str,"　","")
	RemoveHtml=Str
End Function

Function connClose()
	Set rs = Nothing
	Conn.close
	Set conn = Nothing
End Function

Function showError(info)
	connClose
	response.Write(info)
	response.End()
End Function

Function Get_SafeStr(str)
	Get_SafeStr = Replace(Replace(Replace(Trim(str), "'", ""), Chr(34), ""), ";", "")
End Function

Function getCookies(cookiename)
	getCookies = request.Cookies(conf_cookies_name)(cookiename)
	getCookies = Get_SafeStr(getCookies)
End Function

Function clearCookies()
	response.cookies(conf_cookies_name).path="/"
	response.Cookies(conf_cookies_name)=""
End Function

Function setCookies(cname,cvalue)
	if cvalue<>"" and cname<>"" then
		response.cookies(conf_cookies_name).path="/"
		response.Cookies(conf_cookies_name)(cname)=cvalue
	end if
End Function

Function getKeywords(ByVal oldTitle,ByVal Keywords)
	If IsNull(Keywords) = True or Keywords="" Then
		getKeywords = oldTitle
	else
		getKeywords = replace(oldTitle,Keywords,"<font color=red>"&Keywords&"</font>",1,-1,1)
	End If
End Function

Function inHTML(str)
	Dim sTemp
	sTemp = str
	inHTML = ""
	If IsNull(sTemp) = True Then
		Exit Function
	End If
	sTemp = Replace(sTemp, "&", "&amp;")
	sTemp = Replace(sTemp, "<", "&lt;")
	sTemp = Replace(sTemp, ">", "&gt;")
	sTemp = Replace(sTemp, Chr(34), "&quot;")
	inHTML = sTemp
End Function

Function IsSelfRefer()
	Dim sHttp_Referer, sServer_Name
	sHttp_Referer = CStr(Request.ServerVariables("HTTP_REFERER"))
	sServer_Name = CStr(Request.ServerVariables("SERVER_NAME"))
	If Mid(sHttp_Referer, 8, Len(sServer_Name)) = sServer_Name Then
		IsSelfRefer = True
	Else
		IsSelfRefer = False
	End If
End Function

Function Format_Time(s_Time, n_Flag)
	Dim y, m, d, h, mi, s
	Format_Time = ""
	If IsDate(s_Time) = False Then Exit Function
	y = cstr(year(s_Time))
	m = cstr(month(s_Time))
	If len(m) = 1 Then m = "0" & m
	d = cstr(day(s_Time))
	If len(d) = 1 Then d = "0" & d
	h = cstr(hour(s_Time))
	If len(h) = 1 Then h = "0" & h
	mi = cstr(minute(s_Time))
	If len(mi) = 1 Then mi = "0" & mi
	s = cstr(second(s_Time))
	If len(s) = 1 Then s = "0" & s
	Select Case n_Flag
	Case 1
		' yyyy-mm-dd hh:mm:ss
		Format_Time = y & "-" & m & "-" & d & " " & h & ":" & mi & ":" & s
	Case 2
		' yyyy-mm-dd
		Format_Time = y & "-" & m & "-" & d
	Case 3
		' hh:mm:ss
		Format_Time = h & ":" & mi & ":" & s
	Case 4
		' yyyy年mm月dd日
		Format_Time = y & "年" & m & "月" & d & "日"
	Case 5
		' yyyymmdd
		Format_Time = y & m & d & h  & mi  & s
	End Select
End Function

Function outHTML(str)
	Dim sTemp
	sTemp = str
	outHTML = ""
	If IsNull(sTemp) = True Then
		Exit Function
	End If
	sTemp = Replace(sTemp, "&", "&amp;")
	sTemp = Replace(sTemp, "<", "&lt;")
	sTemp = Replace(sTemp, ">", "&gt;")
	sTemp = Replace(sTemp, Chr(34), "&quot;")
	sTemp = Replace(sTemp, Chr(10), "<br/>")
	outHTML = sTemp
End Function

Function InterceptString(txt,length)
	txt=trim(txt)
	x = len(txt)
	y = 0
	if x >= 1 then
	for ii = 1 to x
	if asc(mid(txt,ii,1)) < 0 or asc(mid(txt,ii,1)) >255 then '如果是汉字
	y = y + 2
	else
	y = y + 1
	end if
	if y >= length then 
	txt = left(trim(txt),ii) '字符串限长
	exit for
	end if
	next
	InterceptString = txt
	else
	InterceptString = ""
	end if
End Function 

Function getIP() 
	 dim strIP,IP_Ary,strIP_list
	 strIP_list=Replace(Request.ServerVariables("HTTP_X_FORWARDED_FOR"),"'","")
	 
	 If InStr(strIP_list,",")<>0 Then
		IP_Ary = Split(strIP_list,",")
		strIP = IP_Ary(0)
	 Else
		strIP = strIP_list
	 End IF
	 
	 If strIP=Empty Then strIP=Replace(Request.ServerVariables("REMOTE_ADDR"),"'","")
	 getIP=strIP
End Function

Function HTMLEncode(ByVal reString) 
	Dim Str:Str=reString
	If Not IsNull(Str) Then
   		Str = Replace(Str, ">", "&gt;")
		Str = Replace(Str, "<", "&lt;")
	    Str = Replace(Str, CHR(9), "&#160;&#160;&#160;&#160;")
	    Str = Replace(Str, CHR(32), "&nbsp;")
	    Str = Replace(Str, CHR(39), "&#39;")
    	Str = Replace(Str, CHR(34), "&quot;")
		Str = Replace(Str, CHR(13), "<br/>")
		HTMLEncode = Str
	End If
End Function
'=================================================
'函数名：isInteger
'作  用：判断数字是否整型
'参  数：para ----参数
'=================================================
Public Function isInteger(ByVal para)
	On Error Resume Next
	Dim str
	Dim l, i
	If IsNull(para) Then
		isInteger = False
		Exit Function
	End If
	str = CStr(para)
	If Trim(str) = "" Then
		isInteger = False
		Exit Function
	End If
	l = Len(str)
	For i = 1 To l
		If Mid(str, i, 1) > "9" Or Mid(str, i, 1) < "0" Then
			isInteger = False
			Exit Function
		End If
	Next
	isInteger = True
	If Err.Number <> 0 Then Err.Clear
End Function

'================================================
'函数名：IsValidChar
'作  用：判断字符串中是否含有非法字符和中文
'参  数：str   ----原字符串
'返回值：False,True -----布尔值
'================================================
Public Function IsValidChar(ByVal str)
	IsValidChar = False
	On Error Resume Next
	
	If IsNull(str) Then Exit Function
	If Trim(str) = Empty Then Exit Function
	Dim ValidStr
	Dim i, l, s, c
	
	ValidStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZ.-_:~\/0123456789"
	l = Len(str)
	s = UCase(str)
	For i = 1 To l
		c = Mid(s, i, 1)
		If InStr(ValidStr, c) = 0 Then
			IsValidChar = False
			Exit Function
		End If
	Next
	IsValidChar = True
End Function


'================================================
'函数名：CheckInfuse
'作  用：防止SQL注入
'参  数：str   ----原字符串
'        strLen  ----提交字符串长度
'================================================
Public Function CheckInfuse(ByVal str, ByVal strLen)
	Dim strUnsafe, arrUnsafe
	Dim i
	
	If Trim(str) = "" Then
		CheckInfuse = ""
		Exit Function
	End If
	str = Left(str, strLen)
	
	On Error Resume Next
	strUnsafe = "'|^|;|and|exec|insert|select|delete|update|count|*|%|chr|mid|master|truncate|char|declare"
	If Trim(str) <> "" Then
		If Len(str) > strLen Then
			Response.Write "<Script Language=JavaScript>alert('您提交的字符数超过了限制！');history.back(-1)</Script>"
			CheckInfuse = ""
			Response.End
		End If
		arrUnsafe = Split(strUnsafe, "|")
		For i = 0 To UBound(arrUnsafe)
			If InStr(1, str, arrUnsafe(i), 1) > 0 Then
				Response.Write "<Script Language=JavaScript>alert('请不要在参数中包含非法字符！');history.back(-1)</Script>"
				CheckInfuse = ""
				Response.End
			End If
		Next
	End If
	CheckInfuse = Trim(str)
	Exit Function
	If Err.Number <> 0 Then
		Err.Clear
		Response.Write "<Script Language=JavaScript>alert('请不要在参数中包含非法字符！');history.back(-1)</Script>"
		CheckInfuse = ""
		Response.End
	End If
End Function

Function BBCode(ByVal strContent)
	If isEmpty(strContent) Or isNull(strContent) Then
        Exit Function
	Else
		Dim re
		Set re=new RegExp
		re.IgnoreCase =True
		re.Global=True
		re.Pattern="(\{)([a-z]*)(([0-9]*))(\})"
		Set strMatchs=re.Execute(strContent)
		For Each strMatch in strMatchs
			tmpStr1=(strMatch.SubMatches(1))
			tmpStr2=(strMatch.SubMatches(2))
			strContent=replace(strContent,strMatch.Value,"<img src=""img/em/"&tmpStr1&"/"&tmpStr2&".gif"" border=""0"" />",1,-1,0)
		Next
		Set re=Nothing
		BBCode=strContent
	end if
End Function


'---------------------------------------------------
' 生成静态文件
'---------------------------------------------------
Function creatHtml(str,filepath)
	'on error resume next
	call DoCreateNewDir(filepath)
	'response.Write(filepath)
	Set objStream = Server.CreateObject("ADODB.Stream")   
	With objStream   
		.Open   
		.Charset = "utf-8"   
		.Position = objStream.Size   
		.WriteText = str   
		.SaveToFile server.mappath(filepath),2     
		.Close   
	End With   
	Set objStream = Nothing
End Function

'---------------------------------------------------
' 删除文件
'---------------------------------------------------
Function delFile(filepath)
	'on error resume next
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
	if objFSO.fileExists(Server.MapPath(filepath)) then '判断文件是否存在
		objFSO.DeleteFile(Server.MapPath(filepath)) '删除文件
	end if
	set objFSO=nothing	
End Function
'---------------------------------------------------
' 移动文件
'---------------------------------------------------
Function moveFile(path1,path2)
	'on error resume next
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
	if objFSO.fileExists(Server.MapPath(path1)) then '判断文件是否存在
		 objFSO.MoveFile (Server.MapPath(path1)),(Server.MapPath(path2))
	end if
	set objFSO=nothing	
End Function
'---------------------------------------------------
' 获取文件内容
'---------------------------------------------------
Function getContent(urlid)
	randomize Timer
	Set xml = Server.CreateObject("Microsoft.XMLHTTP")
	if left(urlid,4)<>"http" then urlid = "http://"&request.ServerVariables("HTTP_HOST")&"/"&urlid
	'xml.Open "GET", "http://"&request.ServerVariables("HTTP_HOST")&"/"&urlid&"rnd="&int(100000*rnd), False
	xml.Open "GET", urlid, False
	xml.Send  
	BodyText=xml.ResponseBody
	BodyText=BytesToBstr(BodyText,"utf-8")
	Set xml = Nothing
	getContent=BodyText
End Function

'---------------------------------------------------
'使用Adodb.Stream处理二进制数据
'---------------------------------------------------
Function BytesToBstr(strBody,CodeBase)
	dim objStream
	set objStream = Server.CreateObject("Adodb.Stream")
	objStream.Type = 1
	objStream.Mode =3
	objStream.Open
	objStream.Write strBody
	objStream.Position = 0
	objStream.Type = 2
	objStream.Charset = CodeBase
	BytesToBstr = objStream.ReadText 
	objStream.Close
	set objStream = nothing
End Function

'---------------------------------------------------
'创建路径
'---------------------------------------------------
Sub DoCreateNewDir(sUploadDir)
	' Automatically Create Directory is not available in trial version.
	dim arrPath,strTmpPath,intRow
	strTmpPath = ""
	arrPath = Split(sUploadDir, "/") 
	Dim oFSO
	Set oFSO = Server.CreateObject( "Scripting.FileSystemObject" )
	for intRow = 0 to Ubound(arrPath)-1
		strTmpPath = strTmpPath & arrPath(intRow) & "/"
		if instr(strTmpPath,".") then exit for
		if oFSO.folderExists(Server.MapPath(strTmpPath))=false then
			oFSO.CreateFolder(Server.MapPath(strTmpPath))
		end if
	next
	Set oFSO = nothing	
End Sub

'-------------------------------------------------
'函数名称:ReadTextFile
'作用:利用AdoDb.Stream对象来读取UTF-8格式的文本文件
'----------------------------------------------------
Function ReadFromTextFile (FileUrl,CharSet)
    dim str
    set stm=server.CreateObject("adodb.stream")
     stm.Type=2 '以本模式读取
     stm.mode=3 
     stm.charset=CharSet
     stm.open
     stm.loadfromfile server.MapPath(FileUrl)
     str=stm.readtext
     stm.Close
    set stm=nothing
     ReadFromTextFile=str
End Function
'-------------------------------------------------
'函数名称:WriteToTextFile
'作用:利用AdoDb.Stream对象来写入UTF-8格式的文本文件
'----------------------------------------------------
Sub WriteToTextFile (FileUrl,byval Str,CharSet) 
    set stm=server.CreateObject("adodb.stream")
     stm.Type=2 '以本模式读取
     stm.mode=3
     stm.charset=CharSet
     stm.open
     stm.WriteText str
     stm.SaveToFile server.MapPath(FileUrl),2 
     stm.flush
     stm.Close
    set stm=nothing
End Sub


sub insert_elog(ievent,points,userid,remark,new_points)
	addtime = now()
	userip = getip()

	Set Rs = Server.CreateObject("ADODB.Recordset")
	SQL = "SELECT * FROM t_elog WHERE 1=0 "
	Rs.Open SQL,Conn,1,3
	Rs.Addnew
		Rs("event") = ievent
		Rs("points") = points
		Rs("addtime") = addtime
		Rs("userip") = userip
		Rs("userid") = userid
		Rs("remark") = remark
		Rs("total_points") = new_points
	Rs.update
	Rs.Close
end sub

sub update_points(points,id,remark)

	id = chkNumeric(id)
	if id=0 then exit sub
	
	sql = "select points from t_user where  id="&id
	set rs=conn.execute(sql)
	if not rs.eof then
		old_points = rs("points")
	end if
	
	new_points = points + chkNumeric(old_points)
	conn.execute("update t_user set points="&new_points&" where id="&id)
	
	call insert_elog("score",points,id,remark,new_points)
end sub

%>