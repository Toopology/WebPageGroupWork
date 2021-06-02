<%
'---------------------------------------------------
' 生成静态文件
'---------------------------------------------------
Function creatHtml(byval str,filepath)
	call DoCreateNewDir(filepath)
	'response.Write(filepath):response.End()
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
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
	if objFSO.fileExists(Server.MapPath(filepath)) then '判断文件是否存在
		objFSO.DeleteFile(Server.MapPath(filepath)) '删除文件
	end if
	set objFSO=nothing	
End Function

'---------------------------------------------------
' 获取文件内容
'---------------------------------------------------
function getHTTPPage(url)
    dim Http,rnd_num
	set Http=server.createobject("MSXML2.ServerXMLHTTP")
	Http.setTimeouts 10000,10000,10000,80000
	Http.open "GET",url,false
	Http.setRequestHeader "User-Agent", "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
	Http.setRequestHeader "Referer", url
    Http.send()
    if Http.readystate <> 4 then Http.waitForResponse 30000
    getHTTPPage=bytesToBSTR(Http.responseBody,"utf-8")
    set http=nothing
end function

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
		'response.Write(strTmpPath&"<hr/>")
		'if instr(strTmpPath,".")<0 then
			if oFSO.folderExists(Server.MapPath(strTmpPath))=false then
				oFSO.CreateFolder(Server.MapPath(strTmpPath))
			end if
		'end if
	next
	Set oFSO = nothing	
End Sub

'函数名称:readfromtextfile   
'函数功能:利用adodb.stream对象来读取utf-8格式的文本文件   
function readfromtextfile(fileurl,char)  
	'on error resume next
    dim str   
    set stm=server.createobject("ado"&"db.str"&"eam")   
    stm.type=2   
    stm.mode=3   
    stm.charset=char   
    stm.open   
    stm.loadfromfile server.mappath(fileurl)   
    str=stm.readtext   
    stm.close   
    set stm=nothing   
    readfromtextfile=str   
end function   

'函数名称:writetotextfile   
'函数功能:利用adodb.stream对象来写入utf-8格式的文本文件   
sub writetotextfile(filepath,byval str,char) 
	'on error resume next
	call DoCreateNewDir(filepath)  
    set stm=server.createobject("ado"&"db.str"&"eam")   
    stm.type=2   
    stm.mode=3   
    stm.charset=char   
    stm.open   
    stm.writetext str   
    stm.savetofile server.mappath(filepath),2   
    'response.write "生成完成"   
    stm.flush   
    stm.close   
    set stm=nothing   
end sub  
%>