<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_Product_manage_Action, App_Web_0kkxvrwp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
        &nbsp;
        <asp:Label ID="lb_title" runat="server"></asp:Label>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:XSDD %>" 
            SelectCommand="SELECT * FROM [product] WHERE (([id] = @id) AND ([isDeleted] = @isDeleted))">
            <SelectParameters>
                <asp:QueryStringParameter Name="id" QueryStringField="id" Type="Int32" />
                <asp:Parameter DefaultValue="false" Name="isDeleted" Type="Boolean" />
            </SelectParameters>
        </asp:SqlDataSource>
        <asp:DataList ID="DataList1" runat="server" DataKeyField="id" 
            DataSourceID="SqlDataSource1">
            <ItemTemplate>
                <table style="width:100%;">
                    <tr>
                        <td width="100px">
                            id:</td>
                        <td width="400px">
                            <asp:Label ID="idLabel" runat="server" Text='<%# Eval("id") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            门店:</td>
                        <td width="400">
                            <asp:Label ID="shopLabel" runat="server" Text='<%# Eval("shop") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            标题:</td>
                        <td width="400">
                            <asp:Label ID="nameLabel" runat="server" Text='<%# Eval("name") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            上网日期:</td>
                        <td width="400">
                            <asp:Label ID="post_startLabel" runat="server" 
                                Text='<%# Eval("post_start") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            下网日期:</td>
                        <td width="400">
                            <asp:Label ID="post_endLabel" runat="server" Text='<%# Eval("post_end") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            图片:</td>
                        <td width="400">
                            <asp:Image ID="Image1" runat="server" 
                                ImageUrl='<%# "~/images/product/"+Eval("image") %>' Width="400px" />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            价格</td>
                        <td width="400">
                            <asp:Label ID="priceLabel" runat="server" style="text-align: right" 
                                Text='<%# Eval("price") %>'></asp:Label>
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            正文:</td>
                        <td width="400">
                            <asp:Label ID="detailsLabel" runat="server" Text='<%# Eval("details") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            最后修改/操作员:</td>
                        <td width="400">
                            <asp:Label ID="updated_byLabel" runat="server" 
                                Text='<%# Eval("updated_by") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td width="100">
                            最后修改日期:</td>
                        <td width="400">
                            <asp:Label ID="updated_dtLabel" runat="server" 
                                Text='<%# Eval("updated_dt") %>' />
                        </td>
                    </tr>
                </table>
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

