<%@ page title="登录" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Account_Login, App_Web_fwpds01a" %>

<asp:Content ID="Content1" runat="server" ContentPlaceHolderID="head">
</asp:Content>
<asp:Content ID="Content2" runat="server" ContentPlaceHolderID="ContentPlaceHolder1">
    <h2>
        [用户登录]</h2>
    <p>
        请输入用户名和密码。&nbsp;
    </p>
    <asp:Login ID="LoginUser" runat="server" EnableViewState="false" 
    RenderOuterTable="false" 
    DestinationPageUrl="~/Datainput/default.aspx" 
        style="text-align: left">
        <TextBoxStyle Width="150px" />
    </asp:Login>
</asp:Content>