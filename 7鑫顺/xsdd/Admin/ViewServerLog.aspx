<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_ViewServerLog, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="HeadContent" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
        AllowSorting="True" AutoGenerateColumns="False" DataKeyNames="id" 
        DataSourceID="SqlDataSource1" Width="868px">
        <Columns>
            <asp:BoundField DataField="id" HeaderText="id" InsertVisible="False" 
                ReadOnly="True" SortExpression="id">
            <ItemStyle Width="50px" />
            </asp:BoundField>
            <asp:BoundField DataField="Visit_IP" HeaderText="Visit_IP" 
                SortExpression="Visit_IP">
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="Visit_Time" HeaderText="Visit_Time" 
                SortExpression="Visit_Time">
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="Visit_Agent" HeaderText="Visit_Agent" 
                SortExpression="Visit_Agent">
            <ItemStyle Width="200px" />
            </asp:BoundField>
        </Columns>
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:CC-TEST %>" 
        SelectCommand="SELECT * FROM [Server_Log]"></asp:SqlDataSource>
</asp:Content>

