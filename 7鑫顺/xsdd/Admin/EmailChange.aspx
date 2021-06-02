<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_EmailChange, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
            SelectCommand="SELECT * FROM [vw_aspnet_MembershipUsers] WHERE ([UserId] = @UserId)">
            <SelectParameters>
                <asp:QueryStringParameter Name="UserId" QueryStringField="UserId" 
                    Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:DetailsView ID="DetailsView1" runat="server" AutoGenerateRows="False" 
            DataSourceID="SqlDataSource1" GridLines="None" Height="50px" Width="400px">
            <Fields>
                <asp:BoundField DataField="UserName" HeaderText="用户名" 
                    SortExpression="UserName" >
                <HeaderStyle Width="100px" />
                <ItemStyle Width="300px" />
                </asp:BoundField>
                <asp:BoundField DataField="Email" HeaderText="原邮件地址" SortExpression="Email" >
                <HeaderStyle Width="100px" />
                <ItemStyle Width="300px" />
                </asp:BoundField>
            </Fields>
        </asp:DetailsView>
    </p>
    <p>
        <asp:Label ID="Label1" runat="server" Text="新邮箱地址" Width="100px"></asp:Label>
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
    <asp:Button ID="Button1" runat="server" Text="确认修改" onclick="Button1_Click" />
    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
        ControlToValidate="TextBox1" ErrorMessage="邮箱地址格式不正确" 
        ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
    </p>
    <p>
    <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
        ControlToValidate="TextBox1" ErrorMessage="请输入邮箱地址"></asp:RequiredFieldValidator>
    </p>
    <p>
        &nbsp;</p>
    <p>
        <asp:LinkButton ID="lbt_return" runat="server" onclick="LinkButton1_Click">返回上一页</asp:LinkButton>
    </p>
</asp:Content>

