<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_info_center_manager_Action, App_Web_ufm1hbli" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        <asp:Label ID="lb_title" runat="server"></asp:Label>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:XSDD %>" 
            SelectCommand="SELECT * FROM [Information] WHERE (([id] = @id) AND ([isDeleted] = @isDeleted))">
            <SelectParameters>
                <asp:QueryStringParameter Name="id" QueryStringField="id" Type="Int32" />
                <asp:Parameter DefaultValue="false" Name="isDeleted" Type="Boolean" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:DataList ID="DataList1" runat="server" DataKeyField="id" 
            DataSourceID="SqlDataSource1">
            <ItemTemplate>
                id:
                <asp:Label ID="idLabel" runat="server" Text='<%# Eval("id") %>' />
                <br />
                信息类型:
                <asp:Label ID="typeLabel" runat="server" Text='<%# Eval("type") %>' />
                <br />
                标题:
                <asp:Label ID="titleLabel" runat="server" Text='<%# Eval("title") %>' />
                <br />
                正文:
                <asp:Label ID="detailsLabel" runat="server" Text='<%# Eval("details") %>' />
                <br />
                最后修改/操作员:
                <asp:Label ID="updated_byLabel" runat="server" 
                    Text='<%# Eval("updated_by") %>' />
                <br />
                最后修改日期:
                <asp:Label ID="updated_dtLabel" runat="server" 
                    Text='<%# Eval("updated_dt") %>' />
                <br />
                上网日期:
                <asp:Label ID="post_startLabel" runat="server" 
                    Text='<%# Eval("post_start") %>' />
                <br />
                下网日期:
                <asp:Label ID="post_endLabel" runat="server" Text='<%# Eval("post_end") %>' />
                <br />
                <br />
<br />
            </ItemTemplate>
        </asp:DataList>
        &nbsp;&nbsp;&nbsp;&nbsp;<table style="width: 97%;">
            <tr>
                <td align="center" width="30%">
                    <asp:LinkButton ID="lbn1" runat="server" onclick="lbn1_Click"></asp:LinkButton>
                </td>
                <td align="center" width="30%">
                    <asp:LinkButton ID="lbn2" runat="server" onclick="lbn2_Click"></asp:LinkButton>
                </td>
                <td align="center" width="30%">
                    <asp:LinkButton ID="lbn3" runat="server" onclick="lbn3_Click"></asp:LinkButton>
                </td>
            </tr>
            </table>
        </p>
</asp:Content>
