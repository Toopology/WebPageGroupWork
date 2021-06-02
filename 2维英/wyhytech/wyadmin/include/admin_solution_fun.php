<?php
/*
* 管理中心共用数据调用函数
*/

function get_solution($offset, $perpage, $sql= '')
{

	global $db;
	$row_arr = array();
	$limit=" LIMIT ".$offset.','.$perpage;
	$result = $db->query("SELECT a.*,c.id as cid,c.categoryname as c_categoryname FROM ".table('solution')." AS a ".$sql."  ".$limit);
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
			$row['url'] = url_rewrite('solutionshow',array('id0'=>$row['id'],'addtime'=>$row['addtime']));
		}

		$row['url_title'] ="<a href=\"".$row['url']."\" target=\"_blank\" ".$tit_style.">".$row['title']."</a> ".$Small_img."";
		$row_arr[] = $row;
	}
	return $row_arr;
}
function del_solution($id)
{
	global $db,$thumb_dir,$upfiles_dir;
	if (!is_array($id)) $id=array($id);
	foreach($id as $val)
	{
		$sql_img="select imgurl from ".table('solution')." where id=".intval($val)." LIMIT 1";
		$y_img=$db->getone($sql_img);
		@unlink($upfiles_dir."/".$y_img['imgurl']);
		@unlink($thumb_dir.$y_img['imgurl']);
		$db->query("Delete from  ".table('solution')." where id=".intval($val)." LIMIT 1");
	}
	return true;
}
function get_solution_category()
{
	global $db;
	$sql = "select * from ".table('solution_category')." where parentid=0  ORDER BY category_order desc";
	$category_list=$db->getall($sql);
	if (is_array($category_list))
	{
		foreach($category_list as $v)
		{
			$list[]=array("id"=>$v['id'],"categoryname"=>$v['categoryname'],"parentid"=>$v['parentid']);
			$sqlf = "select * from ".table('solution_category')." where parentid=".$v['id']."  ORDER BY category_order desc";
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
function get_solution_category_one($id)
{
	global $db;
	$sql = "select * from ".table('solution_category')." where id=".intval($id)." LIMIT 1";
	$var=$db->getone($sql);
	return $var;
}
function get_solution_parentid($val)
{
	global $db;
	$sql = "select * from ".table('solution_category')." where id=".intval($val)."  LIMIT 1";
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
		$sql = "select * from ".table('solution_category')." where id=".intval($sid)."  LIMIT 1";
		$category=$db->getone($sql);
		if ($category['parentid']=="0")
		{
			if (!$db->query("Delete from ".table('solution_category')." WHERE (parentid =".intval($sid)." OR id =".intval($sid).")  AND admin_set<>1")) return false;
			$return=$return+$db->affected_rows();
		}
		else
		{
			if (!$db->query("Delete from ".table('solution_category')." WHERE id =".intval($sid)." AND admin_set<>1")) return false;
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
		if (!$db->query("Delete from ".table('solution_property')." WHERE id IN (".$sqlin.")  AND admin_set<>1")) return false;
		$return=$return+$db->affected_rows();
	}
	return $return;
}
function get_solution_property_one($id)
{
	global $db;
	$sql = "select * from ".table('solution_property')." where id=".intval($id)." LIMIT 1";
	$var=$db->getone($sql);
	return $var;
}
?>