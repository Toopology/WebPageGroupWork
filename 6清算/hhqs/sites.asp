<!--#include file="inc_conn.asp"-->
<%
page_title = "服务网点"
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=page_title%> - <%=conf_sitename%></title>
<script src="js/boxover/boxover.js"></script>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<!--#include file="inc_top.asp"-->

    <div style="overflow:hidden">
    
    	<!--#include file="inc_left.asp"-->
    
    	<div  class="right_body" style=" font-size:14px; line-height:2em">
        
        	<div class="nav_bar">
                <div><%=page_title%></div>
            </div>
            
            
            <div style="padding:10px; text-align:center">
            	<img src="img/shmap.jpg" border="0" usemap="#Map" />
                <map name="Map" id="Map">
                  <area shape="poly" coords="204,3" href="#" />
                  <area shape="poly" coords="151,47" href="#" />
                  <area shape="poly" coords="152,45,198,4,287,62,418,108,453,132,448,182,308,152" href="#" title="header=[崇明区网点地址] body=[<%=get_site_addr("上海崇明区")%>]" />
                  <area shape="poly" coords="77,446,114,407,113,385,105,370,119,364,133,340,162,327,212,334,229,375,206,407,209,449,78,444" href="#" title="header=[松江区网点地址] body=[<%=get_site_addr("上海松江区")%>]" />
                  <area shape="poly" coords="322,228,314,208,416,266,495,368,490,430,416,475,388,419,349,406,314,355,351,281,342,238,314,209" href="#" title="header=[浦东新区网点地址] body=[<%=get_site_addr("上海浦东区")%>]" />
                  <area shape="poly" coords="78,460,95,500,124,492,148,506,156,531,179,536,204,580,272,535,219,488,206,453,78,460" href="#" title="header=[金山区网点地址] body=[<%=get_site_addr("上海金山区")%>]" />
                  <area shape="poly" coords="229,433,224,461,229,482,239,496,257,511,286,526,398,489,403,479,383,426,271,423,228,434" href="#" title="header=[奉贤区网点地址] body=[<%=get_site_addr("上海奉贤区")%>]" />
                  <area shape="poly" coords="230,350,232,390,218,411,221,426,304,412,332,418,326,382,279,378,256,342,229,350" href="#" title="header=[闵行区网点地址] body=[<%=get_site_addr("上海闵行区")%>]" />
                  <area shape="poly" coords="67,429,108,399,94,363,105,351,126,321,161,315,171,286,119,270,81,266,68,324,37,347,39,396,67,431" href="#" title="header=[青浦区网点地址] body=[<%=get_site_addr("上海青浦区")%>]" />
                  <area shape="poly" coords="105,224,123,186,143,168,191,161,209,199,211,221,216,262,232,275,244,292,212,299,189,275,161,275,116,259,105,225" href="#" title="header=[嘉定区网点地址] body=[<%=get_site_addr("上海嘉定区")%>]" />
                  <area shape="poly" coords="211,162,215,191,220,209,234,231,224,249,248,258,264,264,291,241,312,224,306,201,239,162,210,161" href="#" title="header=[宝山区网点地址] body=[<%=get_site_addr("上海宝山区")%>]" />
                  <area shape="poly" coords="248,304,271,303,283,294,274,281,244,264,248,304" href="#" title="header=[普陀区网点地址] body=[<%=get_site_addr("上海普陀区")%>]" />
                  <area shape="poly" coords="230,310,230,333,263,328,275,321,275,308,232,309" href="#" title="header=[长宁区网点地址] body=[<%=get_site_addr("上海长宁区")%>]" />
                  <area shape="poly" coords="275,306,282,313,294,312,297,301,282,297,276,305" href="#" title="header=[静安区网点地址] body=[<%=get_site_addr("上海静安区")%>]" />
                  <area shape="poly" coords="281,263,277,279,288,293,303,294,293,257,282,263" href="#" title="header=[闸北区网点地址] body=[<%=get_site_addr("上海闸北区")%>]" />
                  <area shape="poly" coords="310,293,319,292,317,268,304,258,297,260,308,290" href="#" title="header=[虹口区网点地址] body=[<%=get_site_addr("上海虹口区")%>]"  />
                  <area shape="poly" coords="269,339,290,378,299,377,300,348,304,330,291,318,269,338" href="#" title="header=[徐汇区网点地址] body=[<%=get_site_addr("上海徐汇区")%>]" />
                  <area shape="poly" coords="305,319,309,330,324,321,325,304,318,295,305,296,304,317" href="#" title="header=[黄浦区网点地址] body=[<%=get_site_addr("上海黄浦区")%>]" />
                  <area shape="poly" coords="327,288,345,272,330,233,314,229,303,250,321,262,328,288" href="#" title="header=[杨浦区网点地址] body=[<%=get_site_addr("上海杨浦区")%>]" />
                </map>
          </div>
            
            
    	</div>
	</div>
    
    <div class="HackBox" style="height:8px"></div>

<!--#include file="inc_bottom.asp"-->    
<%
function get_site_addr(area)
	sql = "select * from t_article where classid=16 and title='"&area&"'"
	set rs=conn.execute(sql)
	if not rs.eof then
		get_site_addr = replace(rs("content"),vbcrlf,"")
	else
		get_site_addr = "暂无"
	end if
	rs.close
end function
%>
</body>
</html>