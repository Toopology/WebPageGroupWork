<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
OPTION EXPLICIT
session.CodePage = 936
Server.ScriptTimeOut=5000
%>
<!--#include file="UpLoadClass.asp"-->
<%
dim request2,w,h,save_path,show_path,src_path,fin_path

save_path = "../../upfile/"
show_path = "upfile/"
call DoCreateNewDir(save_path) '����Ŀ¼


'�����ϴ�����
set request2=New UpLoadClass

'�����ַ���
request2.Charset = "gb2312"
request2.SavePath = save_path
request2.FileType = "gif/jpg/jpeg/png/swf/flv/"
request2.MaxSize = 1000*1000
request2.AutoSave = 0
'�򿪶���
request2.Open()

Dim myError(10)
	myError(0) = "�ϴ��ɹ���"
	myError(1) = "�ϴ���Ч������һЩ�ļ������ 'MaxSize' ��δ�����档"
	myError(2) = "�ϴ���Ч������һЩ�ļ���ƥ�� 'FileType' ��δ�����档"
	myError(3) = "�ϴ���Ч������һЩ�ļ������ 'MaxSize' ���Ҳ�ƥ�� 'FileType' ��δ�����档"
	myError(4) = "�쳣���������ϴ���"
	myError(5) = "�ϴ��Ѿ�ȡ�������������������Ƿ�С�� 'TotalSize' ��"

%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style>
body,form { background:#EEF7FD; margin:0; padding:0; font-size:12px}
input { border-width:1px;}
</style>
</head>

<body>
	<%
	if request2.error<>0 then
		Response.Write("����"&myError(request2.error)&"��ͼ���֧����ϵ��")
	else	
		'�ƶ��ļ�
		src_path = request2.SavePath&request2.Form("strPhoto")
		request2.SavePath = request2.SavePath&request2.Form("target_id")&"/"
		show_path = show_path&request2.Form("target_id")&"/"&request2.Form("strPhoto")
		call DoCreateNewDir(request2.SavePath)
		
		fin_path = request2.SavePath&request2.Form("strPhoto")
		call moveFile(src_path,fin_path)'���ļ��Ƶ�Ŀ¼��
		
		'��������ͼ
		w = cint(request2.Form("w"))
		h = cint(request2.Form("h"))
		if w>0 and h>0 then call CreatThumb(fin_path,fin_path,w,h)
	
		'��ʾĿ���ļ�·��������
		Response.Write("�ϴ��ɹ���<a target='_blank' href='"&fin_path&"'>"&show_path&"</a> ")
		Response.Write "[<a href=""javascript:history.back();"">����</a>]"
		Response.Write "<script>parent.document.getElementById('"&request2.Form("target_id")&"').value='"&show_path&"';try{parent.closeTipswindow();}catch(e){}</script>"
	
	end if
	
	%>
</body>
</html>
<%
'�ͷ��ϴ�����
set request2=nothing

Sub CreatThumb(byval pic_path,byval thumb_path,byval s_width,byval s_height)
	
	on error resume next
	
	dim nOriginalWidth,nOriginalHeight,nWidth,nHeight,s_BackGroundColor,s_watermark
	dim fill_bg_color,Jpeg
	
	Set Jpeg = Server.CreateObject("Persits.Jpeg")
	Jpeg.Open Server.MapPath(pic_path)
	
	'ˮӡ
	s_watermark = false
	fill_bg_color = false
	
	nOriginalWidth = Jpeg.OriginalWidth 'ԭʼͼƬ��С
	nOriginalHeight = Jpeg.OriginalHeight
	
	'�ȱ�����СͼƬ
	if (nOriginalWidth/nOriginalHeight) >= (s_width/s_height)  then
		nHeight = s_height
		nWidth = nOriginalWidth*(s_height/nOriginalHeight)
	else
		nWidth = s_width
		nHeight = nOriginalHeight*(s_width/nOriginalWidth)
	end if
	
	if (nOriginalWidth>s_width or nOriginalHeight>s_height) then
		Jpeg.Width = nWidth
		Jpeg.Height = nHeight
	end if
	
	'��������ͼ����ɫ
	if fill_bg_color=true then
		s_BackGroundColor = &HEEEEEE '����ɫ
		set t_AspJpeg = Server.CreateObject("Persits.Jpeg")
		t_AspJpeg.New s_width , s_height , s_BackGroundColor
		t_AspJpeg.Canvas.DrawImage (s_width - nWidth)/2 ,(s_height - nHeight)/2 ,Jpeg
	end if
	
	'Jpeg.Crop 0, 0, s_width, s_height 
	
	'�������ˮӡ
	if s_watermark=true then
		Jpeg.Canvas.Font.Color = &HFF0000' ��ɫ
		Jpeg.Canvas.Font.Family = "Arial"
		Jpeg.Canvas.Font.Bold = False 
		Jpeg.Canvas.Font.Quality = 4 ' Antialiased
		Jpeg.Canvas.Print 10, 10, "www.qooduo.com"
	end if
	
	if fill_bg_color=true then 
		t_AspJpeg.Save Server.MapPath(thumb_path)
		t_AspJpeg.Close:Set t_AspJpeg = Nothing
	else
		Jpeg.Save Server.MapPath(thumb_path)
	end if
	Jpeg.Close:Set Jpeg = Nothing
end sub

sub moveFile(byval path1,byval path2)
	Dim oFSO
	path1 = server.MapPath(path1)
	path2 = server.MapPath(path2)
	
	set oFSO=server.createObject("scripting.fileSystemObject") 
	oFSO.MoveFile path1,path2
	Set oFSO = nothing	
end sub

Sub DoCreateNewDir(byval sUploadDir)
	' Automatically Create Directory is not available in trial version.
	dim arrPath,strTmpPath,intRow
	Dim oFSO
	
	strTmpPath = ""
	arrPath = Split(sUploadDir, "/") 
	
	Set oFSO = Server.CreateObject( "Scripting.FileSystemObject" )
	for intRow = 0 to Ubound(arrPath)-1
		strTmpPath = strTmpPath & arrPath(intRow) & "/"
		if oFSO.folderExists(Server.MapPath(strTmpPath))=false then
			oFSO.CreateFolder(Server.MapPath(strTmpPath))
		end if
	next
	Set oFSO = nothing	
End Sub

%>
