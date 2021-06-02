<?php
function tpl_function_onlineschool_list($params, &$smarty)
{

	global $db,$_CFG;
	$arr=explode(',',$params['set']);

	foreach($arr as $str)
	{
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "显示数目":
				$aset['row'] = $a[1];
				break;
			case "图片":
				$aset['img'] = $a[1];
				break;
			case "属性":
				$aset['attribute'] = $a[1];
				break;
			case "学堂大类":
				$aset['parentid'] = $a[1];
				break;
			case "学堂小类":
				$aset['type_id'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
			case "摘要长度":
				$aset['infolen'] = $a[1];
				break;
			case "开始位置":
				$aset['start'] = $a[1];
				break;
			case "填补字符":
				$aset['dot'] = $a[1];
				break;
			case "日期范围":
				$aset['settr'] = $a[1];
				break;
			case "排序":
				$aset['displayorder'] = $a[1];
				break;
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
			case "页面":
				$aset['showname'] = $a[1];
				break;
		}
	}

	if (is_array($aset)) $aset=array_map("get_smarty_request",$aset);
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['start']=isset($aset['start'])?intval($aset['start']):0;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['infolen']=isset($aset['infolen'])?intval($aset['infolen']):0;
	$aset['showname']=isset($aset['showname'])?$aset['showname']:'onlineschoolshow';
	if ($aset['displayorder'])
	{
		if (strpos($aset['displayorder'],'>'))
		{
			$arr=explode('>',$aset['displayorder']);
			$arr[0]=preg_match('/onlineschool_order|click|id/',$arr[0])?$arr[0]:"";
			$arr[1]=preg_match('/asc|desc/',$arr[1])?$arr[1]:"";
			if ($arr[0] && $arr[1])
			{
				$orderbysql=" ORDER BY ".$arr[0]." ".$arr[1];
			}
			if ($arr[0]=="onlineschool_order")
			{
				$orderbysql.=" ,id DESC ";
			}
		}
	}
	$wheresql=" WHERE is_display=1";
	isset($aset['parentid'])?$wheresql.=" AND parentid=".intval($aset['parentid'])." ":'';
	isset($aset['type_id'])?$wheresql.=" AND type_id=".intval($aset['type_id'])." ":$wheresql.=' AND type_id=1';

	isset($aset['attribute'])?$wheresql.=" AND focos=".intval($aset['attribute'])." ":'';
	
	if (isset($aset['settr']))
	{
		$settr_val=strtotime("-".intval($aset['settr'])." day");
		$wheresql.=" AND addtime > ".$settr_val;
	}

	if (isset($aset['paged']))
	{
		require_once(ROOT_PATH.'include/page.class.php');
		$total_sql="SELECT COUNT(*) AS num FROM ".table('onlineschool').$wheresql;
		$total_count=$db->get_total($total_sql);
		$pagelist = new page(array('total'=>$total_count, 'perpage'=>$aset['row'],'alias'=>'newslist','id0'=>$aset['type_id']));
		$currenpage=$pagelist->nowindex;
		$aset['start']=($currenpage-1)*$aset['row'];

		if ($total_count>0)
		{

			$smarty->assign('page',$pagelist->show(6));
		}
		else
		{
			$smarty->assign('page','');
		}
		$smarty->assign('total',$total_count);
	}

	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$result = $db->query("SELECT * FROM ".table('onlineschool')." ".$wheresql.$orderbysql.$limit);
	$list= array();
	$i=0;
	while($row = $db->fetch_array($result))
	{
		$i++;
		$row['title_']=$row['title'];
		$style_color=$row['tit_color']?"color:".$row['tit_color'].";":'';
		$style_font=$row['tit_b']=="1"?"font-weight:bold;":'';
		$row['title']=cut_str($row['title'],$aset['titlelen'],0,$aset['dot']);
		if ($style_color || $style_font)$row['title']="<span style=".$style_color.$style_font.">".$row['title']."</span>";
		if (!empty($row['is_url']) && $row['is_url']!='http://')
		{
			$row['url'] = $row['is_url'];
		}
		else
		{
			$row['url'] = url_rewrite($aset['showname'],array('id0'=>$row['id'],'addtime'=>$row['addtime']));
		}

		$row['content']=str_replace('&nbsp;','',$row['content']);
		$row['briefly_']=strip_tags($row['content']);
		if ($aset['infolen']>0)
		{
			$row['briefly']=cut_str(strip_tags($row['content']),$aset['infolen'],0,$aset['dot']);
		}
		$row['img']=$_CFG['site_dir'].$row['small_imgurl'];
		$row['bimg']=$_CFG['site_dir'].$row['imgurl'];
		$row['size']=hrFilesize(filesize('../'.$row['imgurl']));
		$row['num']=$i;
		$list[] = $row;
	}

	$smarty->assign($aset['listname'],$list);
}
?>