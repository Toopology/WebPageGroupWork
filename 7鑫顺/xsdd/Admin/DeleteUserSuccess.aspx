<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_DeleteUserSuccess, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        删除用户成功！</p>
    <p>
&nbsp;<asp:HyperLink ID="HyperLink5" runat="server" 
            NavigateUrl="~/Admin/RoleManage.aspx">返回用户管理</asp:HyperLink>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:HyperLink ID="HyperLink6" runat="server" 
            NavigateUrl="~/admin/Default.aspx">返回管理首页</asp:HyperLink>
    </p>
</asp:Content>

