<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��˳�䵱 - ��ҳ</title>
<style type="text/css">
<!--
body {
	background-position:center;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FF6600;
}
body,td,th {
	font-size: 12px;
}
.STYLE1 {
	color: #FFFFFF;
	font-size: 14px;
}
-->
</style>
</head>
<body>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" height="98%"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="100%" height="100%">
        <param name="movie" value="index.swf">
        <param name="quality" value="high">
        <embed src="index.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="100%" height="100%"></embed>
      </object></td>
  </tr>
  <tr>
    <td height="32" align="center" valign="middle" bgcolor="#ED1B24"><div align="center" class="STYLE1">��Ȩ����&copy;2016 �Ϻ���˳�䵱�������ι�˾������·99��22¥2208��     ��ַ: http://www.xsdd.com.cn  &nbsp;<a href="http://www.miibeian.gov.cn" target="_blank"><font color="#FFFFFF">ICP֤: ��ICP��07004052��</font>;<a href="http://218.83.160.6:8888/xsdd/zhengshu/9.jpg" target="_blank"><font color="#FFFFFF">����Ӫ���֤</font></a></div>
<div style="width:300px;margin:0 auto; padding:20px 0;">
		 		<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010902001546" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="gszz/batb.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">���������� 31010902001546��</p></a>
		 	</div>
</td>
  </tr>
</table>
</body>
</html>

<%@Import Namespace="System.IO"%>

<script language="VB" runat="server">

sub Page_Load(sender as object,e as eventargs)
    dim VisiterCount as Long '�������������
       dim myFile as string     '�����ļ�·������
       myFile=Server.MapPath("Count.txt")
       dim sw as StreamWriter
       dim sr as StreamReader
       '������ļ������ڽ����ļ�����д��1
       If File.Exists(myFile)=false then
          sw=new StreamWriter(myFile,false,Encoding.Default)
       sw.WriteLine("1")   'д��1
          sw.Close()
       else
       '��ȡ�ļ�
          sr=new StreamReader(myFile,Encoding.Default)
          VisiterCount=CLng(sr.ReadLine()) '��ȡһ�У���ת���ɳ�����
          sr.Close()
          'д���ļ�
          sw=new StreamWriter(myFile,false,Encoding.Default)
          VisiterCount=VisiterCount+1   '����������1
          sw.WriteLine(VisiterCount.ToString()) 'д��һ�У�������ԭ������
          sw.Close()
       end If
        '��վ�������
        Dim VisiterCounttoday As Long '�������������
        Dim myFiletoday As String '�����ļ�·������
        Dim filedate As String
        Dim today As String
        today = String.Format("{0:d}", Convert.ToDateTime(DateTime.Now))
        myFiletoday = Server.MapPath("counttoday.txt")
        Dim swtoday As StreamWriter
        Dim srtoday As StreamReader
        '������ļ������ڽ����ļ�����д��1
        If File.Exists(myFiletoday) = False Then
            swtoday = New StreamWriter(myFiletoday, False, Encoding.Default)
            swtoday.WriteLine("1")
            swtoday.Close()
        Else
        
            filedate = String.Format("{0:d}", File.GetLastWriteTime(myFiletoday))
            If (filedate = today) Then   '�����ļ�
            
                '��ȡ�ļ�
                srtoday = New StreamReader(myFiletoday, Encoding.Default)
                VisiterCounttoday = CLng(srtoday.ReadLine()) '��ȡһ��, ��ת���ɳ�����
                srtoday.Close()
                'д���ļ�
                swtoday = new StreamWriter(myFiletoday, false, Encoding.Default)
                VisiterCounttoday = VisiterCounttoday + 1  '����������1
                swtoday.WriteLine(VisiterCounttoday.ToString()) 'д��һ�У�������ԭ������
                swtoday.Close()
            
            else  '�ǵ����ļ�
            
                File.Delete(myFiletoday)
                swtoday = New StreamWriter(myFiletoday, False, Encoding.Default)
                swtoday.WriteLine("1")   'д��1
                swtoday.Close()
            End If

        End If
    End Sub

</script>