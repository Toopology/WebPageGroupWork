<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_Default, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        [设置]-〉[管理员工具]</p>
    <p>
            <asp:HyperLink ID="HyperLink6" runat="server" 
                NavigateUrl="~/Admin/Register.aspx">[创建用户]</asp:HyperLink>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </p>
<p>
            <asp:HyperLink ID="HyperLink7" runat="server" 
                NavigateUrl="~/Admin/RoleManage.aspx">[管理用户]</asp:HyperLink>
            </p>
    <p>
            <asp:HyperLink ID="HyperLink5" runat="server" 
                NavigateUrl="~/Admin/ResetPassword.aspx">[用户重设密码]</asp:HyperLink>
        </p>
    <p>
            <asp:HyperLink ID="HyperLink9" runat="server" 
                NavigateUrl="~/Admin/ShopManage.aspx">[门店管理]</asp:HyperLink>
        </p>
    <p>
            <asp:HyperLink ID="HyperLink8" runat="server" 
                NavigateUrl="~/Admin/ServerLog.aspx" Enabled="False" Visible="False">[访问日志]</asp:HyperLink>
            </p>
</asp:Content>

