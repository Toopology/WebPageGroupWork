<%@ page title="" language="C#" masterpagefile="~/mainpage.master" autoeventwireup="true" inherits="images_viewimage, App_Web_npfhy52l" %>

<%-- 在此处添加内容控件 --%>
<asp:Content ID="Content1" runat="server" contentplaceholderid="HeadContent">
    首页 -&gt; 绝当品销售 -&gt; 大图
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="MainContent">
     <tr>
                <td height="180" valign="top" class="t13">
				
				<!--内容 -->
				<table width="100%" height="53" border="0" cellpadding="6" cellspacing="0">
                  <tr>
                    <td height="53" align="center"><span class="STYLE4">图片放大</span></td>
                    </tr>
                </table>
				<table width="100%" border="0" cellspacing="0" cellpadding="2">

                  <tr>
                    <td width="79%" height="18"><span class="STYLE3"></span></td>
                    <td width="21%" align="right"><a href="javascript:history.back();" target="_self">&lt;&lt;返回上一页</a></td>
                  </tr>
                  <tr>
                    <td height="19" colspan="2">
					<table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                      <tr>
                        <td></td>
                      </tr>
                    </table></td>
                    </tr>
                </table>
				 <DIV> <DIV align=center> <P>&nbsp;<asp:Image ID="Image1" runat="server" 
                         Width="640px" BorderColor="Gray" BorderStyle="Groove" />
                     </P></DIV></DIV>
				</td>
              </tr>
              <tr>
                <td valign="top" class="t13">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td height="62" align="right"><a href="javascript:history.back();" target="_self">&lt;&lt;返回上一页</a></td>
                    </tr>
                </table></td>
              </tr>
</asp:Content>

