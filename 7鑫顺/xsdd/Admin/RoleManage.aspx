<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_RoleManage, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    请选择用户进行管理<p />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
    SelectCommand="SELECT * FROM [vw_aspnet_MembershipUsers] order by username asc"></asp:SqlDataSource>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" GridLines="Horizontal" 
            CssClass="gridview_m" DataSourceID="SqlDataSource1">
            <Columns>
                <asp:BoundField DataField="UserId" HeaderText="UserId" SortExpression="UserId" 
                    Visible="False" />
                <asp:BoundField DataField="UserName" HeaderText="用户名" 
                    SortExpression="UserName" >
                
                <ItemStyle HorizontalAlign="Left" Width="150px" />
                </asp:BoundField>
                <asp:CheckBoxField DataField="IsLockedOut" HeaderText="被锁定" 
                    SortExpression="IsLockedOut" >
                
                <ItemStyle HorizontalAlign="Center" Width="50px" />
                </asp:CheckBoxField>
                <asp:CheckBoxField DataField="IsApproved" HeaderText="在用" 
                    SortExpression="IsApproved" >
                
                <ItemStyle HorizontalAlign="Center" Width="50px" />
                </asp:CheckBoxField>
                <asp:HyperLinkField DataNavigateUrlFields="UserId" 
                    DataNavigateUrlFormatString="RoleManageUser.aspx?UserId={0}" Text="管理" >
                
                <ItemStyle HorizontalAlign="Center" Width="50px" />
                </asp:HyperLinkField>
            </Columns>
        </asp:GridView>
    <br />
</asp:Content>

