<script language="javascript" src="js/jquery.pack.1.4.2.js"></script>
<script>
$(document).ready(function(){
    $("#top_nav ul.menu-list > li").hover(
        function () {
            //$(this).find("> a").addClass("hover");
            $(this).find(".menu-sublist").slideDown(100);
        },
        function () {
            //$(this).find("> a").removeClass("hover");
            $(this).find(".menu-sublist").slideUp(100);
        }
    );
});
</script>
<div id="container">
    
    <div id="top_bar">
        <div>
            <a href="./"><img border="0" alt="<%=conf_company%>" src="img/logo.gif" /></a>
        </div>
    </div>
    
    <div><%
	page_path = request.ServerVariables("SCRIPT_NAME")
	bar_src= "bar.jpg"
	if instr(page_path,"detail.asp") then bar_src= "company.jpg"
	if instr(page_path,"company.asp") then bar_src= "company.jpg"
	if instr(page_path,"contact.asp") then bar_src= "company.jpg"
	if instr(page_path,"service.asp") then bar_src= "service.jpg"
	if instr(page_path,"links.asp") then bar_src= "links.jpg"
	if instr(page_path,"hr.asp") then bar_src= "hr.jpg"
	if instr(page_path,"news.asp") then bar_src= "news.jpg"
	'if instr(page_path,"email.asp") then bar_src= "email.jpg"
	%><%if instr(page_path,"index.asp") then%>
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id=scriptmain name=scriptmain codebase="http://download.macromedia.com/pub/shockwave/cabs/
flash/swflash.cab#version=6,0,29,0" width="100%" height="260">
      <param name="movie" value="img/bcastr.swf?bcastr_xml_url=img/bcastr.xml">
      <param name="quality" value="high">
      <param name=scale value=noscale>
      <param name="LOOP" value="false">
      <param name="menu" value="false">
      <param name="wmode" value="transparent">
      <embed src="img/bcastr.swf?bcastr_xml_url=img/bcastr.xml" width="100%" height="260" loop="false" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" salign="T" name="scriptmain" menu="false" wmode="transparent"></embed>
    </object>
        <%else%>
            <img src="img/<%=bar_src%>" />
        <%end if%>
    </div>

	<div id="top_nav">
    	<ul class="menu-list">
        	<li class="timer" id="date_time"></li>
        	<li style="width:10px; float:right; background:url(img/nav_bg.jpg) -90px -79px;">&nbsp;</li>
        	<li style="width:10px; background:url(img/nav_bg.jpg) 0 -39px;">&nbsp;</li>
        	<li><a href="./">首页</a></li>
            <li class="top_nav_sep">&nbsp;</li>

        	<li><a href="company.asp">关于我们</a>
            	<ul class="menu-sublist" style="background:#FFF; overflow:hidden; line-height:32px">
                    <li><a href="company.asp?id=1">公司简介</a></li>
                    <li><a href="company.asp?id=7">总经理的话</a></li>
                    <li><a href="company.asp?id=8">公司资质</a></li>
                    <li><a href="company.asp?id=9">公司理念</a></li>
                </ul>  
            </li>
            <li class="top_nav_sep">&nbsp;</li>
            
        	<li><a href="service.asp">业务领域</a>
            	<ul class="menu-sublist" style="background:#FFF; overflow:hidden; line-height:32px">
                    <li><a href="service.asp?id=3">服务范围</a></li>
                    <li><a href="service.asp?id=4">服务流程</a></li>
                </ul>
            </li>
            <li class="top_nav_sep">&nbsp;</li>
        	<li><a href="news.asp">资讯中心</a>
            	<ul class="menu-sublist" style="background:#FFF; overflow:hidden; line-height:32px">
                    <li><a href="news.asp?classid=5">政策法规</a></li>
                    <li><a href="news.asp?classid=6">行业动态</a></li>
                </ul>
            </li>
            <li class="top_nav_sep">&nbsp;</li>
        	<li><a href="hr.asp">招贤纳才</a></li>
            <li class="top_nav_sep">&nbsp;</li>
        	<li><a href="links.asp">相关链接</a></li>
            <li class="top_nav_sep">&nbsp;</li>
        	<li><a href="contact.asp">联系我们</a></li>
            <li class="top_nav_sep">&nbsp;</li>

        </ul>
    </div>
    
    <div class="HackBox" style="height:1px"></div>
    
    <script> 
//setInterval("document.getElementById('date_time').innerHTML='欢迎莅临 今天是：' + new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);



var currDate = new Date();
var d = new Date();
var YMDHMS = d.getFullYear() + "年" +(d.getMonth()+1) + "月" + d.getDate() +'日星期'+'日一二三四五六'.charAt(new Date().getDay()) ;


document.getElementById('date_time').innerHTML='　　欢迎莅临 今天是：' + YMDHMS;
</script>
    
<div>