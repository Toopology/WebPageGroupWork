<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_Product_List, App_Web_xou05lob" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style4
        {
            width: 623px;
        }
        .style5
        {
            font-size: small;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    &nbsp;<br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:XSDD %>" 
    SelectCommand="SELECT * FROM [product]"></asp:SqlDataSource>
    <table style="width: 400px;">
        <tr>
            <td>
    <asp:Label ID="lb_type" runat="server" Visible="False"></asp:Label>
    <asp:Label ID="lb_status" runat="server"></asp:Label>
                商品</td>
        </tr>
</table>
    <table style="width:400;">
        <tr>
            <td width="100">
                所属门店</td>
            <td width="100">
    <asp:DropDownList ID="ddl_shop" runat="server" AutoPostBack="True" 
        onselectedindexchanged="ddl_shop_SelectedIndexChanged">
    </asp:DropDownList>
            </td>
            <td width="100">
                名称查询</td>
            <td class="style4">
                <asp:TextBox ID="tb_find" runat="server"></asp:TextBox>
                <asp:Button ID="btn_find" runat="server" onclick="btn_find_Click" Text="查找" />
            &nbsp;&nbsp;&nbsp; 编号查询&nbsp; 
                <asp:TextBox ID="tb_findcode" runat="server"></asp:TextBox>
                <asp:Button ID="bt_findcode" runat="server" onclick="bt_findcode_Click" 
                    Text="查找" />
            </td>
            <td>
            </td>
        </tr>
        </table>
    <table style="width:83%;">
        <tr>
            <td class="style5">
                商品状态：</td>
            <td>
                <asp:RadioButtonList ID="rbl_status" runat="server" AutoPostBack="True" 
        onselectedindexchanged="RadioButtonList1_SelectedIndexChanged" 
        RepeatDirection="Horizontal">
        <asp:ListItem>准备中</asp:ListItem>
        <asp:ListItem>待审核</asp:ListItem>
        <asp:ListItem>上网中</asp:ListItem>
        <asp:ListItem>已下网或上网时间未到</asp:ListItem>
        <asp:ListItem>已删除</asp:ListItem>
    </asp:RadioButtonList>
            </td>
        </tr>
    </table>
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        DataKeyNames="id" DataSourceID="SqlDataSource1" AllowPaging="True" 
        Font-Size="Medium" GridLines="Horizontal" onselectedindexchanged="GridView1_SelectedIndexChanged" 
        CssClass="gridview_m">
        <Columns>
            <asp:BoundField DataField="code" HeaderText="编号" InsertVisible="False" 
                ReadOnly="True" SortExpression="id" />
            
            <asp:CheckBoxField DataField="hasimage" HeaderText="图" runat="server" >
            
            <FooterStyle HorizontalAlign="Center" />
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle HorizontalAlign="Center" Width="20px" />
            </asp:CheckBoxField>
            
            <asp:BoundField DataField="name" HeaderText="名称" SortExpression="title" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="post_start" HeaderText="上网日期" 
                SortExpression="post_start" DataFormatString="{0:yyyy年MM月dd日}" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="post_end" HeaderText="下网日期" 
                SortExpression="post_end" DataFormatString="{0:yyyy年MM月dd日}"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="updated_by" HeaderText="最后更新" 
                SortExpression="updated_by"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="60px" HorizontalAlign="Center" />
            </asp:BoundField>
            <asp:BoundField DataField="updated_dt" HeaderText="最后更新日期" 
                SortExpression="updated_dt" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" HorizontalAlign="Center" />
            </asp:BoundField>
            <asp:BoundField DataField="approved_by" HeaderText="批准人" 
                SortExpression="approved_by"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="60px" />
            </asp:BoundField>
            <asp:BoundField DataField="approved_date" HeaderText="批准日期" 
                SortExpression="approved_date"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" HorizontalAlign="Center" />
            </asp:BoundField>
            <asp:BoundField DataField="post_status" HeaderText="最后状态" 
                SortExpression="post_status" Visible="False"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="50px" />
            </asp:BoundField>
            <asp:BoundField DataField="closed_by" HeaderText="关闭者" ReadOnly="True" 
                SortExpression="closed_by" >
            
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle HorizontalAlign="Center" Width="60px" />
            </asp:BoundField>
            
            <asp:BoundField DataField="closed_date" HeaderText="关闭日期" ReadOnly="True" 
                SortExpression="closed_date" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle HorizontalAlign="Center" Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="deleted_by" HeaderText="删除者" ReadOnly="True" 
                SortExpression="deleted_by" >
            
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle HorizontalAlign="Center" Width="60px" />
            </asp:BoundField>
            <asp:BoundField DataField="deleted_date" HeaderText="删除日期" ReadOnly="True" 
                SortExpression="deleted_tate" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle HorizontalAlign="Center" Width="100px" />
            </asp:BoundField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="entry.aspx?method=0&amp;id={0}" Text="查看" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="entry.aspx?method=2&amp;id={0}" Text="修改" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="manage/action.aspx?action=0&amp;id={0}" Text="退回" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="manage/action.aspx?action=1&amp;id={0}" Text="核准" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="manage/action.aspx?action=2&amp;id={0}" Text="下网" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            <asp:HyperLinkField DataNavigateUrlFields="id" 
                DataNavigateUrlFormatString="manage/action.aspx?action=3&amp;id={0}" Text="删除" >
            <HeaderStyle BorderStyle="None" />
            <ItemStyle HorizontalAlign="Center" Width="40px" />
            </asp:HyperLinkField>
            
            
        </Columns>
        <HeaderStyle Font-Size="Small" BorderStyle="None" />
        <RowStyle Font-Size="Small" BorderStyle="None" />
    </asp:GridView>
</asp:Content>

