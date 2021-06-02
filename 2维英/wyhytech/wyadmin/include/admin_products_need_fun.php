<?php
/*
* 管理中心共用数据调用函数
*/

function get_products_need($offset, $perpage, $sql= '')
{

	global $db;
	$row_arr = array();
	$limit=" LIMIT ".$offset.','.$perpage;
	$result = $db->query("SELECT *  FROM ".table('products_need').$sql."  ".$limit);
	while($row = $db->fetch_array($result)){
		$row_arr[] = $row;
	}
	return $row_arr;
}
function del_products_need($id)
{
	global $db,$thumb_dir,$upfiles_dir;
	if (!is_array($id)) $id=array($id);

	foreach($id as $val)
	{
		$db->query("Delete from  ".table('products_need')." where id=".intval($val)." LIMIT 1");
	}
	return true;
}

?>