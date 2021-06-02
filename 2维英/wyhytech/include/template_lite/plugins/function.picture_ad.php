<?php
/*********************************************
*图片链接
* *******************************************/
function tpl_function_picture_ad($params, &$smarty)
{
global $db,$_CFG;
$arr=explode(',',$params['set']);

foreach($arr as $str)
{
$a=explode(':',$str);
	switch ($a[0])
	{
	case "显示数目":
		$aset['row'] = $a[1];
		break;
	case "开始位置":
		$aset['start'] = $a[1];
		break;
	case "文字长度":
		$aset['titlelen'] = $a[1];
		break;
	case "填补字符":
		$aset['dot'] = $a[1];
		break;
	case "调用名称":
		$aset['alias'] = $a[1];
		break;
	case "列表名":
		$aset['listname'] = $a[1];
		break;
	case "排序":
		$aset['displayorder'] = $a[1];
		break;
	}
}
$aset['row']=isset($aset['row'])?intval($aset['row']):10;
$aset['start']=isset($aset['start'])?intval($aset['start']):0;
$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
$aset['dot']=isset($aset['dot'])?$aset['dot']:null;
$aset['displayorder']=isset($aset['displayorder'])?$aset['displayorder']:null;
unset($arr,$str,$a,$params);
$wheresql=" WHERE alias='".$aset['alias']."'  AND is_display=1 ";

$limit=" LIMIT ".$aset['start'].','.$aset['row'];
if ($aset['displayorder'])
{
	if (strpos($aset['displayorder'],'>'))
	{
	$arr=explode('>',$aset['displayorder']);
	$arr[0]=preg_match('/show_order|id/',$arr[0])?$arr[0]:"";
	$arr[1]=preg_match('/asc|desc/',$arr[1])?$arr[1]:"";
		if ($arr[0] && $arr[1])
		{
		$orderbysql=" ORDER BY ".$arr[0]." ".$arr[1];
		}
	}
}
else
{
	$orderbysql=" ORDER BY show_order DESC ";
}

$result = $db->query("SELECT * FROM ".table('ad')." ".$wheresql.$orderbysql.$limit);
$arr=array();
$i=-1;
while($row = $db->fetch_array($result))
{
	$i++;
	$list['num']=$i;
	$list['imgurl']=$row['imgurl'];
	$list['simgurl']=$row['simgurl'];
	$list['img_url']=$row['img_url'];
	$list['img_explain_']=$row['img_explain'];
	$list['img_explain']=cut_str($row['img_explain'],$aset['titlelen'],0,$aset['dot']);
	$arr[]=$list;
}

$smarty->assign($aset['listname'],$arr);
unset($alist,$row,$aset,$list);
}

?>