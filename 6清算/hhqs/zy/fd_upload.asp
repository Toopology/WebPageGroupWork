<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
if session("admin") <> "zsyyw" then showError("请先登录后再操作。")

dim m
m=request("m")
%> 
<%
'*** File Upload to: upload, Extensions: "GIF,JPG,JPEG,BMP,PNG", Form: form1, Redirect: "", "file", "1024000", "error"
'*** Pure ASP File Upload Modify Version by xPilot-----------------------------------------------------
' Copyright 2000 (c) George Petrov
'
' Script partially based on code from Philippe Collignon 
'              (http://www.asptoday.com/articles/20000316.htm)
'
' New features from GP:
'  * Fast file save with ADO 2.5 stream object
'  * new wrapper functions, extra error checking
'  * UltraDev Server Behavior extension
'
' Copyright 2001-2002 (c) Modify by xPilot
' *** Date: 12/15/2001 ***
' *** 支持所有双字节文件名,而且修复了原函数中遇到空格也会自动截断文件名的错误！ ***
' *** 保证百分百以原文件名保存上传文件！***
' *** Welcome to visite pilothome.yeah.net or mail xpilot@21cn.com to me！***
'
' Version: 2.0.1 Beta for GB2312,BIG5,Japan,Korea ...
'------------------------------------------------------------------------------
Sub BuildUploadRequest(RequestBin,UploadDirectory,storeType,sizeLimit,nameConflict)
  'Get the boundary
  PosBeg = 1
  PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(13)))
  if PosEnd = 0 then
    Response.Write "<b>Form was submitted with no ENCTYPE=""multipart/form-data""</b><br>"
    Response.Write "Please correct the form attributes and try again."
    Response.End
  end if
  'Check ADO Version
	set checkADOConn = Server.CreateObject("ADODB.Connection")
	adoVersion = CSng(checkADOConn.Version)
	set checkADOConn = Nothing
	if adoVersion < 2.5 then
    Response.Write "<b>You don't have ADO 2.5 installed on the server.</b><br>"
    Response.Write "The File Upload extension needs ADO 2.5 or greater to run properly.<br>"
    Response.Write "You can download the latest MDAC (ADO is included) from <a href=""www.microsoft.com/data"">www.microsoft.com/data</a><br>"
    Response.End
	end if		
  'Check content length if needed
	Length = CLng(Request.ServerVariables("HTTP_Content_Length")) 'Get Content-Length header
	If "" & sizeLimit <> "" Then
    sizeLimit = CLng(sizeLimit)
    If Length > sizeLimit Then
      Request.BinaryRead (Length)
      Response.Write "Upload size " & FormatNumber(Length, 0) & "B exceeds limit of " & FormatNumber(sizeLimit, 0) & "B"
      Response.End
    End If
  End If
  boundary = MidB(RequestBin,PosBeg,PosEnd-PosBeg)
  boundaryPos = InstrB(1,RequestBin,boundary)
  'Get all data inside the boundaries
  Do until (boundaryPos=InstrB(RequestBin,boundary & getByteString("--")))
    'Members variable of objects are put in a dictionary object
    Dim UploadControl
    Set UploadControl = CreateObject("Scripting.Dictionary")
    'Get an object name
    Pos = InstrB(BoundaryPos,RequestBin,getByteString("Content-Disposition"))
    Pos = InstrB(Pos,RequestBin,getByteString("name="))
    PosBeg = Pos+6
    PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(34)))
    Name = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
    PosFile = InstrB(BoundaryPos,RequestBin,getByteString("filename="))
    PosBound = InstrB(PosEnd,RequestBin,boundary)
    'Test if object is of file type
    If  PosFile<>0 AND (PosFile<PosBound) Then
      'Get Filename, content-type and content of file
      PosBeg = PosFile + 10
      PosEnd =  InstrB(PosBeg,RequestBin,getByteString(chr(34)))
      FileName = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
      FileName = Mid(FileName,InStrRev(FileName,"\")+1)
      'Add filename to dictionary object
      UploadControl.Add "FileName", FileName
      Pos = InstrB(PosEnd,RequestBin,getByteString("Content-Type:"))
      PosBeg = Pos+14
      PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(13)))
      'Add content-type to dictionary object
      ContentType = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
      UploadControl.Add "ContentType",ContentType
      'Get content of object
      PosBeg = PosEnd+4
      PosEnd = InstrB(PosBeg,RequestBin,boundary)-2
      Value = FileName
      ValueBeg = PosBeg-1
      ValueLen = PosEnd-Posbeg
    Else
      'Get content of object
      Pos = InstrB(Pos,RequestBin,getByteString(chr(13)))
      PosBeg = Pos+4
      PosEnd = InstrB(PosBeg,RequestBin,boundary)-2
      Value = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
      ValueBeg = 0
      ValueEnd = 0
    End If
    'Add content to dictionary object
    UploadControl.Add "Value" , Value	
    UploadControl.Add "ValueBeg" , ValueBeg
    UploadControl.Add "ValueLen" , ValueLen	
    'Add dictionary object to main dictionary
    UploadRequest.Add name, UploadControl	
    'Loop to next object
    BoundaryPos=InstrB(BoundaryPos+LenB(boundary),RequestBin,boundary)
  Loop

  GP_keys = UploadRequest.Keys
  for GP_i = 0 to UploadRequest.Count - 1
    GP_curKey = GP_keys(GP_i)
    'Save all uploaded files
    if UploadRequest.Item(GP_curKey).Item("FileName") <> "" then
      GP_value = UploadRequest.Item(GP_curKey).Item("Value")
      GP_valueBeg = UploadRequest.Item(GP_curKey).Item("ValueBeg")
      GP_valueLen = UploadRequest.Item(GP_curKey).Item("ValueLen")

      if GP_valueLen = 0 then
        Response.Write "<B>An error has occured saving uploaded file!</B><br><br>"
        Response.Write "Filename: " & Trim(GP_curPath) & UploadRequest.Item(GP_curKey).Item("FileName") & "<br>"
        Response.Write "File does not exists or is empty.<br>"
        Response.Write "Please correct and <A HREF=""javascript:history.back(1)"">try again</a>"
	  	  response.End
	    end if
      
      'Create a Stream instance
      Dim GP_strm1, GP_strm2
      Set GP_strm1 = Server.CreateObject("ADODB.Stream")
      Set GP_strm2 = Server.CreateObject("ADODB.Stream")
      
      'Open the stream
      GP_strm1.Open
      GP_strm1.Type = 1 'Binary
      GP_strm2.Open
      GP_strm2.Type = 1 'Binary
        
      GP_strm1.Write RequestBin
      GP_strm1.Position = GP_ValueBeg
      GP_strm1.CopyTo GP_strm2,GP_ValueLen
    
      'Create and Write to a File
      'GP_curPath = Request.ServerVariables("PATH_INFO")
	  GP_curPath = "/UploadPic/"
      GP_curPath = Trim(Mid(GP_curPath,1,InStrRev(GP_curPath,"/")) & UploadDirectory)
      if Mid(GP_curPath,Len(GP_curPath),1)  <> "/" then
        GP_curPath = GP_curPath & "/"
      end if 
      GP_CurFileName = UploadRequest.Item(GP_curKey).Item("FileName")
      GP_FullFileName = Trim(Server.mappath(GP_curPath))& "\" & GP_CurFileName
      'Check if the file alreadu exist
      GP_FileExist = false
      Set fso = CreateObject("Scripting.FileSystemObject")
      If (fso.FileExists(GP_FullFileName)) Then
        GP_FileExist = true
      End If      
      if nameConflict = "error" and GP_FileExist then
        Response.Write "<B>File already exists!</B><br><br>"
        Response.Write "Please correct and <A HREF=""javascript:history.back(1)"">try again</a>"
				GP_strm1.Close
				GP_strm2.Close
	  	  response.End
      end if
      if ((nameConflict = "over" or nameConflict = "uniq") and GP_FileExist) or (NOT GP_FileExist) then
        if nameConflict = "uniq" and GP_FileExist then
          Begin_Name_Num = 0
          while GP_FileExist    
            Begin_Name_Num = Begin_Name_Num + 1
            GP_FullFileName = Trim(Server.mappath(GP_curPath))& "\" & fso.GetBaseName(GP_CurFileName) & "_" & Begin_Name_Num & "." & fso.GetExtensionName(GP_CurFileName)
            GP_FileExist = fso.FileExists(GP_FullFileName)
          wend  
          UploadRequest.Item(GP_curKey).Item("FileName") = fso.GetBaseName(GP_CurFileName) & "_" & Begin_Name_Num & "." & fso.GetExtensionName(GP_CurFileName)
					UploadRequest.Item(GP_curKey).Item("Value") = UploadRequest.Item(GP_curKey).Item("FileName")
        end if
        on error resume next
        GP_strm2.SaveToFile GP_FullFileName,2
        if err then
          Response.Write "<B>An error has occured saving uploaded file!</B><br><br>"
          Response.Write "Filename: " & Trim(GP_curPath) & UploadRequest.Item(GP_curKey).Item("FileName") & "<br>"
          Response.Write "Maybe the destination directory does not exist, or you don't have write permission.<br>"
          Response.Write "Please correct and <A HREF=""javascript:history.back(1)"">try again</a>"
    		  err.clear
  				GP_strm1.Close
  				GP_strm2.Close
  	  	  response.End
  	    end if
  			GP_strm1.Close
  			GP_strm2.Close
  			if storeType = "path" then
  				UploadRequest.Item(GP_curKey).Item("Value") = GP_curPath & UploadRequest.Item(GP_curKey).Item("Value")
  			end if
        on error goto 0
      end if
    end if
  next

