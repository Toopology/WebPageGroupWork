<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="BackOffice_Admin_RoleManageUser, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style1
        {
            width: 209px;
        }
        .style2
        {
            width: 71px;
        }
        .style3
        {
            width: 137px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <strong>[用户信息]</strong><br />
    <asp:Label ID="Label2" runat="server" Font-Underline="True"></asp:Label>
    <br />
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
        
        SelectCommand="SELECT * FROM [vw_aspnet_MembershipUsers] WHERE ([UserId] = @UserId)" 
        UpdateCommand="UPDATE aspnet_Membership SET IsLockedOut = @IsLockedOut WHERE (UserId = @UserId)">
        <SelectParameters>
            <asp:QueryStringParameter Name="UserId" QueryStringField="UserID" 
                Type="String" />
        </SelectParameters>
        <UpdateParameters>
            <asp:Parameter Name="IsLockedOut" />
            <asp:Parameter Name="UserId" />
        </UpdateParameters>
    </asp:SqlDataSource>
    <asp:DetailsView ID="DetailsView2" runat="server" AutoGenerateRows="False" 
        DataSourceID="SqlDataSource2" Height="50px" Width="400px" GridLines="None">
        <Fields>
            <asp:BoundField DataField="UserId" HeaderText="UserId" ReadOnly = "true" 
                SortExpression="UserId" Visible="False" />
            <asp:BoundField DataField="UserName" HeaderText="用户名" ReadOnly = "true" 
                SortExpression="UserName" >
            <HeaderStyle Width="100px" />
            <ItemStyle Width="300px" />
            </asp:BoundField>
            <asp:BoundField DataField="PasswordFormat" HeaderText="PasswordFormat" ReadOnly = "true" 
                SortExpression="PasswordFormat" Visible="False" />
            <asp:BoundField DataField="MobilePIN" HeaderText="MobilePIN" ReadOnly = "true" 
                SortExpression="MobilePIN" Visible="False" />
            <asp:BoundField DataField="Email" HeaderText="邮件地址" ReadOnly = "true" 
                SortExpression="Email" />
            <asp:BoundField DataField="LoweredEmail" HeaderText="LoweredEmail" ReadOnly = "true" 
                SortExpression="LoweredEmail" Visible="False" />
            <asp:BoundField DataField="PasswordQuestion" HeaderText="密码问题" ReadOnly = "true" 
                SortExpression="PasswordQuestion" Visible="False" />
            <asp:BoundField DataField="PasswordAnswer" HeaderText="PasswordAnswer" ReadOnly = "true" 
                SortExpression="PasswordAnswer" Visible="False" />
            <asp:TemplateField HeaderText="在用" SortExpression="IsApproved">
                <InsertItemTemplate>
                    <asp:CheckBox ID="CheckBox2" runat="server" 
                        Checked='<%# Bind("IsApproved") %>' />
                </InsertItemTemplate>
                <ItemTemplate>
                    <asp:CheckBox ID="CheckBox2" runat="server" Checked='<%# Bind("IsApproved") %>' 
                        Enabled="false" />
                </ItemTemplate>
            </asp:TemplateField>
            <asp:TemplateField HeaderText="被锁定" SortExpression="IsLockedOut"> 
                <EditItemTemplate>
                    <asp:CheckBox ID="CheckBox1" runat="server" 
                        Checked='<%# Bind("IsLockedOut") %>' />
                </EditItemTemplate>
                <InsertItemTemplate>
                    <asp:CheckBox ID="CheckBox1" runat="server" 
                        Checked='<%# Bind("IsLockedOut") %>' />
                </InsertItemTemplate>
                <ItemTemplate>
                    <asp:CheckBox ID="CheckBox1" runat="server" 
                        Checked='<%# Bind("IsLockedOut") %>' Enabled="false" />
                </ItemTemplate>
            </asp:TemplateField>
            <asp:BoundField DataField="CreateDate" HeaderText="创建日期" ReadOnly = "true" 
                SortExpression="CreateDate" />
            <asp:BoundField DataField="LastLoginDate" HeaderText="上次登录日期" ReadOnly = "true" 
                SortExpression="LastLoginDate" />
            <asp:BoundField DataField="LastPasswordChangedDate" ReadOnly = "true" 
                HeaderText="上次密码修改" SortExpression="LastPasswordChangedDate" />
            <asp:BoundField DataField="LastLockoutDate" HeaderText="上次锁定日期" ReadOnly = "true" 
                SortExpression="LastLockoutDate" />
            <asp:BoundField DataField="FailedPasswordAttemptCount" ReadOnly = "true" 
                HeaderText="密码错误次数" 
                SortExpression="FailedPasswordAttemptCount" />
            <asp:BoundField DataField="FailedPasswordAttemptWindowStart" ReadOnly = "true" 
                HeaderText="FailedPasswordAttemptWindowStart" 
                SortExpression="FailedPasswordAttemptWindowStart" Visible="False" />
            <asp:BoundField DataField="FailedPasswordAnswerAttemptCount" ReadOnly = "true" 
                HeaderText="FailedPasswordAnswerAttemptCount" 
                SortExpression="FailedPasswordAnswerAttemptCount" Visible="False" />
            <asp:BoundField DataField="FailedPasswordAnswerAttemptWindowStart" ReadOnly = "true" 
                HeaderText="FailedPasswordAnswerAttemptWindowStart" 
                SortExpression="FailedPasswordAnswerAttemptWindowStart" Visible="False" />
            <asp:BoundField DataField="Comment" HeaderText="备注" ReadOnly = "true" 
                SortExpression="Comment" />
            <asp:BoundField DataField="ApplicationId" HeaderText="ApplicationId" ReadOnly = "true" 
                SortExpression="ApplicationId" Visible="False" />
            <asp:BoundField DataField="MobileAlias" HeaderText="MobileAlias" ReadOnly = "true" 
                SortExpression="MobileAlias" Visible="False" />
            <asp:CheckBoxField DataField="IsAnonymous" HeaderText="IsAnonymous" ReadOnly = "true" 
                SortExpression="IsAnonymous" Visible="False" />
            <asp:BoundField DataField="LastActivityDate" HeaderText="最后活动日期" ReadOnly = "true" 
                SortExpression="LastActivityDate" />
            
        </Fields>
    </asp:DetailsView>
    <br />
    &nbsp;<asp:Label ID="lb_locked" runat="server" Text="Label"></asp:Label>
&nbsp;&nbsp;&nbsp;
    <asp:Button ID="btn_unlock" runat="server" onclick="lbn_unlock_Click" 
        Text="解锁" />
    &nbsp;&nbsp;&nbsp;
    <asp:Button ID="btn_Approve" runat="server" ForeColor="Red" 
        onclick="btn_Approve_Click" Text="停用" />
    <br />
    <br />
&nbsp;<asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click">修改邮箱地址</asp:LinkButton>
    &nbsp;&nbsp;
&nbsp;&nbsp;&nbsp; 
    <br />
    <br />
    <asp:HyperLink ID="HyperLink8" runat="server" Font-Bold="True">[用户权限设定]</asp:HyperLink>
    <br />
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" SelectCommand="SELECT aspnet_UsersInRoles.UserId, aspnet_UsersInRoles.RoleId, aspnet_Roles.RoleName, aspnet_Roles.Description FROM aspnet_UsersInRoles INNER JOIN aspnet_Roles ON aspnet_UsersInRoles.RoleId = aspnet_Roles.RoleId
WHERE (RoleName like '门店-%') and (UserId = @UserId)">
        <SelectParameters>
            <asp:QueryStringParameter Name="UserId" QueryStringField="UserID" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
        
        
        SelectCommand="SELECT ApplicationId, RoleId, RoleName, LoweredRoleName, Description FROM aspnet_Roles  WHERE (RoleName like '门店-%') and (RoleId NOT IN (SELECT RoleId FROM aspnet_UsersInRoles WHERE (UserId = @UserId)))">
        <SelectParameters>
            <asp:QueryStringParameter Name="UserId" QueryStringField="UserId" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" SelectCommand="SELECT aspnet_UsersInRoles.UserId, aspnet_UsersInRoles.RoleId, aspnet_Roles.RoleName, aspnet_Roles.Description FROM aspnet_UsersInRoles INNER JOIN aspnet_Roles ON aspnet_UsersInRoles.RoleId = aspnet_Roles.RoleId
        WHERE (RoleName not like '门店-%') and (UserId = @UserId)">
        <SelectParameters>
            <asp:QueryStringParameter Name="UserId" QueryStringField="UserID" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource6" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ApplicationServices %>" 
        
        
        SelectCommand="SELECT ApplicationId, RoleId, RoleName, LoweredRoleName, Description FROM aspnet_Roles  WHERE (RoleName not like '门店-%') and (RoleId NOT IN (SELECT RoleId FROM aspnet_UsersInRoles WHERE (UserId = @UserId)))">
        <SelectParameters>
            <asp:QueryStringParameter Name="UserId" QueryStringField="UserId" />
        </SelectParameters>
    </asp:SqlDataSource>
    <table style="width:410px;">
        <tr>
            <td class="style3" width="200px" valign="top">
                <strong>所属门店</strong></td>
            <td class="style2" width="10px">
                &nbsp;</td>
            <td width="200px" valign="top">
                <strong>可添加门店</strong></td>
        </tr>
        <tr>
            <td class="style3" width="200px" valign="top">
                <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="UserId,RoleId" DataSourceID="SqlDataSource3" Width="233px" 
                    GridLines="None" ShowHeader="False">
                    <Columns>
                        <asp:BoundField DataField="UserId" HeaderText="UserId" ReadOnly="True" 
                            SortExpression="UserId" Visible="False" />
                        <asp:BoundField DataField="RoleId" HeaderText="RoleId" ReadOnly="True" 
                            SortExpression="RoleId" Visible="False" />
                        <asp:BoundField DataField="RoleName" HeaderText="RoleName" 
                            SortExpression="RoleName" >
                        <ItemStyle Width="150px" />
                        </asp:BoundField>
                        <asp:BoundField DataField="Description" HeaderText="Description" 
                            SortExpression="Description" Visible="False" />

                        <asp:HyperLinkField DataNavigateUrlFields="UserID,RoleId" 
                            DataNavigateUrlFormatString="DeleteRole.aspx?UserID={0}&RoleId={1}"
                            Text="删除" >

                        <ItemStyle Width="50px" />
                        </asp:HyperLinkField>

                    </Columns>
                </asp:GridView>
            </td>
            <td class="style2" width="10px">
                &nbsp;</td>
            <td width="200px" valign="top">
                <asp:CheckBoxList ID="CheckBoxList1" runat="server" 
                    DataSourceID="SqlDataSource4" DataTextField="RoleName" DataValueField="RoleId">
                </asp:CheckBoxList>
                <br />
                <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click">添加</asp:LinkButton>
            </td>
        </tr>
        <tr>
            <td class="style3" width="200px" valign="top">
                &nbsp;</td>
            <td class="style2" width="10px">
                &nbsp;</td>
            <td width="200px" valign="top">
                &nbsp;</td>
        </tr>
        <tr>
            <td class="style3" width="200px" valign="top">
                <strong>所属职能</strong></td>
            <td class="style2" width="10px">
                &nbsp;</td>
            <td width="200px" valign="top">
                <strong>可添加职能</strong></td>
        </tr>
        <tr>
            <td class="style3" width="200px" valign="top">
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="UserId,RoleId" DataSourceID="SqlDataSource5" Width="233px" 
                    GridLines="None" ShowHeader="False">
                    <Columns>
                        <asp:BoundField DataField="UserId" HeaderText="UserId" ReadOnly="True" 
                            SortExpression="UserId" Visible="False" />
                        <asp:BoundField DataField="RoleId" HeaderText="RoleId" ReadOnly="True" 
                            SortExpression="RoleId" Visible="False" />
                        <asp:BoundField DataField="RoleName" HeaderText="RoleName" 
                            SortExpression="RoleName" >
                        <ItemStyle Width="150px" />
                        </asp:BoundField>
                        <asp:BoundField DataField="Description" HeaderText="Description" 
                            SortExpression="Description" Visible="False" />

                        <asp:HyperLinkField DataNavigateUrlFields="UserID,RoleId" 
                            DataNavigateUrlFormatString="DeleteRole.aspx?UserID={0}&RoleId={1}"
                            Text="删除" >

                        <ItemStyle Width="50px" />
                        </asp:HyperLinkField>

                    </Columns>
                </asp:GridView>&nbsp;</td>
            <td class="style2" width="10px">
                &nbsp;</td>
            <td width="200px" valign="top">
                <asp:CheckBoxList ID="CheckBoxList2" runat="server" 
                    DataSourceID="SqlDataSource6" DataTextField="RoleName" DataValueField="RoleId">
                </asp:CheckBoxList>
                <br />
                <asp:LinkButton ID="LinkButton4" runat="server" onclick="LinkButton4_Click">添加</asp:LinkButton>
                </td>
        </tr>
    </table>
    <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click" 
        ForeColor="Red">删除该用户</asp:LinkButton>
    <br />
    </asp:Content>

