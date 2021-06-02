using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net.Mail;
using System.Configuration;
using System.IO;
public partial class mainpage : System.Web.UI.MasterPage
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
       MailAddress Messagefrom = new MailAddress(System.Configuration.ConfigurationManager.AppSettings["MessageFrom"]);

      // MailAddress Messagefrom = new MailAddress("xinshunkf@163.com");
        string MessageTo = System.Configuration.ConfigurationManager.AppSettings["MessageTo"];
        string MessageSubject ="鑫顺留言";
        //邮件主题
        string MessageBody = this.messageTXT.Text;    //邮件内容
        string BodySex = "";

        if (this.RadioButton1.Checked)
        {
            BodySex = "先生";
            // MessageSubject = this.name.Text + BodySex + "联系电话：" + this.phone.Text +"联系邮箱：" + this.email.Text;
        }
        if (this.RadioButton2.Checked)
        {
            BodySex = "女士";

        }
        if (this.messageTXT.Text.ToString().Trim() != "")
        {
            MessageBody = "在线留言:" + this.MessName.Text + BodySex + "联系电话：" + this.Messphone.Text + "联系邮箱：" + this.MessEmail.Text + "\n" +this.messageTXT.Text;
           
            if (Send(Messagefrom, MessageTo, MessageSubject, MessageBody))
            {
                Response.Write("<script type='text/javascript'>alert('留言成功，感谢您的留言！');history.go(-1)</script>");//发送成功则提示返回当前页面；
            
               

            }
            else
            {
                Response.Write("<script type='text/javascript'>alert('留言失败！');history.go(-1)</script>");
            }


        }
        else {
            Response.Write("<script type='text/javascript'>alert('请输入留言内容，谢谢');history.go(-1)</script>");
        }
       
       

    }

    public static bool Send(MailAddress Messagefrom, string MessageTo, string MessageSubject, string MessageBody)
    {
        MailMessage message = new MailMessage();//创建一个邮件信息的对象
        message.From = Messagefrom;
        message.To.Add(MessageTo);              //收件人邮箱地址可以是多个以实现群发
        message.Subject = MessageSubject;
        message.Body = MessageBody;
        message.IsBodyHtml = false;              //是否为html格式
        message.Priority = MailPriority.High;  //发送邮件的优先等级
        SmtpClient sc = new SmtpClient();       //简单邮件传输协议（Simple Message Transfer Protocol）
        //sc.Host = "218.83.160.6";              //指定发送邮件的服务器地址或IP 使用其它邮箱的发送 需做更改ru：smtp。126.com        

        sc.Host = "smtp.163.com";
        //message.IsBodyHtml = true;            //指定邮件格式,支持HTML格式          
        message.BodyEncoding = System.Text.Encoding.GetEncoding("GB2312");//邮件采用的编码  
        sc.Port = 25;                          //指定发送邮件端口
        sc.UseDefaultCredentials = false;
        sc.EnableSsl = false;
        
        sc.Credentials = new System.Net.NetworkCredential(System.Configuration.ConfigurationManager.AppSettings["MessageFrom"], System.Configuration.ConfigurationManager.AppSettings["pwd"]); //指定登录服务器的用户名和密码
        //sc.Credentials = new System.Net.NetworkCredential("xinshunkf@163.com", "hh11681");
        try
        {
            sc.Send(message);      //发送邮件                
        }
        catch (Exception e)
        {
            return false;
        }
        message.Dispose(); 
        return true;

    }
}