End Sub

'把普通字符串转成二进制字符串函数
Function getByteString(StringStr)
    getByteString=""
  For i = 1 To Len(StringStr) 
    XP_varchar = mid(StringStr,i,1)
    XP_varasc = Asc(XP_varchar) 
    If XP_varasc < 0 Then 
       XP_varasc = XP_varasc + 65535 
    End If 

    If XP_varasc > 255 Then 
       XP_varlow = Left(Hex(Asc(XP_varchar)),2) 
       XP_varhigh = right(Hex(Asc(XP_varchar)),2) 
       getByteString = getByteString & chrB("&H" & XP_varlow) & chrB("&H" & XP_varhigh) 
    Else 
       getByteString = getByteString & chrB(AscB(XP_varchar)) 
    End If 
  Next 
End Function

'把二进制字符串转换成普通字符串函数 
Function getString(StringBin)
   getString =""
   Dim XP_varlen,XP_vargetstr,XP_string,XP_skip
   XP_skip = 0 
   XP_string = "" 
 If Not IsNull(StringBin) Then 
      XP_varlen = LenB(StringBin) 
    For i = 1 To XP_varlen 
      If XP_skip = 0 Then
         XP_vargetstr = MidB(StringBin,i,1) 
         If AscB(XP_vargetstr) > 127 Then 
           XP_string = XP_string & ChrW(AscW(MidB(StringBin,i+1,1) & XP_vargetstr)) 
           XP_skip = 1 
         Else 
           XP_string = XP_string & ChrW(AscB(XP_vargetstr)) 
         End If 
      Else 
      XP_skip = 0
   End If 
    Next 
 End If 
      getString = XP_string 
