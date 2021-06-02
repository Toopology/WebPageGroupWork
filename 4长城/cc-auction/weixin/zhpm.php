<html>
	<head>
		<title>长城拍卖 - 拍卖公告</title>
		<meta http-equiv="Content-Type" content="text/html; charset=gbk">
		<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FF6600;
}
body,td,th {
	font-size: 14px;
	line-height: 22px;
}
.STYLE1 {color: #CC0000}
-->
</style>
		<link href="css/css.css" rel="stylesheet" type="text/css">
		<style type="text/css">
<!--
.STYLE2 {	color: #FFFFFF;
	font-size: 14px;
}
-->
</style>
		<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
	</head>
	<body
		onLoad="'images/menu2_02.jpg','images/menu2_04.jpg','images/menu2_06.jpg','images/menu2_08.jpg','images/menu2_10.jpg','images/menu2_12.jpg','images/menu2_14.jpg';MM_preloadImages('images/menu2_zz.jpg','images/menu2_fu.jpg','images/menu2_job.jpg','images/menu2_aboutus.jpg','images/menu2_lilian.jpg','images/menu2_yewu.jpg','images/menu2_hydt.jpg','images/menu2_pmgg.jpg','images/menu2_news.jpg','images/menu2_pmcs.jpg','images/menu2_pmjq.jpg','images/menu2_fuwu.jpg')">
		<table width="1000" border="0" align="center" cellpadding="0"
			cellspacing="0">
			<tr>
				<td>
					<img src="images/aboutus_01.jpg" width="1000" height="114">
				</td>
			</tr>
		</table>

		<!--菜单表格 -->


		<table width="1000" border="0" align="center" cellpadding="0"
			cellspacing="0"
			style="background-repeat:no-repeat; background-position:bottom">
			<tr>
				<td height="31" colspan="2" background="images/aboutus_03.jpg">&nbsp;
					
				</td>
			</tr>
		</table>
		<table width="1000" height="509" border="0" align="center"
			cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
			<tr>
				<td height="462" colspan="2" valign="top" bgcolor="#FFFFFF"
					style=" background-attachment:fixed; background-image:url(images/dfmz_bg.jpg); background-position:bottom; background-repeat:no-repeat;">
					<table width="1000" height="537" border="0" cellpadding="0"
						cellspacing="0">
						<tr>
							<td width="840" valign="top" background="images/tint_bg.jpg"
								style="background-repeat:repeat-x">

								<!--这里面是内容 -->




								<table width="90%" border="0" align="center" cellpadding="0"
									cellspacing="0">
									<tr>
										<td height="23">
											<div align="right" class="STYLE1">
												首页 -&gt; 拍卖公告
											</div>
										</td>
									</tr>
									<tr>
										<td height="15" align="right">
											<img src="images/line.jpg" width="512" height="5">
										</td>
									</tr>
									<tr>
										<td height="180" valign="top" class="t13">
														<?
														include "conn.php";
														$conn=mysql_connect($url,$c_username,$c_password);
														if(mysql_select_db("cc-auction")){
         											$sql="select * from announcement where type='综合拍卖'";
         											mysql_query("SET NAMES 'gbk'");
         											$result=mysql_query($sql);
         											$total=mysql_num_rows($result);
         											if($total%20==0){
         												$maxpage=intval($total/20);
         											}
         											$maxpage=intval($total/20)+1;
         											$npage=$_GET['npage'];
         											if($npage<=0){
         												$npage=1;
         											}
         											if($npage==$maxpage){
         												$npage=$maxpage;
         											}
         											$first=20*($npage-1);
         											$sql="select * from announcement where type='综合拍卖' order by time desc limit $first,20";
         											$result=mysql_query($sql);
														?>
											<!--内容 -->
											<table width="100%" height="40" border="0" cellpadding="6"
												cellspacing="0">
												<tr>
													<td>
														&nbsp;页次：
														<strong><font color=red><? echo $npage ?></font>/<? echo $maxpage ?></strong>页
													</td>
													<td height="22" align="right" class="t12">
									<?
										if($npage==1){
									?>
										首页&nbsp;
										上一页&nbsp;
									<?
										}else{
									?>
										<a href="zhpm.php?npage=1">首页</a>&nbsp;
										<a href="zhpm.php?npage=<? echo $npage-1; ?>">上一页</a>&nbsp;
									<?
										}
										if($npage==$maxpage){
									?>
										下一页&nbsp;
										尾页
									<?
										}else{
									?>
									<a href="zhpm.php?npage=<? echo $npage+1; ?>">下一页</a>&nbsp;
									<a href="zhpm.php?npage=<? echo $maxpage; ?>">尾页</a>
									<?
										}
									?>
								</td>
												</tr>
											</table>
											<table width="100%" border="0" cellspacing="0"
												cellpadding="5">
												<tr>

													<td height="22">
													<?
															while($arr=mysql_fetch_array($result)){
													?><li>
																<A href="viewAnnouncement.php?id=<? echo $arr["id"]; ?>">
																	<? echo $arr["aname"]; ?> </A>
																<span align="right"></span>
														</li>
														
														<?
														}?>
													</td>
												</tr>
													<?
														}mysql_close($conn);
													?>
											</table>

											<br>
											<br>
										</td>
									</tr>
								</table>



								<!--这里面是内容 -->
							</td>
							<td width="160" valign="top" background="images/tint_bg.jpg"
								style="background-repeat:repeat-x">
								&nbsp;</td>
						</tr>
						<tr>
							<td height="87" colspan="2" valign="bottom"
								style="background-repeat:repeat-x">
								<table width="100%" height="53" border="0" cellpadding="0"
									cellspacing="0">
									<tr>
										<td height="53" align="center">
											<table width="529" height="41" border="0" cellpadding="0"
												cellspacing="0">
												<tr>
													<td width="184" height="41" align="right">
														版权所有 &copy; 2016
													</td>
													<td width="27" align="center">
														<img src="images/btcc.gif" width="23" height="22">
													</td>
													<td width="147">
														上海长城拍卖有限公司
													</td>
													<td width="171">
														<img src="images/changcheng_tuzhang.gif" width="34"
															height="41">
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table width="1000" height="32" border="0" align="center"
			cellpadding="0" cellspacing="0">
			<tr>
				<td align="center" bgcolor="#ED1B24">
					<p class="STYLE2">地址：上海市黄浦路99号上海滩国际大厦3楼 邮编：200080
				  电话：021-62668899 传真:021-62989166 网址：http://www.cc-auction.com.cn</p>
					<p class="STYLE2"><a href="http://www.miibeian.gov.cn" target="_blank"><font color="#FFFFFF">ICP证: 沪ICP备10026993号</font></a>
			            </p></td>
			</tr>
		</table>
	</body>
</html>


