<%@ page title="" language="C#" masterpagefile="~/mainpage.master" autoeventwireup="true" inherits="Jdpxs_details, App_Web_npfhy52l" %>

<%-- 在此处添加内容控件 --%>
<asp:Content ID="Content1" runat="server" contentplaceholderid="HeadContent">
    首页 -&gt; 绝当品销售
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="MainContent">
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:XSDD %>" 
        SelectCommand="SELECT * FROM [Product] WHERE ([id] = @id)">
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
                        <asp:BoundField DataField="name" HeaderText="name" SortExpression="name" />
                    </Columns>
                </asp:GridView>
            </span></td>
        </tr>
    </table>


    <table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td width="79%" height="18"><span class="STYLE3"></span></td>
            <td width="21%" align="right">
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click"><关闭></关闭></asp:LinkButton>
            </td>
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
    <asp:FormView ID="FormView1" runat="server" DataKeyNames="id" 
        DataSourceID="SqlDataSource1" HorizontalAlign="Left" Width="100%">
        
        
        <ItemTemplate>
            &nbsp;<table style="width:100%;">
                <tr>
                    <td>
                        &nbsp;</td>
                    <td width="400">
                        <asp:ImageButton ID="ImageButton" runat="server" 
                            CommandArgument='<%# Eval("image", "{0}") %>' 
                            CommandName='<%# Eval("image", "{0}") %>' ImageAlign="AbsMiddle" 
                            ImageUrl='<%# Eval("image", "~/images/product/{0}") %>' 
                            style="text-align: center" Width="400px" onclick="ImageButton_Click" 
                            ToolTip="点击查看大图" BorderColor="Gray" BorderStyle="Groove" />
                    </td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td width="400">
                        编号:
                        <asp:Label ID="idLabel" runat="server" Text='<%# Eval("code") %>' />
                    </td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td width="400">
                        价格:
                        <asp:Label ID="currencyLabel" runat="server" Text='<%# Bind("currency") %>' />
                        <asp:Label ID="priceLabel" runat="server" Text='<%# Bind("price") %>' />
                    </td>
                    <td>
                        &nbsp;</td>
                </tr>
                <tr>
                    <td>
                        &nbsp;</td>
                    <td width="400">
                        门店:
                        <asp:HyperLink ID="hpl_shop" runat="server" NavigateUrl="~/ContactUs.aspx" 
                            Target="_blank" Text='<%# Eval("shop", "{0}") %>'></asp:HyperLink>
                    </td>
                    <td>
                        &nbsp;</td>
                </tr>
            </table>
            <br />
            <table style="width:100%;">
                <tr>
                    <td width="100">
                        &nbsp;</td>
                    <td width="800">
                        <asp:Label ID="detailsLabel" runat="server" style="text-align: left" 
                            Text='<%# Bind("details") %>' Width="97%" />
                    </td>
                    <td width="100">
                        &nbsp;</td>
                </tr>
            </table>
            <br />
        </ItemTemplate>
    </asp:FormView>

    <tr>
                <td valign="top" class="t13">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td height="62" align="right">
                        <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton1_Click"><关闭></关闭></asp:LinkButton>
                      </td>
                    </tr>
                </table></td>
              </tr>
</asp:Content>