End Function 

Function UploadFormRequest(name)
  on error resume next
  if UploadRequest.Item(name) then
    UploadFormRequest = UploadRequest.Item(name).Item("Value")
  end if  
End Function

'Process the upload
UploadQueryString = Replace(Request.QueryString,"GP_upload=true","")
if mid(UploadQueryString,1,1) = "&" then
	UploadQueryString = Mid(UploadQueryString,2)
end if

GP_uploadAction = CStr(Request.ServerVariables("URL")) & "?GP_upload=true"
If (Request.QueryString <> "") Then  
  if UploadQueryString <> "" then
	  GP_uploadAction = GP_uploadAction & "&" & UploadQueryString
  end if 
End If

If (CStr(Request.QueryString("GP_upload")) <> "") Then
  GP_redirectPage = ""
  If (GP_redirectPage = "") Then
    GP_redirectPage = CStr(Request.ServerVariables("URL"))
  end if
    
  RequestBin = Request.BinaryRead(Request.TotalBytes)
  Dim UploadRequest
  Set UploadRequest = CreateObject("Scripting.Dictionary")  
  BuildUploadRequest RequestBin, "product", "file", "1024000", "error"
  
  '*** GP NO REDIRECT
end if  
if UploadQueryString <> "" then
  UploadQueryString = UploadQueryString & "&GP_upload=true"
