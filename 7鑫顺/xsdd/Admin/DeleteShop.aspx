<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Admin_ShopDelete, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        确定要删除该门店吗？<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
            
            SelectCommand="SELECT [ApplicationId], [RoleId],right([RoleName],len([RoleName])-charindex('-',[RoleName])) as [Role], [LoweredRoleName], [Description] FROM [vw_aspnet_Roles] WHERE ([RoleId] = @RoleId)">
            <SelectParameters>
                <asp:QueryStringParameter Name="RoleId" QueryStringField="RoleId" 
                    Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            DataKeyNames="ApplicationId,LoweredRoleName" DataSourceID="SqlDataSource1" 
            GridLines="None" ShowHeader="False">
            <Columns>
                <asp:BoundField DataField="Role" HeaderText="RoleName" 
                    SortExpression="Role" />
            </Columns>
        </asp:GridView>
        </p>
    <p>
        <asp:Button ID="btn_Delete" runat="server" onclick="btn_Delete_Click" 
            Text="删除" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </p>
    <p>
        该门店下商品<asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:XSDD %>" 
            SelectCommand="SELECT * FROM [Product]"></asp:SqlDataSource>
        <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
            DataKeyNames="id" DataSourceID="SqlDataSource2" GridLines="None">
            <Columns>
                <asp:BoundField DataField="id" InsertVisible="False" 
                    ReadOnly="True" SortExpression="id" />
                <asp:BoundField DataField="name" HeaderText="商品名称" SortExpression="name" />
                <asp:BoundField DataField="currency" HeaderText="currency" 
                    SortExpression="currency" Visible="False" />
                <asp:BoundField DataField="price" HeaderText="价格" SortExpression="price" />
                <asp:BoundField DataField="details" HeaderText="details" 
                    SortExpression="details" Visible="False" />
                <asp:BoundField DataField="shop" HeaderText="门店" SortExpression="shop" />
                <asp:CheckBoxField DataField="hasimage" HeaderText="图" 
                    SortExpression="hasimage" />
                <asp:BoundField DataField="image" HeaderText="image" SortExpression="image" 
                    Visible="False" />
                <asp:BoundField DataField="updated_by" HeaderText="updated_by" 
                    SortExpression="updated_by" Visible="False" />
                <asp:BoundField DataField="updated_dt" HeaderText="updated_dt" 
                    SortExpression="updated_dt" Visible="False" />
                <asp:BoundField DataField="post_start" HeaderText="post_start" 
                    SortExpression="post_start" Visible="False" />
                <asp:BoundField DataField="post_end" HeaderText="post_end" 
                    SortExpression="post_end" Visible="False" />
                <asp:BoundField DataField="post_status" HeaderText="post_status" 
                    SortExpression="post_status" Visible="False" />
                <asp:BoundField DataField="approved_by" HeaderText="approved_by" 
                    SortExpression="approved_by" Visible="False" />
                <asp:BoundField DataField="approved_date" HeaderText="approved_date" 
                    SortExpression="approved_date" Visible="False" />
                <asp:CheckBoxField DataField="isDeleted" HeaderText="已删除" 
                    SortExpression="isDeleted" Visible="True" />
                <asp:BoundField DataField="deleted_by" HeaderText="deleted_by" 
                    SortExpression="deleted_by" Visible="False" />
                <asp:BoundField DataField="deleted_date" HeaderText="deleted_date" 
                    SortExpression="deleted_date" Visible="False" />
                <asp:BoundField DataField="closed_by" HeaderText="closed_by" 
                    SortExpression="closed_by" Visible="False" />
                <asp:BoundField DataField="closed_date" HeaderText="closed_date" 
                    SortExpression="closed_date" Visible="False" />
            </Columns>
        </asp:GridView>
    </p>
</asp:Content>

