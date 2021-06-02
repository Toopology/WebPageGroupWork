<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_Product_Entry, App_Web_xou05lob" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit.HTMLEditor" tagprefix="cc1" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
 
    <table style="width:100%;">
        <tr>
            <td>
                </td>
            <td style="text-align: center">
                <asp:Label ID="lb_head" runat="server" Font-Names="微软雅黑" Font-Size="Large" 
                    Font-Underline="True" Text="商品展示"></asp:Label>
&nbsp;<asp:Label ID="lb_Entrytype" runat="server" Font-Italic="False"></asp:Label>
                <asp:Label ID="lb_ErrorMsg" runat="server" Text=" "></asp:Label>
            </td>
            <td>
                &nbsp;</td>
        </tr>
    </table>
<asp:ScriptManager ID="ScriptManager1" runat="server" 
        EnableScriptGlobalization="True">
    </asp:ScriptManager>
    
    <table style="width: 97%;">
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_shop" runat="server" Text="门店"></asp:Label>
            </td>
            <td class="style3">
                <asp:DropDownList ID="ddl_shop" runat="server" style="text-align: left" 
                    onselectedindexchanged="ddl_shop_SelectedIndexChanged" Width="80px">
                </asp:DropDownList>
                <asp:RequiredFieldValidator ID="rfc_shop" runat="server" 
                    ControlToValidate="ddl_shop" ErrorMessage="门店不能为空！" ForeColor="Red"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_name" runat="server" Text="请输入名称"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_name" runat="server" Width="374px" MaxLength="50" 
                    style="text-align: left" ></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ErrorMessage="名称不能为空！" ForeColor="Red" ControlToValidate="tb_name" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_code" runat="server" Text="请输入编号"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_code" runat="server" MaxLength="20" Width="200px"></asp:TextBox>
                
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_PostStart" runat="server" Text="预定上网日期"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_PostStart" runat="server" style="text-align: left" 
                    Width="80px"></asp:TextBox>
                
                <asp:CalendarExtender ID="tb_PostStart_CalendarExtender" runat="server" 
                    TargetControlID="tb_PostStart">
                </asp:CalendarExtender>
                
                <asp:RequiredFieldValidator ID="rfv_poststart" runat="server" 
                    ControlToValidate="tb_PostStart" ErrorMessage="上网日期不能为空！" ForeColor="Red" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="rev_poststart" runat="server" 
                    ControlToValidate="tb_PostStart" ErrorMessage="请输入正确的日期！" ForeColor="Red" 
                    SetFocusOnError="True" 
                    ValidationExpression="^(?:(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)(?:0?2\1(?:29))$)|(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:(?:0?[13578]|1[02])\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\2(?:0?[1-9]|1\d|2[0-8]))$"></asp:RegularExpressionValidator>
                
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_PostEnd" runat="server" Text="预定下网日期"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_PostEnd" runat="server" style="text-align: left" 
                    Width="80px"></asp:TextBox>
                
                <asp:CalendarExtender ID="tb_PostEnd_CalendarExtender" runat="server" 
                    TargetControlID="tb_PostEnd">
                </asp:CalendarExtender>
                <asp:RequiredFieldValidator ID="rfv_postend" runat="server" 
                    ControlToValidate="tb_PostEnd" ErrorMessage="下网日期不能为空！" ForeColor="Red" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="rev_postend" runat="server" 
                    ControlToValidate="tb_PostEnd" ErrorMessage="请输入正确的日期！" ForeColor="Red" 
                    SetFocusOnError="True" 
                    ValidationExpression="^(?:(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00)))(\/|-|\.)(?:0?2\1(?:29))$)|(?:(?:1[6-9]|[2-9]\d)?\d{2})(\/|-|\.)(?:(?:(?:0?[13578]|1[02])\2(?:31))|(?:(?:0?[1,3-9]|1[0-2])\2(29|30))|(?:(?:0?[1-9])|(?:1[0-2]))\2(?:0?[1-9]|1\d|2[0-8]))$"></asp:RegularExpressionValidator>
                <asp:CompareValidator ID="cv_date" runat="server" 
                    ControlToCompare="tb_PostStart" ControlToValidate="tb_PostEnd" 
                    ErrorMessage="下网日期必须晚于上网日期！" ForeColor="Red" Operator="GreaterThanEqual" 
                    SetFocusOnError="True"></asp:CompareValidator>
            </td>
        </tr>
        <tr>
            <td class="style2" align="left" valign="top" width="100">
                <asp:Label ID="lb_image" runat="server" Text="图片"></asp:Label>
            </td>
            <td class="style3">
                <asp:MultiView ID="MultiView1" runat="server">
                    <asp:View ID="View1" runat="server">
                        <asp:Label ID="lb_prompt1" runat="server" Text="请选择图片(jpg,gif,img)上传："></asp:Label> 
                        <asp:Label ID="lb_imgnotice" runat="server" Text="(图片建议宽度为640像素，高度小于或等于480像素)"></asp:Label>
                        <br/>
                        <asp:FileUpload ID="FileUpload1" runat="server" />
                        <asp:Label ID="lb_imgerror" runat="server"></asp:Label>
                    </asp:View>
                </asp:MultiView>
                <asp:MultiView ID="MultiView2" runat="server">
                    <asp:View ID="View2" runat="server">
                        
                        <asp:Image ID="img_image" runat="server" Width="400px" />
                        <br />
                        <asp:LinkButton ID="lbn_Delpic" runat="server" onclick="lbn_Delpic_Click">删除</asp:LinkButton>
                        
                    </asp:View>
                </asp:MultiView>
            </td>
        </tr>
        <tr>
            <td class="style2" align="left" valign="top" width="100">
                <asp:Label ID="lb_price" runat="server" Text="价格"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_price" runat="server" style="text-align: right"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td class="style2" align="left" valign="top" width="100">
                <asp:Label ID="lb_Details" runat="server" Text="请输入正文"></asp:Label>
            </td>
            <td class="style3">
                <cc1:Editor ID="edt_Details" runat="server" Height="400px" />
                <asp:Label ID="lb_detail" runat="server" Visible="False"></asp:Label>
            </td>
        </tr>
        <tr>
            <td class="style2" align="left" valign="top" width="100">
                &nbsp;</td>
            <td class="style3">
                &nbsp;</td>
        </tr>
    </table>
    <br />
    <table style="width: 97%;">
        <tr>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn1" runat="server" onclick="lbn1_Click"></asp:LinkButton>
            </td>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn2" runat="server" onclick="lbn2_Click"></asp:LinkButton>
            </td>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn3" runat="server" onclick="lbn3_Click"></asp:LinkButton>
            </td>
        </tr>
    </table>
    <br />
    &nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br />
&nbsp;&nbsp;&nbsp;
    <br />
    &nbsp;&nbsp;&nbsp;
    <br />
    <br />
</asp:Content>