else  
  UploadQueryString = "GP_upload=true"
end if  


%> 
    <% if request.querystring ("GP_upload") <> "" then %>
    <%
    Dim objFSO,MMFilename,TimeMM,FileType,fname
	fname = now()
  fname = replace(fname,"-","")
  fname = replace(fname," ","") 
  fname = replace(fname,":","")
  fname = replace(fname,"PM","")
  fname = replace(fname,"AM","")
  fname = replace(fname,"上午","")
  fname = replace(fname,"下午","")
    MMFilename = UploadFormRequest("file") '获得上传文件名
    FileType = Right(MMFilename,4) '获得上传文件的类型
    TimeMM = fname&FileType '使用一个时间数值来确定文件名
	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
    If objFSO.FileExists(Server.MapPath("/UploadPic/product/"&MMFilename)) Then
    objFSO.MoveFile Server.MapPath("/UploadPic/product/"&MMFilename), Server.MapPath("/UploadPic/product/"&TimeMM) '重命名文件
    Else
    Response.Write "产生错误,文件重命名失败！"
    End If
    Set objFSO = Nothing
    %>
<script>window.opener.form1.<% If m=1 Then %>preview<% ElseIf m=2 Then %>n_rpic<% ElseIf m=3 Then %>n_content.value='[img]images/upload/<%=TimeMM%>[/img]';window.close();</script><% End If %>
.value='/UploadPic/product/<%=TimeMM%>';window.close();</script>
    <% End If %>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
<link href="admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--



function getFileExtension(filePath) { //v1.0
  fileName = ((filePath.indexOf('/') > -1) ? filePath.substring(filePath.lastIndexOf('/')+1,filePath.length) : filePath.substring(filePath.lastIndexOf('\\')+1,filePath.length));
  return fileName.substring(fileName.lastIndexOf('.')+1,fileName.length);
}

function checkFileUpload(form,extensions) { //v1.0
  document.MM_returnValue = true;
  if (extensions && extensions != '') {
    for (var i = 0; i<form.elements.length; i++) {
      field = form.elements[i];
      if (field.type.toUpperCase() != 'FILE') continue;
      if (field.value == '') {
        alert('文件框中必须保证已经有文件被选中!');
        document.MM_returnValue = false;field.focus();break;
      }
      if (extensions.toUpperCase().indexOf(getFileExtension(field.value).toUpperCase()) == -1) {
        alert('这种文件类型不允许上传!.\n只有以下类型的文件才被允许上传: ' + extensions + '.\n请选择别的文件并重新上传.');
        document.MM_returnValue = false;field.focus();break;
  } } }
}

function doPreview(){
	var url = document.form1.file.value;
	if (url.lastIndexOf(".")<=0){
		return;
	}
	else{
		tdPreview.innerHTML = "<img border=0 src='"+url+"' height='180'>";
	}
}
//-->
</script>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style=" background-color:#FFFFFF">
<form action="<%=GP_uploadAction%>" method="post" enctype="multipart/form-data" name="form1" onSubmit="checkFileUpload(this,'GIF,JPG,JPEG,BMP,PNG');return document.MM_returnValue">
  <table width="300" height="100" border="0" cellpadding="0" cellspacing="10">
    <tr> 
      <td align="center" style="font-size:12px;"><strong>不能超过 1m</strong></td>
    </tr>
    <tr> 
      <td align="center" > 
        <input name="file" type="file" class="text" size="20" onChange="try{doPreview();} catch(e){}">
        <input name="Submit" type="submit" class="button" value="提交">
      </td>
    </tr>
	<tr>
		<td><div id=tdPreview style="width:280px;height:180px;overflow: hidden;">&nbsp;</div></td>
	</tr>
  </table>
</form>
	</body>
</html>