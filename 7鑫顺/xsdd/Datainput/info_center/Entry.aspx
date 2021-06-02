<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Datainput_Xxzx_Ddhg_Ddhw_Input, App_Web_df0ejd24" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit.HTMLEditor" tagprefix="cc1" %>

<%@ Register assembly="AjaxControlToolkit" namespace="AjaxControlToolkit" tagprefix="asp" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style2
        {
            width: 113px;
        }
        .style3
        {
            width: 756px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    
    <table style="width:100%;">
        <tr>
            <td>
                </td>
            <td style="text-align: center">
                <asp:Label ID="lb_head" runat="server" Font-Names="微软雅黑" Font-Size="Large" 
                    Font-Underline="True" Text="信息中心"></asp:Label>
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
                <asp:Label ID="lb_Type" runat="server" Text="信息类型"></asp:Label>
            </td>
            <td class="style3">
                <asp:DropDownList ID="ddl_Type" runat="server" style="text-align: center">
                    <asp:ListItem>典当行规</asp:ListItem>
                    <asp:ListItem>典当动态</asp:ListItem>
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_Title" runat="server" Text="请输入标题"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_Title" runat="server" Width="374px" MaxLength="50"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ErrorMessage="标题不能为空！" ForeColor="Red" ControlToValidate="tb_Title" 
                    SetFocusOnError="True"></asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style2" width="100">
                <asp:Label ID="lb_PostStart" runat="server" Text="预定上网日期"></asp:Label>
            </td>
            <td class="style3">
                <asp:TextBox ID="tb_PostStart" runat="server" style="text-align: center" 
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
                <asp:TextBox ID="tb_PostEnd" runat="server" style="text-align: center" 
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
                <asp:Label ID="lb_Details" runat="server" Text="请输入正文"></asp:Label>
            </td>
            <td class="style3">
                <asp:Label ID="lb_detail" runat="server" Visible="False"></asp:Label>
                <cc1:Editor ID="edt_Details" runat="server" Height="600px" />
            </td>
        </tr>
    </table>
    <br />
    <table style="width: 97%;">
        <tr>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn1" runat="server" onclick="lbn1_Click1"></asp:LinkButton>
            </td>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn2" runat="server" onclick="lbn2_Click1"></asp:LinkButton>
            </td>
            <td align="center" width="30%" height="40">
                <asp:LinkButton ID="lbn3" runat="server" onclick="lbn3_Click1"></asp:LinkButton>
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

