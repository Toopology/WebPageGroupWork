<%@ page title="" language="C#" masterpagefile="~/mainpage.master" autoeventwireup="true" inherits="viewinformation, App_Web_npfhy52l" %>

<%-- 在此处添加内容控件 --%>

<asp:Content ID="Content1" runat="server" contentplaceholderid="HeadContent">
        首页 -&gt; <%-- 在此处添加内容控件 --%>
        <asp:Label ID="lb_type" runat="server"></asp:Label>
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="MainContent">
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:XSDD %>" 
        SelectCommand="SELECT * FROM [Information] WHERE ([id] = @id)">
        <SelectParameters>
            <asp:QueryStringParameter Name="id" QueryStringField="id" Type="Int32" />
        </SelectParameters>
    </asp:SqlDataSource>

    <table width="100%" height="53" border="0" cellpadding="6" cellspacing="0">
        <tr>
            <td height="53" align="center"><span class="STYLE4">
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                DataKeyNames="id" DataSourceID="SqlDataSource1" 
                Font-Size="X-Large" GridLines="None" ShowHeader="False" 
                >
                    <Columns>
                        <asp:BoundField DataField="title" HeaderText="title" SortExpression="title" />
                    </Columns>
                </asp:GridView>
            </span></td>
        </tr>
    </table>


    <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td width="79%" height="18"><span class="STYLE3"></span></td>
            <td width="21%" align="right"><a href="javascript:history.back();" target="_self">&lt;&lt;返回上一页</a></td>
        </tr>
        <tr>
            <td height="19" colspan="2">
                <table width="100%" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
                    <tr>
                        <td>
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    
    <asp:DataList ID="DataList1" runat="server" DataKeyField="id" 
        DataSourceID="SqlDataSource1">
        <ItemTemplate>
           
            <asp:Label ID="id1" runat ="server" Text ='<%#Eval("details") %>' />
            
            <br />
            <br />
        </ItemTemplate>
    </asp:DataList>
    <tr>
                <td valign="top" class="t13">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td height="62" align="right"><a href="javascript:history.back();" target="_self">&lt;&lt;返回上一页</a></td>
                    </tr>
                </table></td>
              </tr>
</asp:Content>

