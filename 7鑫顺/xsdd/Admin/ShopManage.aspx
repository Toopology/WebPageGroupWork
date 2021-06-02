<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Admin_ShopManage, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        <strong>门店管理</strong><asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
            SelectCommand="SELECT [RoleId], right(RoleName,len(RoleName)-charindex('-',RoleName)) as [Role], [LoweredRoleName], [Description], [ApplicationId] FROM [vw_aspnet_Roles] WHERE (left(RoleName,3)='门店-')">
        </asp:SqlDataSource>
    </p>
    <p>
        <asp:GridView ID="GridView1" runat="server" DataSourceID="SqlDataSource1" 
            AutoGenerateColumns="False" DataKeyNames="LoweredRoleName,ApplicationId" 
            GridLines="None" ShowHeader="False">
            <Columns>
                <asp:BoundField DataField="RoleId" HeaderText="RoleId" SortExpression="RoleId" 
                    Visible="False" />
                <asp:BoundField DataField="Role" HeaderText="Role" ReadOnly="True" 
                    SortExpression="Role" >
                <ItemStyle Width="100px" />
                </asp:BoundField>
                <asp:BoundField DataField="LoweredRoleName" HeaderText="LoweredRoleName" 
                    ReadOnly="True" SortExpression="LoweredRoleName" Visible="False" />
                <asp:BoundField DataField="Description" HeaderText="Description" 
                    SortExpression="Description" Visible="False" />
                <asp:BoundField DataField="ApplicationId" HeaderText="ApplicationId" 
                    ReadOnly="True" SortExpression="ApplicationId" Visible="False" />
                <asp:HyperLinkField DataNavigateUrlFields="RoleId" 
                            DataNavigateUrlFormatString="DeleteShop.aspx?RoleId={0}"
                            Text="删除" >
                    <ItemStyle Width="50px" ForeColor="Red" />
                </asp:HyperLinkField>
            </Columns>
        </asp:GridView>
        <br />
        注意：一旦删除门店，该门店下所有商品信息也将同时被删除。
    </p>
    <p>
        <strong>新增门店</strong></p>
    <p>
        请输入门店名称：<asp:TextBox ID="tb_shop" runat="server" Width="100px"></asp:TextBox>
        <asp:Button ID="btn_Addshop" runat="server" Text="添加" 
            onclick="btn_Addshop_Click" />
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="tb_shop" ErrorMessage="&lt;-请输入门店名称"></asp:RequiredFieldValidator>
        <br />
        格式例如：广中店
    </p>
</asp:Content>

