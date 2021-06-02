<%@ page language="C#" autoeventwireup="true" inherits="Account_Login, App_Web_1ujo314s" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link href="~/Styles/Site.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
        .style1
        {
            width: 911px;
        }
    </style>
</head>
<body>
    <form runat="server">
    <div class="page">
        <div class="header">
            <div class="title">
                <h1>
                    鑫顺典当后台管理
                </h1>
            </div>
            <div class="loginDisplay">
                <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/AboutUs.aspx" 
                    Target="_blank">[网站首页]</asp:HyperLink>
&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:LoginName ID="LoginName1" runat="server" />
        &nbsp;&nbsp;&nbsp; <asp:LoginStatus ID="LoginStatus1" runat="server" 
            LogoutAction="Redirect" LogoutPageUrl="~/Login.aspx" />
            </div>
            <div class="clear hideSkiplink">
  
            &nbsp;&nbsp;&nbsp;

                <br />
                <br />
                <br />
                <br />

            </div>
        </div>
        <div class="main">
            <table style="width: 97%;">
                <tr>
                    <td align="right" class="style1">
                        <asp:LinkButton ID="lb_return" runat="server" onclick="LinkButton1_Click"  
            >返回</asp:LinkButton>
                    </td>
                </tr>
            </table>
            <table style="width: 97%;">
                <tr>
                    <td align="right" class="style1">
                        <br />
                        <br />
                    </td>
                    <td align="right" class="style1">
                        &nbsp;</td>
                    <td align="right" class="style1">
                        &nbsp;</td>
                </tr>
                <tr>
                    <td align="center" class="style1">
                        &nbsp;</td>
                    <td align="center" class="style1">
    <asp:Login ID="LoginUser" runat="server" EnableViewState="false" 
    RenderOuterTable="false" 
    DestinationPageUrl="~/Datainput/default.aspx" 
        style="text-align: left">
        <TextBoxStyle Width="150px" />
    </asp:Login>
                    </td>
                    <td align="center" class="style1">
                        &nbsp;</td>
                </tr>
            </table>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="clear">
        </div>
    </div>
    <div class="footer">
        
    </div>
    </form>
</body>
</html>
