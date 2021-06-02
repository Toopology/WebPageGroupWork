<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_DeleteUser, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        确定要删除该用户吗？</p>
    <p>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
            SelectCommand="SELECT * FROM [vw_aspnet_Users] WHERE ([UserId] = @UserId)">
            <SelectParameters>
                <asp:QueryStringParameter Name="UserId" QueryStringField="UserId" 
                    Type="Object" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            DataKeyNames="ApplicationId,LoweredUserName" DataSourceID="SqlDataSource1" 
            GridLines="None" ShowHeader="False" Width="67px">
            <Columns>
                <asp:BoundField DataField="UserName" HeaderText="UserName" 
                    SortExpression="UserName" />
            </Columns>
        </asp:GridView>
    </p>
    <p>
        <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">是</asp:LinkButton>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">不是</asp:LinkButton>
    </p>
</asp:Content>

