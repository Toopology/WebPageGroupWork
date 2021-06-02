<%@ page title="鑫顺典当 - 绝当品销售" language="C#" masterpagefile="~/mainpage.master" autoeventwireup="true" inherits="Jdqxs, App_Web_npfhy52l" %>

<%-- 在此处添加内容控件 --%>
<asp:Content ID="Content1" runat="server" contentplaceholderid="HeadContent">
    首页 -&gt; 绝当品销售
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="MainContent">
    
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:XSDD %>" 
            SelectCommand="SELECT * FROM [Product] where ((post_status= '2') and (cast(post_start as date)<= getdate() ) and (cast(post_end as date)>getdate()) and (isdeleted = 0))"></asp:SqlDataSource>
        
        <asp:MultiView ID="MultiView1" runat="server">
            <asp:View ID="View1" runat="server">
                <asp:DataList ID="DataList1" runat="server" DataKeyField="id" 
                     RepeatColumns="3" 
                    RepeatDirection="Horizontal" CellPadding="10" CellSpacing="20" 
                    Height="500px" HorizontalAlign="Center" Width="750px">
                    <ItemStyle VerticalAlign="Top" />
                    <ItemTemplate>
                         <table style="width:100%;">
                             <tr>
                                 <td height="150" width="200">
                             
                                    <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl='<%# Eval("id","jdpxs_details.aspx?id={0}" ) %>' 
                     
                                 
                                         Text='<%# Eval("image", "<img src=images/product/thumbnail/{0} height=150 border=0 />") %>' 
                                         Target="_blank" BorderColor="Gray" BorderStyle="Solid" BorderWidth="1px" ></asp:HyperLink>
                                 </td>
                             </tr>
                         </table>
                        <br />
                         <table style="width:100%;">
                             <tr>
                                 <td width="50">
                                     编号:</td>
                                 <td>
                                     <asp:Label ID="idLabel" runat="server" Text='<%# Eval("code") %>' />
                                 </td>
                             </tr>
                             <tr>
                                 <td width="50">
                                     名称:</td>
                                 <td>
                                     <asp:HyperLink ID="hl_name" runat="server" 
                                         NavigateUrl='<%# Eval("id","jdpxs_details.aspx?id={0}" ) %>' Target="_blank" 
                                         Text='<%# Eval("name") %>' ToolTip="点击查看明细"></asp:HyperLink>
                                 </td>
                             </tr>
                             <tr>
                                 <td width="50">
                                     价格:</td>
                                 <td>
                                     <asp:Label ID="currencyLabel" runat="server" Text='<%# Eval("currency") %>' />
                                     <asp:Label ID="priceLabel" runat="server" Text='<%# Eval("price") %>' />
                                 </td>
                             </tr>
                             <tr>
                                 <td width="50">
                                     门店:
                                 </td>
                                 <td>
                                     <asp:HyperLink ID="hpl_shop" runat="server" NavigateUrl="~/ContactUs.aspx" 
                                         Target="_blank" Text='<%# Eval("shop", "{0}") %>'></asp:HyperLink>
                                 </td>
                             </tr>
                         </table>
                         <br />
                 
                    </ItemTemplate>
                </asp:DataList>
                <table style="width:100%; ">
                    <tr>
                        <td width="150" style="text-align: right" valign="baseline" align="right" >
                            <asp:linkbutton ID="lkFir" OnCommand="IndexChanging" CommandArgument="fir" runat="server" >&lt;&lt;首页</asp:linkbutton>
                            </td>
                        <td style="text-align: center" width="50" valign="baseline">
                            <asp:linkbutton ID="lkPre" OnCommand="IndexChanging" CommandArgument="pre" runat="server" >&lt;上一页</asp:linkbutton>
                        </td>
                        <td width="250" align="center" valign="baseline">
                            <asp:Label ID="lb_1" runat="server" Text="第"></asp:Label>
                            <asp:Label ID="lb_pgindex" runat="server"></asp:Label>
                            <asp:Label ID="lb_2" runat="server" Text="页 共"></asp:Label>
                            <asp:Label ID="lb_pgcount" runat="server"></asp:Label>
                            <asp:Label ID="lb_3" runat="server" Text="页 "></asp:Label>
                            <asp:TextBox ID="tb_page" runat="server" ontextchanged="tb_page_TextChanged" 
                                Width="20px"></asp:TextBox>
                            <asp:Label ID="lb_4" runat="server" Text="页"></asp:Label>
                            <asp:Button ID="bt_jump" runat="server" onclick="bt_jump_Click" Text="跳转" />
                            <br />
                            <asp:Label ID="lb_pgerror" runat="server" ForeColor="Red"></asp:Label>
                        </td>
                        <td style="text-align: center" width="50" valign="baseline">
                            <asp:linkbutton ID="lkNext" OnCommand="IndexChanging" CommandArgument="next" runat="server" >下一页&gt;</asp:linkbutton>
                        </td>
                        <td width="150" valign="baseline">
                            <asp:linkbutton ID="lkEnd" OnCommand="IndexChanging" CommandArgument="end" runat="server" >尾页&gt;&gt;</asp:linkbutton>
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="150" style="text-align: right" align="right">
                            &nbsp;</td>
                        <td style="text-align: center" width="50">
                            &nbsp;</td>
                        <td width="250" align="center">
                            &nbsp;</td>
                        <td style="text-align: center" width="50">
                            &nbsp;</td>
                        <td width="150">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="150" style="text-align: right" align="right">
                            &nbsp;</td>
                        <td style="text-align: center" width="50">
                            &nbsp;</td>
                        <td width="250" align="center">
                            &nbsp;</td>
                        <td style="text-align: center" width="50">
                            &nbsp;</td>
                        <td width="150">
                            &nbsp;</td>
                    </tr>
                </table>
            </asp:View>
        </asp:MultiView>

        <asp:MultiView ID="MultiView2" runat="server">
            <asp:View ID="View2" runat="server">
                    <p></p>
                    <p></p>
                    <p></p>
                    <table style="width:100%;">
                        <tr>
                            <td align="center" width="97%">
                                <asp:Label ID="lb_Nocontent" runat="server" ForeColor="Red" 
                                    style="text-align: center; font-size: xx-large; font-family: 楷体" Text="暂无内容"></asp:Label>
                            </td>
                        </tr>
                    </table>

            </asp:View>
        </asp:MultiView>
    </asp:Content>

