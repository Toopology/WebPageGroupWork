<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%
OPTION EXPLICIT
Server.ScriptTimeOut=5000
%>
<!--#include file="UpLoadClass.asp"-->
<%
dim request2,Jpeg,path

'建立上传对象
set request2=New UpLoadClass

	'设置字符集
	request2.Charset="utf-8"
	
	request2.SavePath = "../uploadpic/preview/"
	
	request2.FileType="gif/jpg/jpeg/png"
	
	request2.MaxSize=0
	
	request2.AutoSave=0

	'打开对象
	request2.Open()
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
body,form { background:#EEF7FD; margin:0; padding:0; font-size:12px}
input { border-width:1px;}
</style>
</head>

<body>
	<%
	if request2.error<>0 then
		Response.Write("错误代号："&request2.error&"，请和技术支持联系。")
	else
	'显示目标文件路径与名称
	Response.Write("上传成功：<a target='_blank' href='"&request2.SavePath&request2.Form("strPhoto")&"'>"&request2.SavePath&request2.Form("strPhoto")&"</a> ")
	
	Response.Write "[<a href=""javascript:history.back();"">返回</a>]"
	
	Response.Write "<script>parent.document.all('"&request2.Form("iname")&"').value='uploadpic/preview/"&request2.Form("strPhoto")&"';</script>"
	
	end if
	
	'创建缩略图
	if request2.Form("iname")="bigsrc" then
		Set Jpeg = Server.CreateObject("Persits.Jpeg")
		Path = Server.MapPath(""&request2.SavePath&request2.Form("strPhoto")&"")
		Jpeg.Open Path
		
		'按比例缩小
			dim nOriginalWidth,nOriginalHeight,nWidth,nHeight
			nOriginalWidth = Jpeg.OriginalWidth
			nOriginalHeight = Jpeg.OriginalHeight
			
			'If nOriginalWidth > 120 Or nOriginalHeight > 100 Then
				If nOriginalWidth > 120 Then
					nWidth = 120
					nHeight = 120*nOriginalHeight/nOriginalWidth
					if nHeight<100 then
						nWidth=120*100/nHeight
						nHeight=100
					end if
				end if
				'If nOriginalHeight > 100 Then
					'nWidth = 100*nOriginalWidth/nOriginalHeight
					'nHeight = 100
				'end if
				Jpeg.Width = nWidth
				Jpeg.Height = nHeight
			
				Jpeg.Crop 0, 0, 120, 100 
				
				Jpeg.Save Server.MapPath(""&request2.SavePath&"small/"&request2.Form("strPhoto")&".jpg")
				'Response.Write "<script>if (parent.document.all('preview').value=='') {parent.document.all('preview').value='uploadPic/preview/small/"&request2.Form("strPhoto")&".jpg';}< /script>"
				Response.Write "<script>parent.document.all('preview').value='uploadPic/preview/small/"&request2.Form("strPhoto")&".jpg';</script>"
				Jpeg.Close:Set Jpeg = Nothing
			'end if
	end if
	
	%>
	<script type="text/javascript">
function setImgSize(img,width,height){
var MaxWidth=width;//设置图片宽度界限
var MaxHeight=height;//设置图片高度界限
var HeightWidth=img.offsetHeight/img.offsetWidth;//设置高宽比
var WidthHeight=img.offsetWidth/img.offsetHeight;//设置宽高比
if(img.offsetWidth>MaxWidth){
img.width=MaxWidth;
img.height=MaxWidth*HeightWidth;
}
if(img.offsetHeight>MaxHeight){
img.height=MaxHeight;
img.width=MaxHeight*WidthHeight;
}
}

</script>

</body>
</html>
<%
'释放上传对象
set request2=nothing
%>
