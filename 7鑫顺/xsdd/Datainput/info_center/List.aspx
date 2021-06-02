<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_info_center_List, App_Web_df0ejd24" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 98px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    信息列表 
    <asp:Label ID="lb_type" runat="server" Visible="False"></asp:Label>
    <asp:Label ID="lb_status" runat="server"></asp:Label>
    <br />
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:XSDD %>" 
    SelectCommand="SELECT * FROM [Information] order by [id] desc"></asp:SqlDataSource>
    <table style="width:100%;">
        <tr>
            <td class="style2">
    信息类型：</td>
            <td>
                <asp:RadioButtonList ID="rbl_type" runat="server" 
        RepeatDirection="Horizontal" AutoPostBack="True" 
                    onselectedindexchanged="rbl_type_SelectedIndexChanged" 
                    style="height: 26px">
        <asp:ListItem>典当行规</asp:ListItem>
        <asp:ListItem>典当动态</asp:ListItem>
    </asp:RadioButtonList>
            </td>
            <td>
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style2">
    信息状态：</td>
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
            <td>
                &nbsp;</td>
        </tr>
    </table>
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
        DataKeyNames="id" DataSourceID="SqlDataSource1" AllowPaging="True" 
        Font-Size="Medium" GridLines="Horizontal" 
        onselectedindexchanged="GridView1_SelectedIndexChanged" 
         CssClass="gridview_m">
        <Columns>
            <asp:BoundField DataField="id" HeaderText="编号" InsertVisible="False" 
                ReadOnly="True" SortExpression="id" />
            <asp:BoundField DataField="type" HeaderText="type" SortExpression="type" 
                Visible="False" >
            <ItemStyle Width="50px" />
            </asp:BoundField>
            <asp:BoundField DataField="title" HeaderText="标题" SortExpression="title" >
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
            <ItemStyle Width="60px" />
            </asp:BoundField>
            <asp:BoundField DataField="updated_dt" HeaderText="最后更新日期" 
                SortExpression="updated_dt" >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" />
            </asp:BoundField>
            <asp:BoundField DataField="approved_by" HeaderText="批准人" 
                SortExpression="approved_by"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="60px" />
            </asp:BoundField>
            <asp:BoundField DataField="approved_date" HeaderText="批准日期" 
                SortExpression="approved_date"  >
            <HeaderStyle HorizontalAlign="Center" />
            <ItemStyle Width="100px" />
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
                SortExpression="deleted_date" >
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
        <HeaderStyle Font-Size="Small" />
        <RowStyle Font-Size="Small" />
    </asp:GridView>
</asp:Content>

