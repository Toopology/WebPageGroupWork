<%@ page title="" language="C#" masterpagefile="~/Datainput/MasterPage.master" autoeventwireup="true" inherits="Account_ResetPassword, App_Web_0uhcuhou" %>

<asp:Content ID="Content1" runat="server" ContentPlaceHolderID="head">
</asp:Content>
<asp:Content ID="Content2" runat="server" ContentPlaceHolderID="ContentPlaceHolder1">
    <asp:PasswordRecovery ID="PasswordRecovery1" runat="server" 
        UserNameInstructionText="请输入要重设密码的用户名。" UserNameTitleText="新密码将发送到登记的邮箱" 
        UserNameFailureText="请确认账户名称以及该账户是否被锁定。" SuccessText="密码已发送给用户。">
        <MailDefinition BodyFileName="~/Admin/Mail/PswdReset.txt" 
            Subject="鑫顺网站后台密码重置邮件" CC="caoyk@hhkg.com.cn">
        </MailDefinition>
</asp:PasswordRecovery>
<br />
</asp:Content>

