	<div style="border-top:4px solid #C0C0C0;">
    	<div style="text-align:center; border-top:2px solid #FFF; background:#F4F4F4; padding:10px 0; line-height:2em"><!--copyright-->
        	联系电话：<%=conf_tel%>　
            传真：<%=conf_fax%>
            网址：<%=conf_url%>　<br/>
            &copy; 2016 <%=conf_company%>　 联系地址：<%=conf_addr%> <br/>
			<a href="http://www.miibeian.gov.cn" target="_blank">ICP证: 沪ICP备12044696号</a>
            <div id="counter"></div>
		 	<div style="width:300px;margin:0 auto; padding:20px 0;">
		 		<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010902001531" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="img/batb.png" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">沪公网安备 31010902001531号</p></a>
		 	</div>
		 
        </div>
    </div>
</div>

</div>

<script>
$.post("ajax.asp",{act:'counter'},function(data){$("#counter").html(data);});
</script>
