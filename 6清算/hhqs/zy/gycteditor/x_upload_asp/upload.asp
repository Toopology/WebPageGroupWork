<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%
'OPTION EXPLICIT
session.CodePage = 65001
Server.ScriptTimeOut=5000
on error resume next
%>
<!--#include file="uploadclass.asp"-->
<%
dim request2,upload_path,show_path
upload_path = "../../../upfile/"&Year(Date()) &"_"& Month(Date()) &"/"
show_path = "../upfile/"&Year(Date()) &"_"& Month(Date()) &"/"
call DoCreateNewDir(upload_path)

'建立上传对象
set request2=New UpLoadClass

'设置字符集
request2.Charset="utf-8"
request2.SavePath = upload_path
request2.FileType="gif/jpg/jpeg/png/doc/xls/ppt/rar"
request2.MaxSize=500000
request2.AutoSave=0
'打开对象
request2.Open()
	
Dim myError(10)
	myError(0) = "上传成功。"
	myError(1) = "上传生效，但有一些文件因大于 'MaxSize' 而未被保存。"
	myError(2) = "上传生效，但有一些文件因不匹配 'FileType' 而未被保存。"
	myError(3) = "上传生效，但有一些文件因大于 'MaxSize' 并且不匹配 'FileType' 而未被保存。"
	myError(4) = "异常，不存在上传。"
	myError(5) = "上传已经取消，请检查总上载数据是否小于 'TotalSize' 。"

	Response.AddHeader "Content-Type", "text/html; charset=UTF-8"
	if request2.error<>0 then
		'Response.Write("发生错误："&myError(request2.error)&"")
		Response.Write("{""error"":1,""message"":"""&myError(request2.error)&"""}")
	else
		'--------------------缩略图处理-----------------------------------
		Set Jpeg = Server.CreateObject("Persits.Jpeg") '调用组件 
		Path = Server.MapPath(request2.SavePath&request2.Form("imgFile")) '待处理图片路径 
		Jpeg.Open Path '打开图片 
		'高与宽为原图片的1/2 
		'Jpeg.Width = Jpeg.OriginalWidth / 10 
		'Jpeg.Height = Jpeg.OriginalHeight / 10
		if ((Jpeg.OriginalWidth/Jpeg.OriginalHeight) > (request2.Form("w")/request2.Form("h"))) then
			Jpeg.Height = request2.Form("h") 
			Jpeg.Width = cint(Jpeg.OriginalWidth*(request2.Form("h")/Jpeg.OriginalHeight))
		else
			Jpeg.Width = request2.Form("w") 
			Jpeg.Height = cint(Jpeg.OriginalHeight*(request2.Form("w")/Jpeg.OriginalWidth))
		end if
		jpeg.crop 0,0,request2.Form("w") ,request2.Form("h")  '开始切割其实是把超过52象素的下部分去掉 
		'保存图片 
		Jpeg.Save Server.MapPath(request2.SavePath&request2.Form("imgFile"))
		Set Jpeg = nothing	
		'--------------------缩略图处理-----------------------------------

		'显示目标文件路径与名称
		'Response.Write("上传成功：<a target='_blank' href='"&request2.SavePath&request2.Form("imgFile")&"'>"&request2.SavePath&request2.Form("imgFile")&"</a> ")
		'Response.Write "[<a href=""javascript:history.back();"">返回</a>]"
		'Response.Write "<script>parent.document.all('preview').value='"&show_path&request2.Form("imgFile")&"';<"
		'Response.Write "/script>"
		Response.Write("{""error"":0,""url"":"""&show_path&request2.Form("imgFile")&"""}")
	end if
	
'释放上传对象
set request2=nothing

Sub DoCreateNewDir(sUploadDir)
	' Automatically Create Directory is not available in trial version.
	dim arrPath,strTmpPath,intRow
	strTmpPath = ""
	arrPath = Split(sUploadDir, "/") 
	Dim oFSO
	Set oFSO = Server.CreateObject( "Scripting.FileSystemObject" )
	for intRow = 0 to Ubound(arrPath)-1
		strTmpPath = strTmpPath & arrPath(intRow) & "/"
		if oFSO.folderExists(Server.MapPath(strTmpPath))=false then
			oFSO.CreateFolder(Server.MapPath(strTmpPath))
		end if
	next
	Set oFSO = nothing	
End Sub


Sub DoRemote()
	Dim sContent, i
	For i = 1 To Request.Form("eWebEditor_UploadText").Count 
		sContent = sContent & Request.Form("eWebEditor_UploadText")(i) 
	Next
	If sAllowExt <> "" Then
		sContent = ReplaceRemoteUrl(sContent, sAllowExt)
	End If

	Response.Write "<HTML><HEAD><TITLE>远程上传</TITLE><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><body>" & _
		"<input type=hidden id=UploadText value=""" & inHTML(sContent) & """>" & _
		"</body></html>"

	Call OutScriptNoBack("parent.setHTML(UploadText.value);try{parent.addUploadFile('" & sOriginalFileName & "', '" & sSaveFileName & "', '" & sPathFileName & "');} catch(e){} parent.remoteUploadOK();")

End Sub

'================================================
'作  用：替换字符串中的远程文件为本地文件并保存远程文件
'参  数：
'	sHTML		: 要替换的字符串
'	sExt		: 执行替换的扩展名
'================================================
Function ReplaceRemoteUrl(sHTML, sExt)
	' ---------------------------------------------------------------
	'Const IsOpenAutoSave = 1
	'If IsOpenAutoSave = 1 Then Exit Function
	' ---------------------------------------------------------------
	Dim s_Content
	s_Content = sHTML
	If IsObjInstalled("Microsoft.XMLHTTP") = False then
		ReplaceRemoteUrl = s_Content
		Exit Function
	End If
	
	Dim re, RemoteFile, RemoteFileurl, SaveFileName, SaveFileType
	Set re = new RegExp
	re.IgnoreCase  = True
	re.Global = True
	re.Pattern = "((http|https|ftp|rtsp|mms):(\/\/|\\\\){1}(([A-Za-z0-9_-])+[.]){1,}(([A-Za-z0-9_-])+[.]){1,}(net|com|cn|org|cc|tv|[0-9]{1,3})([^ \f\n\r\t\v\""\'\>]*\/)(([^ \f\n\r\t\v\""\'\>])+[.]{1}(" & sExt & ")))"

	Set RemoteFile = re.Execute(s_Content)
	Dim a_RemoteUrl(), n, i, bRepeat
	n = 0
	' to no repeat array 转入无重复数据
	For Each RemoteFileurl in RemoteFile
		If n = 0 Then
			n = n + 1
			Redim a_RemoteUrl(n)
			a_RemoteUrl(n) = RemoteFileurl
		Else
			bRepeat = False
			For i = 1 To UBound(a_RemoteUrl)
				If UCase(RemoteFileurl) = UCase(a_RemoteUrl(i)) Then
					bRepeat = True
					Exit For
				End If
			Next
			If bRepeat = False Then
				n = n + 1
				Redim Preserve a_RemoteUrl(n)
				a_RemoteUrl(n) = RemoteFileurl
			End If
		End If		
	Next
	' 开始替换操作
	nFileNum = 0
	For i = 1 To n
		SaveFileType = Mid(a_RemoteUrl(i), InstrRev(a_RemoteUrl(i), ".") + 1)
		SaveFileName = GetRndFileName(SaveFileType)
		If SaveRemoteFile(SaveFileName, a_RemoteUrl(i)) = True Then
			nFileNum = nFileNum + 1
			If nFileNum > 0 Then
				sOriginalFileName = sOriginalFileName & "|"
				sSaveFileName = sSaveFileName & "|"
				sPathFileName = sPathFileName & "|"
			End If
			sOriginalFileName = sOriginalFileName & Mid(a_RemoteUrl(i), InstrRev(a_RemoteUrl(i), "/") + 1)
			sSaveFileName = sSaveFileName & SaveFileName
			sPathFileName = sPathFileName & sContentPath & SaveFileName
			s_Content = Replace(s_Content, a_RemoteUrl(i), sContentPath & SaveFileName, 1, -1, 1)
		End If
	Next

	ReplaceRemoteUrl = s_Content
End Function

'================================================
'作  用：保存远程的文件到本地
'参  数：s_LocalFileName ------ 本地文件名
'		 s_RemoteFileUrl ------ 远程文件URL
'返回值：True  ----成功
'        False ----失败
'================================================
Function SaveRemoteFile(s_LocalFileName, s_RemoteFileUrl)
	Dim Ads, Retrieval, GetRemoteData
	Dim bError
	bError = False
	SaveRemoteFile = False
	On Error Resume Next
	Set Retrieval = Server.CreateObject("Microsoft.XMLHTTP")
	With Retrieval
		.Open "Get", s_RemoteFileUrl, False, "", ""
		.Send
		GetRemoteData = .ResponseBody
	End With
	Set Retrieval = Nothing

	If LenB(GetRemoteData) > nAllowSize*1024 Then
		bError = True
	Else
		Set Ads = Server.CreateObject("Adodb.Stream")
		With Ads
			.Type = 1
			.Open
			.Write GetRemoteData
			.SaveToFile Server.MapPath(sUploadDir & s_LocalFileName), 2
			.Cancel()
			.Close()
		End With
		Set Ads=nothing
	End If

	If Err.Number = 0 And bError = False Then
		SaveRemoteFile = True
	Else
		Err.Clear
	End If
End Function

Function GetRndFileName(sExt)
	Dim sRnd
	Randomize
	sRnd = Int(900 * Rnd) + 100
	GetRndFileName = FormatTime(Now(), 5) & sRnd & "." & sExt
End Function

Function FormatTime(s_Time, n_Flag)
	Dim y, m, d, h, mi, s
	FormatTime = ""
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
		FormatTime = y & "-" & m & "-" & d & " " & h & ":" & mi & ":" & s
	Case 2
		FormatTime = y & "-" & m & "-" & d
	Case 3
		FormatTime = h & ":" & mi & ":" & s
	Case 4
		FormatTime = y & m & d
	Case 5
		FormatTime = y & m & d & h & mi & s
	End Select
End Function
%>
