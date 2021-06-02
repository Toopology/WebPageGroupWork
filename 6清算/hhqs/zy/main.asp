<!--#include file="check.asp"-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="admin.css" rel="stylesheet" type="text/css" />
<script src="common.js"></script>
</head>

<body>

<table class="my_table" width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
	  <td colspan="4" class="header">欢迎 进入管理界面</td>
	</tr>
	<tr>
	  <td colspan="4" style="padding:20px; line-height:20px">
	    <table class="my_table" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="title">
            <td colspan="2">&nbsp;帐户信息</td>
          </tr>
          <tr>
            <td width="20%" align="right">上次登录的时间&nbsp;</td>
            <td width="80%" class="font11">&nbsp;---<%=request.Cookies("admin")("lasttime")%></td>
          </tr>
          <tr>
            <td align="right">上次登录的IP&nbsp;</td>
            <td class="font11">&nbsp;---<%=request.Cookies("admin")("userip")%></td>
          </tr>
          <tr>
            <td align="right">本次IP&nbsp;</td>
            <td class="font11">&nbsp;<%=getip()%></td>
          </tr>
          <tr>
            <td align="right">登录次数&nbsp;</td>
            <td class="font11">&nbsp;---<%=request.Cookies("admin")("allhits")%></td>
          </tr>
          <tr>
            <td colspan="2" class="title">&nbsp;服务器信息</td>
          </tr>
          <tr>
            <td align="right">Microsoft.XMLHTTP&nbsp;</td>
            <td class="font11"><%call ObjTest("Microsoft.XMLHTTP")%></td>
          </tr>
          <tr>
            <td align="right">WScript.Shell&nbsp;</td>
            <td class="font11"><%call ObjTest("WScript.Shell")%>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">Persits.Upload.1&nbsp;</td>
            <td class="font11"><%call ObjTest("Persits.Upload.1")%>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">JMail.SmtpMail&nbsp;</td>
            <td class="font11"><%call ObjTest("JMail.SmtpMail")%>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">Persits.Jpeg&nbsp;</td>
            <td class="font11"><%call ObjTest("Persits.Jpeg")%>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">服务器时间&nbsp;</td>
            <td class="font11">&nbsp;<%
	dim isobj,VerObj,TestObj
	  tnow = now():oknow = cstr(tnow)
	  if oknow <> year(tnow) & "-" & month(tnow) & "-" & day(tnow) & " " & hour(tnow) & ":" & right(FormatNumber(minute(tnow)/100,2),2) & ":" & right(FormatNumber(second(tnow)/100,2),2) then oknow = oknow & " (日期格式不规范)"
	  response.write oknow
	  %></td>
          </tr>
          <tr>
            <td align="right">IIS版本&nbsp;</td>
            <td class="font11">&nbsp;<%=Request.ServerVariables("SERVER_SOFTWARE")%></td>
          </tr>
          <tr>
            <td align="right">FSO 文件管理&nbsp;</td>
            <td class="font11"><%call ObjTest("Scripting.FileSystemObject")%>&nbsp;</td>
          </tr>
          <tr>
            <td align="right">带宽检测信息&nbsp;</td>
            <td style="padding-left:8px">
  <%
Response.Flush:Response.Flush
tstart=timer()
for i=1 to 1024
  Response.Write "<!--567890#########0#########0#########0#########0#########0#########0#########0#########012345-->" & vbcrlf
next
Response.Flush:Response.Flush

tend=timer()
ttime=tend-tstart + 0.00001

tnetspeed=100/(ttime)
tnetspeed2=tnetspeed * 8
twidth=int(tnetspeed * 0.16)+5

if twidth> 300 then twidth=300
tnetspeed=formatnumber(tnetspeed,2,,,0)
tnetspeed2=formatnumber(tnetspeed2,2,,,0)

%>
	<div style=" width:400px; background:#FFFFFF; height:12px; padding:1px; border:1px solid #006600">
		<div style="width:<%=twidth%>px;background:#C4E1F8; float:left;height:12px"></div>
		<div style="float:left; font-size:10px; font-family:Arial;height:12px;line-height:12px; overflow:hidden">&nbsp;<%=tnetspeed%> kB/s ≈<strong><%=Round(tnetspeed2/1024,0)%></strong>M</div>
	</div>
  
</td>
          </tr>
        </table>
	</td>
  </tr>
	
	<tr class="bottom">
	  <td colspan="4">&nbsp;</td>
    </tr>
</table>
<%
'检查组件是否被支持及组件版本的子程序
sub ObjTest(strObj)
  on error resume next
  IsObj=false
  VerObj=""
  set TestObj=server.CreateObject (strObj)
  If -2147221005 <> Err then		'感谢网友iAmFisher的宝贵建议
    IsObj = True
    VerObj = TestObj.version
    if VerObj="" or isnull(VerObj) then VerObj=TestObj.about
  end if
  set TestObj=nothing
  
  response.Write(cIsReady(isobj) & " " & left(VerObj,10))
End sub

' 将是否可用转换为对号和错号
function cIsReady(trd)
  Select Case trd
    case true: cIsReady="<font class=fonts><b>√</b></font>"
    case false: cIsReady="<font color='red'><b>×</b></font>"
  End Select
end function
%>
</body>
</html>
