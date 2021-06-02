<?php
/*
* 管理中心共用数据调用函数
*/

function get_contact($offset, $perpage, $sql= '')
{

	global $db;
	$row_arr = array();
	$limit=" LIMIT ".$offset.','.$perpage;
	$result = $db->query("SELECT a.*,c.id as cid,c.categoryname as c_categoryname FROM ".table('contact')." AS a ".$sql."  ".$limit);
	while($row = $db->fetch_array($result)){
		$tit_color = $row['tit_color'] ? "color:".$row['tit_color'].";" : '';
		$tit_b = $row['tit_b']>0 ? "font-weight:bold;" : '';
		$tit_style= $tit_color || $tit_b ? "style=\"".$tit_color.$tit_b."\""  : '';
		$Small_img = $row['Small_img'] ? "<span style=\"color:#009900\">(图)</span>" : '';
		if (!empty($row['is_url']) && $row['is_url']!='http://')
		{
			$row['url'] = $row['is_url'];
		}
		else
		{
			$row['url'] = url_rewrite('contactshow',array('id0'=>$row['id'],'addtime'=>$row['addtime']));
		}

		$row['url_title'] ="<a href=\"".$row['url']."\" target=\"_blank\" ".$tit_style.">".$row['title']."</a> ".$Small_img."";
		$row_arr[] = $row;
	}
	return $row_arr;
}
function del_contact($id)
{
	global $db,$thumb_dir,$upfiles_dir;
	if (!is_array($id)) $id=array($id);

	foreach($id as $val)
	{
		$sql_img="select imgurl from ".table('contact')." where id=".intval($val)." LIMIT 1";
		$y_img=$db->getone($sql_img);

		$y_img=explode('|',$y_img['imgurl']);

		foreach($y_img as $val2){

			@unlink($upfiles_dir."/".$val2);
			@unlink($thumb_dir.$val2);
		}

		$db->query("Delete from  ".table('contact')." where id=".intval($val)." LIMIT 1");
	}
	return true;
}
function get_contact_category()
{
	global $db;
	$sql = "select * from ".table('contact_category')." where parentid=0  ORDER BY category_order desc";
	$category_list=$db->getall($sql);
	if (is_array($category_list))
	{
		foreach($category_list as $v)
		{
			$list[]=array("id"=>$v['id'],"categoryname"=>$v['categoryname'],"parentid"=>$v['parentid']);
			$sqlf = "select * from ".table('contact_category')." where parentid=".$v['id']."  ORDER BY category_order desc";
			$category_f=$db->getall($sqlf);
			if (is_array($category_f))
			{
				foreach($category_f as $vs)
				{
					$list[]=array("id"=>$vs['id'],"categoryname"=>"|-".$vs['categoryname'],"parentid"=>$vs['parentid']);
				}
			}
		}
	}
	return $list;
}
function get_contact_category_one($id)
{
	global $db;
	$sql = "select * from ".table('contact_category')." where id=".intval($id)." LIMIT 1";
	$var=$db->getone($sql);
	return $var;
}
function get_contact_parentid($val)
{
	global $db;
	$sql = "select * from ".table('contact_category')." where id=".intval($val)."  LIMIT 1";
	$category=$db->getone($sql);
	return $category['parentid'];
}
function del_category($id)
{
	global $db;
	if(!is_array($id)) $id=array($id);
	$return=0;
	foreach($id as $sid)
	{
		$sql = "select * from ".table('contact_category')." where id=".intval($sid)."  LIMIT 1";
		$category=$db->getone($sql);
		if ($category['parentid']=="0")
		{
			if (!$db->query("Delete from ".table('contact_category')." WHERE (parentid =".intval($sid)." OR id =".intval($sid).")  AND admin_set<>1")) return false;
			$return=$return+$db->affected_rows();
		}
		else
		{
			if (!$db->query("Delete from ".table('contact_category')." WHERE id =".intval($sid)." AND admin_set<>1")) return false;
			$return=$return+$db->affected_rows();
		}
	}
	return $return;
}
function del_property($id)
{
	global $db;
	if(!is_array($id)) $id=array($id);
	$return=0;
	$sqlin=implode(",",$id);
	if (preg_match("/^(\d{1,10},)*(\d{1,10})$/",$sqlin))
	{
		if (!$db->query("Delete from ".table('contact_property')." WHERE id IN (".$sqlin.")  AND admin_set<>1")) return false;
		$return=$return+$db->affected_rows();
	}
	return $return;
}
function get_contact_property_one($id)
{
	global $db;
	$sql = "select * from ".table('contact_property')." where id=".intval($id)." LIMIT 1";
	$var=$db->getone($sql);
	return $var;
}
?>