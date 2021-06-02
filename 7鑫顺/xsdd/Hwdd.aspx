<%@ page title="鑫顺典当 - 典当动态" language="C#" masterpagefile="~/mainpage.master" autoeventwireup="true" inherits="Hwdd, App_Web_npfhy52l" %>

<%-- 在此处添加内容控件 --%>
<asp:Content ID="Content1" runat="server" contentplaceholderid="HeadContent">
    首页 -&gt; 典当动态
</asp:Content>
<asp:Content ID="Content2" runat="server" contentplaceholderid="MainContent">
    <p>
        
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:XSDD %>" 
            
            SelectCommand="SELECT * FROM [vw_HWDD] order by approved_date desc">
            
        </asp:SqlDataSource>
        
        <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
            AutoGenerateColumns="False" DataKeyNames="id" DataSourceID="SqlDataSource1" 
            GridLines="None" ShowHeader="False" PageSize="15">
            <Columns>
                
                <asp:BoundField DataField="id" HeaderText="id" InsertVisible="False" 
                    ReadOnly="True" SortExpression="id" DataFormatString="&#8226;" >
                <ItemStyle Font-Bold="False" Font-Size="X-Large" Width="20px" />
                </asp:BoundField>
                <asp:HyperLinkField DataNavigateUrlFields="id,type" 
                    DataNavigateUrlFormatString="viewinformation.aspx?id={0}&type={1}" DataTextField="title">
                <ItemStyle Width="400px" />
                </asp:HyperLinkField>
                <asp:BoundField DataField="post_start" HeaderText="updated_dt" 
                    SortExpression="updated_dt" DataFormatString="{0:MM-dd}" />
            </Columns>
            <PagerSettings FirstPageText="首页" LastPageText="尾页" NextPageText="下一页" 
                PreviousPageText="上一页;" />
            <RowStyle Font-Size="Large" Height="30px" />
        </asp:GridView>
        
    </p>
</asp:Content>

